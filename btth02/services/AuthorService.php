<?php
class AuthorService {
    private $authorModel;

    public function __construct($db) {
        $this->authorModel = new AuthorModel($db);
    }

    public function addAuthor($authorName) {
        return $this->authorModel->addAuthor($authorName);
    }

    public function getAuthors() {
        return $this->authorModel->getAuthors();
    }

    public function getAuthorById($authorId) {
        return $this->authorModel->getAuthorById($authorId);
    }

    public function updateAuthor($authorId, $authorName) {
        return $this->authorModel->updateAuthor($authorId, $authorName);
    }

    public function deleteAuthor($authorId) {
        return $this->authorModel->deleteAuthor($authorId);
    }
}
?>
