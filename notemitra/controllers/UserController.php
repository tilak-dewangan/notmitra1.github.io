<?php

class UserController {
    
    private $userModel;

    public function __construct() {
        // UserModel का एक उदाहरण बनाना
        $this->userModel = new UserModel();
    }

    // उपयोगकर्ता पंजीकरण के लिए फ़ंक्शन
    public function register() {
        // पंजीकरण फ़ॉर्म से डेटा प्राप्त करना
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $email = $_POST['email'];

            // उपयोगकर्ता को पंजीकृत करना
            if ($this->userModel->register($username, $password, $email)) {
                // सफल पंजीकरण के बाद रीडायरेक्ट करना
                header('Location: /user/login');
            } else {
                // पंजीकरण में त्रुटि
                echo "पंजीकरण में त्रुटि। कृपया पुनः प्रयास करें।";
            }
        }

        // पंजीकरण दृश्य दिखाना
        require_once '../views/user/register.php';
    }

    // उपयोगकर्ता लॉगिन के लिए फ़ंक्शन
    public function login() {
        // लॉगिन फ़ॉर्म से डेटा प्राप्त करना
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            // उपयोगकर्ता को लॉगिन करना
            if ($this->userModel->login($username, $password)) {
                // सफल लॉगिन के बाद रीडायरेक्ट करना
                header('Location: /home');
            } else {
                // लॉगिन में त्रुटि
                echo "लॉगिन में त्रुटि। कृपया पुनः प्रयास करें।";
            }
        }

        // लॉगिन दृश्य दिखाना
        require_once '../views/user/login.php';
    }

    // उपयोगकर्ता लॉगआउट के लिए फ़ंक्शन
    public function logout() {
        // उपयोगकर्ता को लॉगआउट करना
        session_start();
        session_destroy();
        header('Location: /user/login');
    }
}