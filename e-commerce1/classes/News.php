<?php
class News {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function getAll() {
        $stmt = $this->db->connect()->query("
            SELECT n.*, u1.name AS created_by_name, u2.name AS updated_by_name
            FROM news n
            LEFT JOIN users u1 ON n.created_by = u1.id
            LEFT JOIN users u2 ON n.updated_by = u2.id
            ORDER BY n.id DESC
        ");
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->db->connect()->prepare("
            SELECT n.*, u1.name AS created_by_name, u2.name AS updated_by_name FROM news n
            LEFT JOIN users u1 ON n.created_by = u1.id
            LEFT JOIN users u2 ON n.updated_by = u2.id
            WHERE n.id = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($title, $content, $image_path, $user_id) {
        $stmt = $this->db->connect()->prepare("INSERT INTO news (title, content, image_path, created_by) VALUES (?, ?, ?, ?)");
        $stmt->execute([trim($title), trim($content), $image_path, $user_id]);
        return $this->db->connect()->lastInsertId();
    }

    public function update($id, $title, $content, $image_path, $user_id) {
        $stmt = $this->db->connect()->prepare("UPDATE news SET title = ?, content = ?, image_path = ?, updated_by = ? WHERE id = ?");
        $stmt->execute([trim($title), trim($content), $image_path, $user_id, $id]);
        return $stmt->rowCount();
    }

    public function delete($id) {
        $stmt = $this->db->connect()->prepare("DELETE FROM news WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->rowCount();
    }
}
