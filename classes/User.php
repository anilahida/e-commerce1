<?php
class User {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function findByEmail($email) {
        $stmt = $this->db->connect()->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch();
    }

    public function findById($id) {
        $stmt = $this->db->connect()->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($name, $email, $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->connect()->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, 'user')");
        $stmt->execute([trim($name), trim($email), $hash]);
        return $this->db->connect()->lastInsertId();
    }

    public function getAll() {
        $stmt = $this->db->connect()->query("SELECT id, name, email, role, created_at FROM users ORDER BY id");
        return $stmt->fetchAll();
    }
}
