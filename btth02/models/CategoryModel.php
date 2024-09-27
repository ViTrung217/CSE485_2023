<?php
class CategoryModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function addCategory($categoryName) {
        $stmt = $this->db->prepare("INSERT INTO theloai (ten_tloai) VALUES (?)");
        $stmt->bind_param("s", $categoryName);
        return $stmt->execute();
    }

    public function getCategories() {
        $result = $this->db->query("SELECT ma_tloai, ten_tloai FROM theloai");
        return $result;
    }

    public function getCategoryById($categoryId) {
        $stmt = $this->db->prepare("SELECT * FROM theloai WHERE ma_tloai = ?");
        $stmt->bind_param("i", $categoryId);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function updateCategory($categoryId, $categoryName) {
        $stmt = $this->db->prepare("UPDATE theloai SET ten_tloai = ? WHERE ma_tloai = ?");
        $stmt->bind_param("si", $categoryName, $categoryId);
        return $stmt->execute();
    }

    public function deleteCategory($categoryId) {
        $stmt = $this->db->prepare("DELETE FROM theloai WHERE ma_tloai = ?");
        $stmt->bind_param("i", $categoryId);
        return $stmt->execute();
    }
}
?>
