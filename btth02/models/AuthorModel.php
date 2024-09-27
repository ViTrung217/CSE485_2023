<?php
class AuthorModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function addAuthor($authorName) {
        $stmt = $this->db->prepare("INSERT INTO tacgia (ten_tgia) VALUES (?)");
        $stmt->bind_param("s", $authorName);
        return $stmt->execute();
    }

    public function getAuthors() {
        $result = $this->db->query("SELECT ma_tgia, ten_tgia FROM tacgia");
        return $result;
    }

    public function getAuthorById($authorId) {
        $stmt = $this->db->prepare("SELECT * FROM tacgia WHERE ma_tgia = ?");
        $stmt->bind_param("i", $authorId);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function updateAuthor($authorId, $authorName) {
        $stmt = $this->db->prepare("UPDATE tacgia SET ten_tgia = ? WHERE ma_tgia = ?");
        $stmt->bind_param("si", $authorName, $authorId);
        return $stmt->execute();
    }

    public function deleteAuthor($authorId) {
        $stmt = $this->db->prepare("DELETE FROM tacgia WHERE ma_tgia = ?");
        $stmt->bind_param("i", $authorId);
        return $stmt->execute();
    }
}
?>
