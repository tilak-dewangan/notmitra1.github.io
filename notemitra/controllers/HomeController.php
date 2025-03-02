<?php

class HomeController {
    public function index() {
        // Load the home view
        require_once '../views/home/index.php';
    }

    public function dashboard() {
        // Load the dashboard view
        require_once '../views/home/dashboard.php';
    }

    public function customFeed() {
        // Logic for custom feed
        // Fetch data and pass it to the view
        $data = []; // Fetch data from models
        require_once '../views/home/custom_feed.php';
    }

    public function notifications() {
        // Logic for notifications
        // Fetch notifications and pass it to the view
        $notifications = []; // Fetch notifications from models
        require_once '../views/home/notifications.php';
    }
}