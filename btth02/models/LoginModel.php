<?php
class LoginModel {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getUser($username) {
        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
}

