<?php
// URL Helper Functions

/**
 * Generate a URL for a given path.
 *
 * @param string $path The path to append to the base URL.
 * @return string The full URL.
 */
function base_url($path = '') {
    return 'http://yourdomain.com/' . ltrim($path, '/');
}

/**
 * Redirect to a specified URL.
 *
 * @param string $url The URL to redirect to.
 */
function redirect($url) {
    header("Location: " . base_url($url));
    exit();
}

/**
 * Get the current URL.
 *
 * @return string The current URL.
 */
function current_url() {
    return "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}

/**
 * Check if the current URL matches a given path.
 *
 * @param string $path The path to check against the current URL.
 * @return bool True if the current URL matches the path, false otherwise.
 */
function is_active($path) {
    return (current_url() == base_url($path)) ? 'active' : '';
}
?>