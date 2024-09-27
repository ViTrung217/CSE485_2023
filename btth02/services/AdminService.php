<?php
class AdminService {
    protected $adminModel;

    public function __construct($db) {
        $this->adminModel = new AdminModel($db);
    }

    public function getCountData() {
        return [
            'count_theloai' => $this->adminModel->getCountTheloai(),
            'count_tacgia' => $this->adminModel->getCountTacgia(),
            'count_baiviet' => $this->adminModel->getCountBaiviet(),
            'count_users' => $this->adminModel->getCountUsers(),
        ];
    }
}
