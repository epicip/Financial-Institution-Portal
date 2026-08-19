<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Class Security_service
 *
 * Handles communication with an external Security Validation Service.
 * 
 * Responsibilities:
 * - Sends POST data and uploaded files for validation
 * - Flattens nested form fields for multipart submission
 * - Enhances error messages with user-friendly field labels
 * - Returns structured validation response
 */
class Security_service
{
    protected $CI;
    protected $url;

    public function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->helper('url');
        $this->url = SECURITY_SERVICE_URL;
        if (empty($this->url)) {
            throw new Exception('Security service URL is not defined.');
        }
    }

    /**
     * Validate incoming POST data and uploaded files.
     *
     * Process:
     * 1. Extract optional `_field_labels` for better error messages.
     * 2. Prepare uploaded files (supports single & multiple files).
     * 3. Flatten nested POST arrays into bracket notation.
     * 4. Send multipart/form-data request to security service via cURL.
     * 5. Decode JSON response.
     * 6. Return structured success or error response.
     *
     * @param array $post  Associative array of POST data.
     * @param array $files Associative array of uploaded files ($_FILES).
     *
     * @return array Returns:
     *               On success:
     *               [
     *                   'status' => 'success',
     *                   'data'   => array
     *               ]
     *
     *               On failure:
     *               [
     *                   'status' => 'error',
     *                   'errors' => array
     *               ]
     */
    public function validate(array $post, array $files)
    {
        $fieldLabels = [];

        if (!empty($post['_field_labels'])) {
            $fieldLabels = is_array($post['_field_labels'])
                ? $post['_field_labels']
                : json_decode($post['_field_labels'], true);
        }

        unset($post['_field_labels']);

        $multipart = [];

        // Files
        foreach ($files as $field => $file) {
            if (is_array($file['name'])) {
                foreach ($file['name'] as $i => $name) {
                    if (!empty($file['tmp_name'][$i]) && file_exists($file['tmp_name'][$i])) {
                        $multipart[] = new CURLFile(
                            $file['tmp_name'][$i],
                            $file['type'][$i],
                            $name
                        );
                    }
                }
            } else {
                if (!empty($file['tmp_name'][$i]) && file_exists($file['tmp_name'][$i])) {
                    $multipart[$field] = new CURLFile(
                        $file['tmp_name'],
                        $file['type'],
                        $file['name']
                    );
                }
            }
        }

        // Flatten POST fields
        $multipart = array_merge($multipart, $this->flattenFields($post));

        $ch = curl_init($this->url);
        curl_setopt_array($ch, [
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $multipart,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 20,
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        $json = json_decode($response, true);

        if (empty($json) || ($json['status'] ?? '') !== 'success') {
            return [
                'status' => 'error',
                'errors' => $this->enhanceErrorsWithLabels(
                    $json['errors'] ?? ['Security validation failed'],
                    $fieldLabels,
                    $post
                )
            ];
        }

        return [
            'status' => 'success',
            'data' => $json['data'] ?? []
        ];
    }
    /**
     * Recursively flatten multidimensional arrays into
     * bracket notation format suitable for multipart/form-data.
     *
     * Example:
     *   ['user' => ['name' => 'John']]
     * Becomes:
     *   user[name] => John
     *
     * @param array  $fields Input array (possibly nested).
     * @param string $prefix Used internally for recursive key building.
     *
     * @return array Flattened associative array.
     */
    private function flattenFields(array $fields, $prefix = '')
    {
        $result = [];

        foreach ($fields as $key => $value) {
            $name = $prefix ? "{$prefix}[{$key}]" : $key;

            if (is_array($value)) {
                $result = array_merge($result, $this->flattenFields($value, $name));
            } else {
                $result[$name] = $value ?? '';
            }
        }

        return $result;
    }

    /**
     * Enhance error messages using human-readable field labels.
     *
     * If the security service returns errors referencing raw field names,
     * this method replaces them with user-friendly labels.
     *
     * Example:
     *   "'title' contains invalid input"
     * becomes:
     *   "'Title (title)' contains invalid input"
     *
     * @param array $errors List of error messages from security service.
     * @param array $labels Mapping of field => user-friendly label.
     * @param array $post   Original POST data (optional context).
     *
     * @return array Enhanced error messages.
     */
    private function enhanceErrorsWithLabels(array $errors, array $labels, array $post = [])
    {
        $enhanced = [];

        foreach ($errors as $error) {
            if (preg_match_all("/'([^']+)'/", $error, $matches)) {
                foreach ($matches[1] as $field) {
                    if (!empty($labels[$field])) {
                        $error = str_replace(
                            "'{$field}'",
                            "'{$labels[$field]} ({$field})'",
                            $error
                        );
                    }
                }
            }
            $enhanced[] = $error;
        }

        return $enhanced;
    }
}
