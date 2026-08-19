<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Internal XSS validation on POST — does not use SecurityValidationHook / microservice.
 */
class XssValidationHook
{
    protected $CI;

    const ENABLED = true;

    public function __construct()
    {
        $this->CI =& get_instance();
    }

    public function handle()
    {
        if (!self::ENABLED) {
            return;
        }

        if (!in_array($_SERVER['REQUEST_METHOD'], ['POST', 'PUT', 'PATCH'], true)) {
            return;
        }

        if (empty($_POST)) {
            return;
        }

        $this->CI->load->helper('xss');
        $this->CI->load->library('session');

        $fieldLabels = [];
        if (!empty($_POST['_field_labels'])) {
            $fieldLabels = is_array($_POST['_field_labels'])
                ? $_POST['_field_labels']
                : (json_decode($_POST['_field_labels'], true) ?: []);
        }

        $errors = xss_scan_array($_POST);
        if (empty($errors)) {
            return;
        }

        $errors = xss_enhance_errors($errors, $fieldLabels);
        $this->reject($errors);
    }

    private function reject(array $errors)
    {
        if ($this->CI->input->is_ajax_request()) {
            $this->CI->session->set_flashdata('security_errors', $errors);
            header('Content-Type: application/json', true, 422);
            echo json_encode([
                'success' => false,
                'errors'  => $errors,
                'type'    => 'xss_validation',
            ]);
            exit;
        }

        $this->CI->session->set_flashdata('security_errors', $errors);
        $this->CI->session->set_flashdata('sErrMSGType', 'danger');
        $this->CI->session->set_flashdata(
            'sErrMSG',
            'Invalid input detected. Please remove HTML or script-like content from the form.'
        );

        $redirectUrl = $this->CI->input->server('HTTP_REFERER') ?? '';
        if (!$this->isAllowedInternalUrl($redirectUrl)) {
            $redirectUrl = site_url('users/login');
        }
        redirect($redirectUrl);
        exit;
    }

    private function isAllowedInternalUrl($url)
    {
        if (empty($url)) {
            return false;
        }

        if (strpos($url, '/') === 0 && strpos($url, '//') !== 0) {
            return true;
        }

        $allowedHosts = [
            'legaladvertisers.co.uk',
            'epicipprojects.com',
            'localhost',
            '127.0.0.1',
        ];

        $host   = strtolower((string) parse_url($url, PHP_URL_HOST));
        $scheme = strtolower((string) parse_url($url, PHP_URL_SCHEME));

        if (!in_array($host, $allowedHosts, true)) {
            return false;
        }

        if (in_array($host, ['localhost', '127.0.0.1'], true)) {
            return in_array($scheme, ['http', 'https'], true);
        }

        return $scheme === 'https';
    }
}