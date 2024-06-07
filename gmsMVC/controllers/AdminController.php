<?php
require_once '../models/UserModel.php';
require_once '../database/connectDB.php';
require_once '../models/AdminModel.php';

class AdminController {
    public $UserModel;
    public $AdminModel;
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
    
    public function searchUsers($query, $user_role){
        //need
    }

    public function userCount(){
        $this->AdminModel = new AdminModel(); 
        return $this->AdminModel->userCount();
    }
}
?>
