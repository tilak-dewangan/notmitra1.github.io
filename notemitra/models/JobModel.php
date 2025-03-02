<?php

class JobModel {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function createJob($data) {
        $query = "INSERT INTO jobs (title, description, company, location, salary, created_at) VALUES (:title, :description, :company, :location, :salary, NOW())";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':company', $data['company']);
        $stmt->bindParam(':location', $data['location']);
        $stmt->bindParam(':salary', $data['salary']);
        return $stmt->execute();
    }

    public function getJobs() {
        $query = "SELECT * FROM jobs ORDER BY created_at DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getJobById($id) {
        $query = "SELECT * FROM jobs WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateJob($id, $data) {
        $query = "UPDATE jobs SET title = :title, description = :description, company = :company, location = :location, salary = :salary WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':title', $data['title']);
        $stmt->bindParam(':description', $data['description']);
        $stmt->bindParam(':company', $data['company']);
        $stmt->bindParam(':location', $data['location']);
        $stmt->bindParam(':salary', $data['salary']);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function deleteJob($id) {
        $query = "DELETE FROM jobs WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}