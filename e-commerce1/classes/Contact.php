<?php
class Contact {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function save($name, $email, $subject, $message) {
        $stmt = $this->db->connect()->prepare("INSERT INTO contact_messages (name, email, subject, message) VALUES (?, ?, ?, ?)");
        $stmt->execute([trim($name), trim($email), trim($subject), trim($message)]);
        return $this->db->connect()->lastInsertId();
    }

    public function getAll() {
        $stmt = $this->db->connect()->query("SELECT * FROM contact_messages ORDER BY id DESC");
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->db->connect()->prepare("SELECT * FROM contact_messages WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }
}
