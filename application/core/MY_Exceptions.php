<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Exceptions extends CI_Exceptions
{
    protected $CI;

    public function __construct()
    {
        parent::__construct();
        $this->CI = &get_instance();
    }

    /**
     * Override CI exception logging
     */
    public function log_exception($severity, $message, $filepath, $line)
    {
        if (ERROR_SERVICE_ENABLED) {
            $this->sendToMicroservice([
                'error_type'    => $severity,
                'error_message' => $message,
                'file_path'     => $filepath,
                'line_number'   => $line,
                'stack_trace'   => null
            ]);
        }

        parent::log_exception($severity, $message, $filepath, $line);
    }

    /**
     * Send payload to microservice safely
     */
    protected function sendToMicroservice(array $error)
    {
        try {
            $payload = array_merge([
                'application_name' => ERROR_SERVICE_APP_NAME,
                'environment'      => ERROR_SERVICE_ENV,
                'request_method'   => $_SERVER['REQUEST_METHOD'] ?? null,
                'request_url'      => current_url(),
                'additional_context' => [
                    'ip'      => $this->CI->input->ip_address(),
                    'input'   => $this->CI->input->post(NULL, true),
                    'headers' => function_exists('getallheaders') ? getallheaders() : []
                ]
            ], $error);

            $ch = curl_init(ERROR_SERVICE_URL);
            curl_setopt_array($ch, [
                CURLOPT_POST           => true,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT        => ERROR_SERVICE_TIMEOUT,
                CURLOPT_POSTFIELDS     => http_build_query($payload)
            ]);
            curl_exec($ch);
            curl_close($ch);

        } catch (Throwable $e) {
            // swallow – never break request lifecycle
        }
    }
}