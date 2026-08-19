<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Error_handler
 *
 * Centralized error handling utility for the application.
 * Responsible for capturing backend exceptions and frontend
 * client-side errors, enriching them with request, user, and
 * environment context, and forwarding them to an external
 * error logging microservice.
 */

class Error_handler {
    protected $CI;
    protected $config;
    
    public function __construct() {
        $this->CI =& get_instance();
        
        $this->CI->load->helper('url');
        $this->CI->load->library('user_agent');
    }
    
    /**
     * Log error to the microservice
     * 
     * @param Exception|Throwable $exception
     * @param array $additional_data
     * @return bool
     */
    public function log_error($exception, $additional_data = []) {
        if (!$this->config['enabled']) {
            return false;
        }
        
        try {
            $request = $this->CI->input;
            $user = $this->CI->session->userdata('user_id') ?: null;
            
            $payload = [
                'application_name' => $this->config['app_name'],
                'environment' => $this->config['environment'],
                'error_type' => get_class($exception),
                'error_code' => $exception->getCode(),
                'error_message' => $exception->getMessage(),
                'stack_trace' => $exception->getTraceAsString(),
                'file_path' => $exception->getFile(),
                'line_number' => $exception->getLine(),
                'request_method' => $request->method(true),
                'request_url' => current_url(),
                'user_agent' => $this->CI->agent->agent_string(),
                'ip_address' => $request->ip_address(),
                'additional_context' => array_merge([
                    'user_id' => $user,
                    'headers' => $this->get_headers(),
                    'input' => $request->post() ?: $request->get()
                ], $additional_data)
            ];
            
            $this->send_to_service($payload);
            return true;
            
        } catch (Exception $e) {
            log_message('error', 'Failed to send error to microservice: ' . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Handle frontend errors
     * 
     * @param array $error_data
     * @return bool
     */
    public function log_frontend_error($error_data) {
        if (!$this->config['enabled'] || !$this->config['frontend_enabled']) {
            return false;
        }
        
        try {
            $request = $this->CI->input;
            $user = $this->CI->session->userdata('user_id') ?: null;
            
            $payload = array_merge([
                'application_name' => $this->config['app_name'],
                'environment' => $this->config['environment'],
                'request_url' => $request->server('HTTP_REFERER') ?: current_url(),
                'user_agent' => $this->CI->agent->agent_string(),
                'ip_address' => $request->ip_address(),
                'additional_context' => [
                    'user_id' => $user,
                    'headers' => $this->get_headers(),
                    'is_frontend' => true
                ]
            ], $error_data);
            
            $this->send_to_service($payload);
            return true;
            
        } catch (Exception $e) {
            log_message('error', 'Failed to send frontend error to microservice: ' . $e->getMessage());
            return false;
        }
    }
    
    /**
     * Send error data to the microservice
     * 
     * @param array $payload
     * @return void
     */
    protected function send_to_service($payload) {
        $ch = curl_init($this->config['url']);
        
        $options = [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_HTTPHEADER => [
                'Content-Type: application/json',
                'X-Requested-With: XMLHttpRequest'
            ],
            CURLOPT_TIMEOUT => $this->config['timeout']
        ];
        
        curl_setopt_array($ch, $options);
        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        
        if (curl_errno($ch) || $httpCode !== 200) {
            log_message('error', 'Error service request failed: ' . curl_error($ch));
        }
        
        curl_close($ch);
    }
    
    /**
     * Get request headers
     * 
     * @return array
     */
    protected function get_headers() {
        $headers = [];
        foreach ($_SERVER as $key => $value) {
            if (strpos($key, 'HTTP_') === 0) {
                $header = str_replace(' ', '-', ucwords(str_replace('_', ' ', strtolower(substr($key, 5)))));
                $headers[$header] = $value;
            }
        }
        return $headers;
    }
}