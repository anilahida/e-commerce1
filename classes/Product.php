<?php
class Product {
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function getAll() {
        $stmt = $this->db->connect()->query("
            SELECT p.*, u1.name AS created_by_name, u2.name AS updated_by_name
            FROM products p
            LEFT JOIN users u1 ON p.created_by = u1.id
            LEFT JOIN users u2 ON p.updated_by = u2.id
            ORDER BY p.id DESC
        ");
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->db->connect()->prepare("
            SELECT p.*, u1.name AS created_by_name, u2.name AS updated_by_name
            FROM products p
            LEFT JOIN users u1 ON p.created_by = u1.id
            LEFT JOIN users u2 ON p.updated_by = u2.id
            WHERE p.id = ?
        ");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($title, $description, $price, $image_path, $pdf_path, $user_id) {
        $stmt = $this->db->connect()->prepare("
            INSERT INTO products (title, description, price, image_path, pdf_path, created_by) VALUES (?, ?, ?, ?, ?, ?)
        ");
        $stmt->execute([trim($title), trim($description), (float)$price, $image_path, $pdf_path ?: null, $user_id]);
        return $this->db->connect()->lastInsertId();
    }

    public function update($id, $title, $description, $price, $image_path, $pdf_path, $user_id) {
        $stmt = $this->db->connect()->prepare("
            UPDATE products SET title = ?, description = ?, price = ?, image_path = ?, pdf_path = ?, updated_by = ? WHERE id = ?
        ");
        $stmt->execute([trim($title), trim($description), (float)$price, $image_path, $pdf_path ?: null, $user_id, $id]);
        return $stmt->rowCount();
    }

    public function delete($id) {
        $stmt = $this->db->connect()->prepare("DELETE FROM products WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->rowCount();
    }
}
