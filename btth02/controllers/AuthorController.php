<?php
require_once './models/AuthorModel.php';
require_once './services/AuthorService.php';

class AuthorController {
    private $authorService;

    public function __construct($db) {
        $this->authorService = new AuthorService($db);
    }

    public function index() {
        $result = $this->authorService->getAuthors();
        include './views/author/ListAuthors.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $authorName = $_POST['ten_tgia'];
            $this->authorService->addAuthor($authorName);
            header("Location: index.php?controller=author&action=index");
            exit();
        }
        include './views/author/CreateAuthor.php';
    }

    public function edit() {
        $authorId = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $authorName = $_POST['ten_tgia'];
            $this->authorService->updateAuthor($authorId, $authorName);
            header("Location: index.php?controller=author&action=index");
            exit();
        }
        $author = $this->authorService->getAuthorById($authorId);
        include './views/author/UpdateAuthor.php';
    }

    public function delete() {
        $authorId = $_GET['id'];
        $this->authorService->deleteAuthor($authorId);
        header("Location: index.php?controller=author&action=index");
        exit();
    }
}
?>
