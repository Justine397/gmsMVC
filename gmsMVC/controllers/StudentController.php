<?php
require_once '../models/UserModel.php';
require_once '../database/connectDB.php';

class StudentController {
    public $UserModel;
    public $conn;

    public function __construct($conn) {
        $this->UserModel = new UserModel(); 
        $this->conn = $conn;
    }

    public function studentFetchGrades($year) {
        $grades = $this->UserModel->studentFetchGrades($year);
        return $grades;
    }

    public function getUserInfo() {
        return $this->UserModel->getUserInfo();
    }
}
?>
