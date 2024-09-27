<?php

class AdminModel {
    protected $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getCountTheloai() {
        $sql = "SELECT COUNT(ma_tloai) AS count_theloai FROM theloai";
        $result = $this->db->query($sql);
        return $result->fetch_assoc()['count_theloai'];
    }

    public function getCountTacgia() {
        $sql = "SELECT COUNT(ma_tgia) AS count_tacgia FROM tacgia";
        $result = $this->db->query($sql);
        return $result->fetch_assoc()['count_tacgia'];
    }

    public function getCountBaiviet() {
        $sql = "SELECT COUNT(ma_bviet) AS count_baiviet FROM baiviet";
        $result = $this->db->query($sql);
        return $result->fetch_assoc()['count_baiviet'];
    }

    public function getCountUsers() {
        $sql = "SELECT COUNT(id) AS count_users FROM users";
        $result = $this->db->query($sql);
        return $result->fetch_assoc()['count_users'];
    }
}
