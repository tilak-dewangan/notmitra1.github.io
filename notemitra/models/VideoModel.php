<?php

class VideoModel {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function getAllVideos() {
        $query = "SELECT * FROM videos";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getVideoById($id) {
        $query = "SELECT * FROM videos WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addVideo($data) {
        $query = "INSERT INTO videos (title, description, file_path, created_at) VALUES (:title, :description, :file_path, NOW())";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':file_path', $data['file_path']);
        return $stmt->execute();
    }

    public function updateVideo($id, $data) {
        $query = "UPDATE videos SET title = :title, description = :description WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function deleteVideo($id) {
        $query = "DELETE FROM videos WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}