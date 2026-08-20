<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Client_error extends CI_Controller
{
    /**
     * Store client-side (frontend) error logs and forward them to the error microservice.
     *
     * This method:
     * - Accepts raw JSON input from the request body
     * - Validates whether frontend error logging is enabled
     * - Decodes and validates the incoming JSON payload
     * - Enriches the payload with application, environment, request, and client metadata
     * - Logs the error locally for debugging purposes
     * - Sends the final payload to a configured error logging microservice via cURL
     *
     * On success, it returns a JSON response indicating the error was logged.
     * On failure, it logs the exception internally and returns a JSON error response
     * with HTTP 500 status.
     *
     * @return void
     *
     * @throws Exception When:
     * - Error logging is disabled
     * - No input or invalid JSON is received
     * - Error service URL is not configured
     * - cURL initialization or execution fails
     * - The error microservice returns a non-2xx HTTP response
     */
    public function store()
    {
        header('Content-Type: application/json');
        try {
            // Check if error logging is enabled
            if (!defined('ERROR_SERVICE_FRONTEND_ENABLED') || !ERROR_SERVICE_FRONTEND_ENABLED) {
                throw new Exception('Error logging is disabled');
            }
            // Get raw input
            $input = file_get_contents('php://input');
            if (empty($input)) {
                throw new Exception('No input received');
            }
            $data = json_decode($input, true);
            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new Exception('Invalid JSON: ' . json_last_error_msg());
            }
            // Prepare payload
            $payload = array_merge([
                'application_name' => defined('ERROR_SERVICE_APP_NAME') ? ERROR_SERVICE_APP_NAME : 'Unknown',
                'environment' => defined('ERROR_SERVICE_ENV') ? ERROR_SERVICE_ENV : 'unknown',
                'request_method' => $_SERVER['REQUEST_METHOD'] ?? 'CLIENT',
                'request_url' => $_SERVER['HTTP_REFERER'] ?? ($data['request_url'] ?? null),
                'timestamp' => date('c'),
                'client_ip' => $_SERVER['REMOTE_ADDR'] ?? null,
                'user_agent' => $_SERVER['HTTP_USER_AGENT'] ?? null
            ], $data);
            // Log the error locally for debugging
            log_message('error', 'Client error: ' . json_encode($payload));
            // Check if microservice URL is configured
            if (!defined('ERROR_SERVICE_URL') || empty(ERROR_SERVICE_URL)) {
                throw new Exception('Error service URL is not configured');
            }
            // Send to microservice
            $ch = curl_init(ERROR_SERVICE_URL);
            if ($ch === false) {
                throw new Exception('Failed to initialize cURL');
            }
            curl_setopt_array($ch, [
                CURLOPT_POST => true,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => defined('ERROR_SERVICE_TIMEOUT') ? ERROR_SERVICE_TIMEOUT : 5,
                CURLOPT_HTTPHEADER => ['Content-Type: application/json'],
                CURLOPT_POSTFIELDS => json_encode($payload),
                CURLOPT_SSL_VERIFYPEER => false, // Only for development, remove in production
                CURLOPT_SSL_VERIFYHOST => 0      // Only for development, remove in production
            ]);
            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $error = curl_error($ch);
            curl_close($ch);
            if ($response === false) {
                throw new Exception('cURL Error: ' . $error);
            }
            if ($httpCode < 200 || $httpCode >= 300) {
                throw new Exception('Error service returned HTTP ' . $httpCode . ': ' . $response);
            }
            echo json_encode(['status' => 'ok', 'message' => 'Error logged successfully']);
        } catch (Exception $e) {
            log_message('error', 'Error in Client_error::store(): ' . $e->getMessage());
            http_response_code(500);
            echo json_encode([
                'status' => 'error',
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
        }
    }
}