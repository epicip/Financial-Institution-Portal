<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class SecurityValidationHook
 *
 * CodeIgniter Hook that intercepts incoming HTTP requests
 * and validates POST/PUT/PATCH data using the external
 * Security Service before controller execution.
 *
 * Includes detailed logging for debugging and audit tracing.
 */
class SecurityValidationHook
{
    protected $CI;

    public function __construct()
    {
        $this->CI =& get_instance();
    }



    /**
     * Handle incoming request for security validation.
     *
     * Execution Flow:
     * 1. Logs request method and URI for debugging.
     * 2. Skips execution if:
     *      - SECURITY_SERVICE_ENABLED is false
     *      - Request method is not POST/PUT/PATCH
     *      - No POST data or uploaded files exist
     * 3. Loads required libraries (session, security_service).
     * 4. Sends request data to Security Service for validation.
     * 5. If validation fails:
     *      - For AJAX requests:
     *          • Sets flashdata for modal usage
     *          • Returns JSON response (HTTP 422)
     *      - For normal requests:
     *          • Sets flash error messages
     *          • Redirects back safely
     * 6. If validation succeeds:
     *      - Merges sanitized data into $_POST
     *
     * Logging:
     * Detailed error_log entries are generated for tracing
     * validation flow and debugging production issues.
     *
     * @return void
     */
    public function handle()
    {
        error_log('SecurityValidationHook: Called for ' . $_SERVER['REQUEST_METHOD'] . ' ' . $_SERVER['REQUEST_URI']);

        if (!SECURITY_SERVICE_ENABLED) {
            error_log('SecurityValidationHook: Security service is disabled');
            return;
        }

        if (!in_array($_SERVER['REQUEST_METHOD'], ['POST', 'PUT', 'PATCH'])) {
            error_log('SecurityValidationHook: Not a POST/PUT/PATCH request');
            return;
        }

        if (empty($_POST) && empty($_FILES)) {
            error_log('SecurityValidationHook: No POST data or files');
            return;
        }

        // Load libraries only when needed
        $this->CI->load->library('session');
        $this->CI->load->library('security_service');

        error_log('SecurityValidationHook: Validating request');
        $result = $this->CI->security_service->validate($_POST, $_FILES);
        error_log('SecurityValidationHook: Validation result: ' . print_r($result, true));

        if ($result['status'] === 'error') {
            error_log('SecurityValidationHook: Validation errors found');

            if ($this->CI->input->is_ajax_request()) {
                error_log('SecurityValidationHook: AJAX request, setting flash data and returning JSON response');

                // Set flash data for modal display
                $this->CI->session->set_flashdata('security_errors', $result['errors']);

                header('Content-Type: application/json', true, 422);
                echo json_encode([
                    'success' => false,
                    'errors' => $result['errors'],
                    'type' => 'security_validation'
                ]);
                exit;
            }

            error_log('SecurityValidationHook: Setting flash data and redirecting');

            // Set flash data
            $this->CI->session->set_flashdata('security_errors', $result['errors']);
            $this->CI->session->set_flashdata('error', 'Security validation failed. Please check your input.');

            // Get the redirect URL
            $redirectUrl = $this->CI->input->server('HTTP_REFERER') ?? site_url();

            error_log('SecurityValidationHook: Redirecting to: ' . $redirectUrl);

            redirect($redirectUrl);
            exit;
        }

        // Merge sanitized data back into POST
        if (!empty($result['data'])) {
            error_log('SecurityValidationHook: Merging sanitized data back into POST');
            $_POST = array_merge($_POST, $result['data']);
        }
    }
}
