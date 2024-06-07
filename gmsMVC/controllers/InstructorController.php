<?php
require_once '../models/UserModel.php';
require_once '../database/connectDB.php';

class InstructorController {
    public $UserModel;
    public $conn;

    public function __construct($conn) {
        $this->UserModel = new UserModel(); 
        $this->conn = $conn;
    }

    public function getUserInfo() {
        return $this->UserModel->getUserInfo();
    }

    public function fetchUsers(){
        return $this->UserModel->fetchUsers();
    }
}
?>
