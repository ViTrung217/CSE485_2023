<?php
include './models/LoginModel.php';

class LoginService {
    private $loginModel;

    public function __construct($db) {
        $this->loginModel = new LoginModel($db);
    }

    public function authenticate($username, $password) {
        $user = $this->loginModel->getUser($username);

        if ($user && $user['password'] === $password) {
            return true;  // Login successful
        } else {
            return 'Invalid username or password';
        }
    }
}

