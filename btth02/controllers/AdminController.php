<?php
require_once './models/AdminModel.php';
require_once './services/AdminService.php';

class AdminController {
    protected $adminService;

    public function __construct($db) {
        $this->adminService = new AdminService($db);
    }

    public function index() {
        // Lấy số lượng thể loại, tác giả, bài viết và người dùng
        $countData = $this->adminService->getCountData();

        // Gửi dữ liệu tới view để hiển thị
        include './views/home/DatabaseView.php';
    }
}
