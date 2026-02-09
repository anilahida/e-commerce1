<?php
class Page {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function getBySlug($slug) {
        $stmt = $this->db->connect()->prepare("
            SELECT p.*, u.name AS updated_by_name FROM pages p
            LEFT JOIN users u ON p.updated_by = u.id WHERE p.slug = ?
        ");
        $stmt->execute([$slug]);
        return $stmt->fetch();
    }

    public function getAll() {
        $stmt = $this->db->connect()->query("
            SELECT p.*, u.name AS updated_by_name FROM pages p
            LEFT JOIN users u ON p.updated_by = u.id ORDER BY p.slug
        ");
        return $stmt->fetchAll();
    }

    public function update($id, $title, $content, $user_id) {
        $stmt = $this->db->connect()->prepare("UPDATE pages SET title = ?, content = ?, updated_by = ? WHERE id = ?");
        $stmt->execute([trim($title), trim($content), $user_id, $id]);
        return $stmt->rowCount();
    }
}
