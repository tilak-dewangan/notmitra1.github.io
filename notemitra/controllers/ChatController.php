<?php

class ChatController {
    private $chatModel;

    public function __construct() {
        // ChatModel को लोड करना
        $this->chatModel = new ChatModel();
    }

    // चैट पेज को दिखाने के लिए
    public function index() {
        // चैट डेटा को प्राप्त करना
        $chats = $this->chatModel->getAllChats();
        // चैट व्यू को लोड करना
        require_once 'views/chat/index.php';
    }

    // नया संदेश भेजने के लिए
    public function sendMessage() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $message = $_POST['message'];
            $userId = $_POST['user_id'];

            // संदेश को सहेजना
            $this->chatModel->saveMessage($userId, $message);
            // संदेश भेजने के बाद चैट पेज पर वापस जाना
            header('Location: /chat');
        }
    }

    // चैट संदेशों को प्राप्त करने के लिए
    public function fetchMessages() {
        $messages = $this->chatModel->getAllMessages();
        echo json_encode($messages);
    }
}