<?php

class NotesModel {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    // नोट्स को डेटाबेस में जोड़ने के लिए
    public function addNote($userId, $title, $content, $filePath) {
        $query = "INSERT INTO notes (user_id, title, content, file_path, created_at) VALUES (:user_id, :title, :content, :file_path, NOW())";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':user_id', $userId);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':file_path', $filePath);
        return $stmt->execute();
    }

    // सभी नोट्स प्राप्त करने के लिए
    public function getAllNotes($userId) {
        $query = "SELECT * FROM notes WHERE user_id = :user_id ORDER BY created_at DESC";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':user_id', $userId);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // एक विशेष नोट प्राप्त करने के लिए
    public function getNoteById($noteId) {
        $query = "SELECT * FROM notes WHERE id = :note_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':note_id', $noteId);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // नोट को अपडेट करने के लिए
    public function updateNote($noteId, $title, $content) {
        $query = "UPDATE notes SET title = :title, content = :content WHERE id = :note_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':note_id', $noteId);
        return $stmt->execute();
    }

    // नोट को हटाने के लिए
    public function deleteNote($noteId) {
        $query = "DELETE FROM notes WHERE id = :note_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':note_id', $noteId);
        return $stmt->execute();
    }
}