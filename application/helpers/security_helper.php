<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('load_security_modal')) {
    /**
     * Handle security errors - modal is now loaded in footer
     * 
     * @param array $errors Optional array of errors to display
     * @return void
     */
    function load_security_modal($errors = []) {
        $CI =& get_instance();
        
        // If errors are passed directly, set them in flashdata
        if (!empty($errors)) {
            $CI->session->set_flashdata('security_errors', $errors);
        }
        
        // Modal is now automatically loaded in footer, no need to load separate view
    }
}

if (!function_exists('add_security_error')) {
    /**
     * Add a security error to be displayed
     * 
     * @param string|array $error Error message(s) to display
     * @return void
     */
    function add_security_error($error) {
        $CI =& get_instance();
        $existing = $CI->session->flashdata('security_errors') ?: [];
        
        if (is_array($error)) {
            $existing = array_merge($existing, $error);
        } else {
            $existing[] = $error;
        }
        
        $CI->session->set_flashdata('security_errors', $existing);
    }
}
