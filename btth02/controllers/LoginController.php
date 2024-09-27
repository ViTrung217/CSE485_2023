<?php
include './services/LoginService.php';

class LoginController {
    private $loginService;

    public function __construct($db) {
        $this->loginService = new LoginService($db);
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $result = $this->loginService->authenticate($username, $password);

            if ($result === true) {
                header('Location: index.php?controller=article&action=index');
            } else {
                $message = $result;
                include './views/login/login.php';
            }
        } else {
            $this->showLoginForm();
        }
    }

    public function showLoginForm() {
        include './views/login/login.php';
    }
}


