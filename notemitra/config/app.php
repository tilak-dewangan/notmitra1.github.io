<?php
// Application Configuration Settings

return [
    'app_name' => 'NoteMitra',
    'app_version' => '1.0',
    'base_url' => 'http://localhost/notemitra',
    'timezone' => 'Asia/Kolkata',
    'debug_mode' => true,
    'default_language' => 'en',
    'items_per_page' => 10,
    'session_timeout' => 30, // in minutes
    'allowed_file_types' => [
        'notes' => ['pdf', 'jpg', 'jpeg', 'png', 'txt'],
        'videos' => ['mp4', 'avi', 'mov'],
        'audio' => ['mp3', 'wav']
    ],
    'max_upload_size' => 10485760, // 10 MB
];