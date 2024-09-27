<?php
class ArticleModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function addArticle($title, $songName, $categoryId, $summary, $content, $authorId, $date, $image) {
        // Kiểm tra mã thể loại và mã tác giả
        $checkCategory = $this->db->prepare("SELECT COUNT(*) FROM theloai WHERE ma_tloai = ?");
        $checkCategory->bind_param("i", $categoryId);
        $checkCategory->execute();
        $categoryExists = $checkCategory->get_result()->fetch_row()[0] > 0;

        $checkAuthor = $this->db->prepare("SELECT COUNT(*) FROM tacgia WHERE ma_tgia = ?");
        $checkAuthor->bind_param("i", $authorId);
        $checkAuthor->execute();
        $authorExists = $checkAuthor->get_result()->fetch_row()[0] > 0;

        if ($categoryExists && $authorExists) {
            $stmt = $this->db->prepare("INSERT INTO baiviet (tieude, ten_bhat, ma_tloai, tomtat, noidung, ma_tgia, ngayviet, hinhanh) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssississ", $title, $songName, $categoryId, $summary, $content, $authorId, $date, $image);
            return $stmt->execute();
        }
        
        return false; 
    }

    public function getArticles() {
        $result = $this->db->query("SELECT * FROM baiviet");
        return $result;
    }

    public function getArticleById($articleId) {
        $stmt = $this->db->prepare("SELECT * FROM baiviet WHERE ma_bviet = ?");
        $stmt->bind_param("i", $articleId);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function updateArticle($articleId, $title, $songName, $categoryId, $summary, $content, $authorId, $date, $image) {
        // Kiểm tra mã thể loại và mã tác giả
        $checkCategory = $this->db->prepare("SELECT COUNT(*) FROM theloai WHERE ma_tloai = ?");
        $checkCategory->bind_param("i", $categoryId);
        $checkCategory->execute();
        $categoryExists = $checkCategory->get_result()->fetch_row()[0] > 0;

        $checkAuthor = $this->db->prepare("SELECT COUNT(*) FROM tacgia WHERE ma_tgia = ?");
        $checkAuthor->bind_param("i", $authorId);
        $checkAuthor->execute();
        $authorExists = $checkAuthor->get_result()->fetch_row()[0] > 0;

        if ($categoryExists && $authorExists) {
            $stmt = $this->db->prepare("UPDATE baiviet SET tieude = ?, ten_bhat = ?, ma_tloai = ?, tomtat = ?, noidung = ?, ma_tgia = ?, ngayviet = ?, hinhanh = ? WHERE ma_bviet = ?");
            $stmt->bind_param("ssississi", $title, $songName, $categoryId, $summary, $content, $authorId, $date, $image, $articleId);
            return $stmt->execute();
        }
        
        return false; // Trả về false nếu không tồn tại mã thể loại hoặc tác giả
    }

    public function deleteArticle($articleId) {
        $stmt = $this->db->prepare("DELETE FROM baiviet WHERE ma_bviet = ?");
        $stmt->bind_param("i", $articleId);
        return $stmt->execute();
    }
}
?>
