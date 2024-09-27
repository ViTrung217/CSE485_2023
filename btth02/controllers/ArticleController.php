<?php
require_once './models/ArticleModel.php';
require_once './services/ArticleService.php';

class ArticleController {
    private $articleService;

    public function __construct($db) {
        $this->articleService = new ArticleService($db);
    }

    public function index() {
        $result = $this->articleService->getArticles();
        include './views/article/ListArticle.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['tieude'];
            $songName = $_POST['ten_bhat'];
            $categoryId = $_POST['ma_tloai'];
            $summary = $_POST['tomtat'];
            $content = $_POST['noidung'];
            $authorId = $_POST['ma_tgia'];
            $date = $_POST['ngayviet'];
            $image = $_FILES['hinhanh']['name'];

            // Xử lý upload hình ảnh (nếu có)
            if (!empty($image)) {
                move_uploaded_file($_FILES['hinhanh']['tmp_name'], "uploads/" . $image);
            }

            if ($this->articleService->addArticle($title, $songName, $categoryId, $summary, $content, $authorId, $date, $image)) {
                header("Location: index.php?controller=article&action=index");
                exit();
            } else {
                $error = "Mã thể loại hoặc tác giả không tồn tại.";
            }
        }
        include './views/article/CreateArticle.php';
    }

    public function edit() {
        $articleId = $_GET['id'];
        $article = $this->articleService->getArticleById($articleId);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $title = $_POST['tieude'];
            $songName = $_POST['ten_bhat'];
            $categoryId = $_POST['ma_tloai'];
            $summary = $_POST['tomtat'];
            $content = $_POST['noidung'];
            $authorId = $_POST['ma_tgia'];
            $date = $_POST['ngayviet'];
            $image = $_FILES['hinhanh']['name'];

            // Xử lý upload hình ảnh (nếu có)
            if (!empty($image)) {
                move_uploaded_file($_FILES['hinhanh']['tmp_name'], "uploads/" . $image);
            } else {
                $image = $article['hinhanh']; // Giữ nguyên hình ảnh cũ nếu không upload hình mới
            }

            if ($this->articleService->updateArticle($articleId, $title, $songName, $categoryId, $summary, $content, $authorId, $date, $image)) {
                header("Location: index.php?controller=article&action=index");
                exit();
            } else {
                $error = "Mã thể loại hoặc tác giả không tồn tại.";
            }
        }
        include './views/article/UpdateArticle.php';
    }

    public function delete() {
        $articleId = $_GET['id'];
        $this->articleService->deleteArticle($articleId);
        header("Location: index.php?controller=article&action=index");
        exit();
    }
}
?>
