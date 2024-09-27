<?php
class ArticleService {
    private $articleModel;

    public function __construct($db) {
        $this->articleModel = new ArticleModel($db);
    }

    public function addArticle($title, $songName, $categoryId, $summary, $content, $authorId, $date, $image) {
        return $this->articleModel->addArticle($title, $songName, $categoryId, $summary, $content, $authorId, $date, $image);
    }

    public function getArticles() {
        return $this->articleModel->getArticles();
    }

    public function getArticleById($articleId) {
        return $this->articleModel->getArticleById($articleId);
    }

    public function updateArticle($articleId, $title, $songName, $categoryId, $summary, $content, $authorId, $date, $image) {
        return $this->articleModel->updateArticle($articleId, $title, $songName, $categoryId, $summary, $content, $authorId, $date, $image);
    }

    public function deleteArticle($articleId) {
        return $this->articleModel->deleteArticle($articleId);
    }
}
?>
