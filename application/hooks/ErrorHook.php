<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Capture and report fatal PHP errors on script shutdown.
 *
 * This method is intended to be registered as a shutdown handler.
 * It retrieves the last occurred PHP error (if any) using
 * error_get_last(), and when error reporting is enabled, prepares
 * a payload containing application, environment, error, and request
 * details and sends it to the configured error logging service.
 *
 * Primarily used to log fatal errors that cannot be caught by
 * standard try/catch blocks.
 *
 * @return void
 */


class ErrorHook
{
    public function shutdown()
    {
        $error = error_get_last();

        if ($error && ERROR_SERVICE_ENABLED) {
            $payload = [
                'application_name' => ERROR_SERVICE_APP_NAME,
                'environment' => ERROR_SERVICE_ENV,
                'error_type' => 'FatalError',
                'error_message' => $error['message'],
                'file_path' => $error['file'],
                'line_number' => $error['line'],
                'request_url' => $_SERVER['REQUEST_URI'] ?? ''
            ];

            $ch = curl_init(ERROR_SERVICE_URL);
            curl_setopt_array($ch, [
                CURLOPT_POST => true,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_TIMEOUT => ERROR_SERVICE_TIMEOUT,
                CURLOPT_POSTFIELDS => http_build_query($payload)
            ]);
            curl_exec($ch);
            curl_close($ch);
        }
    }
}