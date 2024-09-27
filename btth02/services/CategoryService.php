<?php
class CategoryService {
    private $categoryModel;

    public function __construct($db) {
        $this->categoryModel = new CategoryModel($db);
    }

    public function addCategory($categoryName) {
        return $this->categoryModel->addCategory($categoryName);
    }

    public function getCategories() {
        return $this->categoryModel->getCategories();
    }

    public function getCategoryById($categoryId) {
        return $this->categoryModel->getCategoryById($categoryId);
    }

    public function updateCategory($categoryId, $categoryName) {
        return $this->categoryModel->updateCategory($categoryId, $categoryName);
    }

    public function deleteCategory($categoryId) {
        return $this->categoryModel->deleteCategory($categoryId);
    }
}
?>
