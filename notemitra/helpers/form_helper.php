<?php
// Form Helper Functions

/**
 * Validate a form field
 *
 * @param string $field The name of the field to validate
 * @param mixed $value The value of the field
 * @param array $rules The validation rules
 * @return bool True if valid, false otherwise
 */
function validate_form_field($field, $value, $rules) {
    foreach ($rules as $rule) {
        switch ($rule) {
            case 'required':
                if (empty($value)) {
                    return false;
                }
                break;
            case 'email':
                if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
                    return false;
                }
                break;
            // Add more validation rules as needed
        }
    }
    return true;
}

/**
 * Sanitize form input
 *
 * @param string $data The input data to sanitize
 * @return string The sanitized data
 */
function sanitize_input($data) {
    return htmlspecialchars(trim($data));
}

/**
 * Generate a CSRF token
 *
 * @return string The generated CSRF token
 */
function generate_csrf_token() {
    return bin2hex(random_bytes(32));
}

/**
 * Validate a CSRF token
 *
 * @param string $token The token to validate
 * @return bool True if valid, false otherwise
 */
function validate_csrf_token($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}
?>