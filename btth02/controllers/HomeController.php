<?php

class HomeController {
    public function index() {
        // Không cần lấy dữ liệu từ model, chỉ gọi trực tiếp view
        include './views/admin/home.php';
    }
}
