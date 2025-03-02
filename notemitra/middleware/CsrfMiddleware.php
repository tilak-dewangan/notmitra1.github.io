<?php

class CsrfMiddleware {
    public function handle($request) {
        // CSRF token validation
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
                // CSRF token is invalid, handle the error
                http_response_code(403);
                echo "CSRF token validation failed.";
                exit;
            }
        }
    }

    public function generateToken() {
        // Generate a new CSRF token
        if (empty($_SESSION['csrf_token'])) {
            $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
        }
        return $_SESSION['csrf_token'];
    }
}