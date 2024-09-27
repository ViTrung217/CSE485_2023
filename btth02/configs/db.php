<?php
$servername = "localhost"; // Tên server của bạn
$username = "root";        // Username MySQL
$password = "";            // Mật khẩu MySQL (nếu có)
$dbname = "btth01_CSE485"; // Tên cơ sở dữ liệu

// Tạo kết nối
$db = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($db->connect_error) {
    die("Kết nối thất bại: " . $db->connect_error);
}
?> 
