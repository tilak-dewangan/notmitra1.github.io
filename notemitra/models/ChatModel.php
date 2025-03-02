<?php

class ChatModel {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    // Method to send a chat message
    public function sendMessage($userId, $message, $chatRoomId) {
        $stmt = $this->db->prepare("INSERT INTO chat_messages (user_id, message, chat_room_id, created_at) VALUES (?, ?, ?, NOW())");
        $stmt->bind_param("isi", $userId, $message, $chatRoomId);
        return $stmt->execute();
    }

    // Method to retrieve chat messages
    public function getMessages($chatRoomId) {
        $stmt = $this->db->prepare("SELECT * FROM chat_messages WHERE chat_room_id = ? ORDER BY created_at ASC");
        $stmt->bind_param("i", $chatRoomId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Method to delete a chat message
    public function deleteMessage($messageId) {
        $stmt = $this->db->prepare("DELETE FROM chat_messages WHERE id = ?");
        $stmt->bind_param("i", $messageId);
        return $stmt->execute();
    }
}