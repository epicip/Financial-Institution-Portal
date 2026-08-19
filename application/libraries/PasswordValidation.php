<?php 

class PasswordValidation
{

    protected $CI;

    public function __construct()
    {
        // Get CI instance
        $this->CI =& get_instance();
        // Load custom config file
        $this->CI->load->config('password');
    }

    /**
     * Validates the provided password according to the specified criteria.
     * 
     * The password must:
     * - Be at least 8 characters long
     * - Contain at least 1 uppercase letter
     * - Contain at least 1 lowercase letter
     * - Contain at least 1 number
     * - Contain at least 1 special character (@#$^*-)
     * - Not contain any spaces
     * 
     * @param string $password The password to be validated.
     * @return mixed Returns a string with error messages if validation fails, or `true` if validation is successful.
     */
    public function validatePassword($password, $user_password)
    {

        // Step 1: Check if the new password is the same as the old one
        if (password_verify($password, $user_password)) {
            // If the new password is the same as the current password, throw an error
            return "New password cannot be the same as the current password.";
        }


        // Step 2: Check if the new password meets all specified criteria
        $errors = 'Password must be at least ';
        $errorMessages = [];

        // Check length of password
        if (strlen($password) < $this->CI->config->item('min_char')) {
            $errorMessages[] = $this->CI->config->item('min_char').' characters long';
        }

        // Check for at least one uppercase letter
        if (!preg_match('/[A-Z]/', $password)) {
            $errorMessages[] = '1 capital letter';
        }

        // Check for at least one lowercase letter
        if (!preg_match('/[a-z]/', $password)) {
            $errorMessages[] = '1 small letter';
        }

        // Check for at least one number
        if (!preg_match('/\d/', $password)) {
            $errorMessages[] = '1 number';
        }

        // Check for at least one special character
        if (!preg_match('/[@#$^*-]/', $password)) {
            $errorMessages[] = "1 special character (@#$^*-)";
        }

        // Check if password contains spaces
        if (strpos($password, ' ') !== false) {
            $errorMessages[] = 'not contain spaces';
        }

        // Check length of password
        if (strlen($password) > $this->CI->config->item('max_char')) {
            $errorMessages[] = 'maximum of '.$this->CI->config->item('max_char').' characters long';
        }

        // If there are any error messages, return them concatenated
        if (!empty($errorMessages)) {
            return $errors . implode(', ', $errorMessages) . '.';
        }

        // If all conditions are met, return success
        return true;
    }

}
