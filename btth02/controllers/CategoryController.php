<?php
require_once './models/CategoryModel.php';
require_once './services/CategoryService.php';

class CategoryController {
    private $categoryService;

    public function __construct($db) {
        $this->categoryService = new CategoryService($db);
    }

    public function index() {
        $result = $this->categoryService->getCategories();
        include './views/category/ListCategories.php';
    }

    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $categoryName = $_POST['ten_tloai'];
            $this->categoryService->addCategory($categoryName);
            header("Location: index.php?controller=category&action=index");
            exit();
        }
        include './views/category/CreateCategory.php';
    }

    public function edit() {
        $categoryId = $_GET['id'];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $categoryName = $_POST['ten_tloai'];
            $this->categoryService->updateCategory($categoryId, $categoryName);
            header("Location: index.php?controller=category&action=index");
            exit();
        }
        $category = $this->categoryService->getCategoryById($categoryId);
        include './views/category/UpdateCategory.php';
    }

    public function delete() {
        $categoryId = $_GET['id'];
        $this->categoryService->deleteCategory($categoryId);
        header("Location: index.php?controller=category&action=index");
        exit();
    }
}
?>
