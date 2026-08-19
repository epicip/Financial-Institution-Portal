<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('xss_payload_detected')) {
    function xss_payload_detected($value)
    {
        if (!is_string($value) || $value === '') {
            return false;
        }

        if (function_exists('remove_invisible_characters')) {
            $value = remove_invisible_characters($value);
        }

        if (preg_match('/<[^>]*>/', $value)) {
            return true;
        }
        if (preg_match('/javascript:/i', $value)) {
            return true;
        }
        if (preg_match('/on\w+\s*=/i', $value)) {
            return true;
        }
        if (preg_match('/data:\s*text\/html/i', $value)) {
            return true;
        }
        if (preg_match('/vbscript:/i', $value)) {
            return true;
        }

        return false;
    }
}

if (!function_exists('xss_scan_array')) {
    function xss_scan_array(array $data, $prefix = '', array $skipKeys = [])
    {
        $errors = [];
        $skip = array_merge(
            ['_field_labels', 'token', 'g-recaptcha-response'],
            $skipKeys
        );

        foreach ($data as $key => $value) {
            if (in_array($key, $skip, true)) {
                continue;
            }

            $path = ($prefix === '') ? (string) $key : $prefix . '.' . $key;

            if (is_array($value)) {
                $errors = array_merge($errors, xss_scan_array($value, $path, $skipKeys));
                continue;
            }

            if (xss_payload_detected($value)) {
                $label = ucwords(str_replace(['_', '.'], ' ', $path));
                $errors[] = 'Invalid characters detected in: ' . $label;
            }
        }

        return $errors;
    }
}

if (!function_exists('xss_enhance_errors')) {
    function xss_enhance_errors(array $errors, array $fieldLabels = [])
    {
        if (empty($fieldLabels)) {
            return $errors;
        }

        $out = [];
        foreach ($errors as $msg) {
            foreach ($fieldLabels as $field => $label) {
                if (stripos($msg, (string) $field) !== false) {
                    $msg = 'Invalid input in: ' . $label;
                    break;
                }
            }
            $out[] = $msg;
        }

        return $out ?: $errors;
    }
}