<?php
// index.php - Main Entrance Point, Front Controller

// Autoload classes
spl_autoload_register(function ($class_name) {
    $file = __DIR__ . '/controllers/' . $class_name . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
});

// Start session
session_start();

// Load configuration
require_once 'config/db.php';
require_once 'config/app.php';
require_once 'config/payment_gateway.php';

// Define routes
$request_uri = $_SERVER['REQUEST_URI'];
$request_method = $_SERVER['REQUEST_METHOD'];

// Simple routing mechanism
if ($request_uri == '/' || $request_uri == '/home') {
    $controller = new HomeController();
    $controller->index();
} elseif ($request_uri == '/login' && $request_method == 'POST') {
    $controller = new UserController();
    $controller->login();
} elseif ($request_uri == '/register' && $request_method == 'POST') {
    $controller = new UserController();
    $controller->register();
} elseif ($request_uri == '/notes') {
    $controller = new NotesController();
    $controller->index();
} elseif ($request_uri == '/chat') {
    $controller = new ChatController();
    $controller->index();
} elseif ($request_uri == '/videos') {
    $controller = new VideoController();
    $controller->index();
} elseif ($request_uri == '/jobs') {
    $controller = new JobController();
    $controller->index();
} else {
    // 404 Not Found
    header("HTTP/1.0 404 Not Found");
    echo "404 Not Found";
}
?>