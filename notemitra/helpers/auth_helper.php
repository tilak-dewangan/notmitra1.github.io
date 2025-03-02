<?php
// Authentication Helper Functions

/**
 * Check if the user is logged in
 * 
 * @return bool
 */
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

/**
 * Redirect to a specified URL
 * 
 * @param string $url
 * @return void
 */
function redirect($url) {
    header("Location: $url");
    exit();
}

/**
 * Get the currently logged-in user's information
 * 
 * @return array|null
 */
function getCurrentUser() {
    if (isLoggedIn()) {
        return $_SESSION['user_data'];
    }
    return null;
}

/**
 * Log the user in by setting session variables
 * 
 * @param array $userData
 * @return void
 */
function loginUser($userData) {
    $_SESSION['user_id'] = $userData['id'];
    $_SESSION['user_data'] = $userData;
}

/**
 * Log the user out by destroying the session
 * 
 * @return void
 */
function logoutUser() {
    session_unset();
    session_destroy();
}
?>