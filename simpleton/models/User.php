<?php
class User {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function getUserById($id) {
        return $this->db->query('select * from user where id = ' . $id);
    }

    public function getUserByUsername($username) {
        return $this->db->query("select * from user where username = '$username'");
    }
}