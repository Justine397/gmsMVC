<?php

require_once '../models/RegisterModel.php';
require_once '../database/connectDB.php';

class RegisterController {
    private $registerModel;
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
        $this->registerModel = new registerModel($conn);
    }

    public function registerUser($fullName, $idNo, $section, $password, $confirmPassword, $role) {
        if ($password !== $confirmPassword) {
            echo "<script>alert('Passwords do not match');</script>"; // it still register
        }
        if ($this->userExists($idNo)) {
            echo "<script>alert('User with the same ID No. already exists');</script>";
        }

        if ($this->registerModel->registerUser($fullName, $idNo, $section, $password, $role)) {
           echo "<script>alert('Registration successful!');</script>";
        } else {
            echo "<script>alert('Failed to register user');</script>";
        }
    }

    private function userExists($idNo) {
        $stmt = $this->conn->prepare("SELECT id FROM users WHERE idNo = ?");
        $stmt->bind_param("s", $idNo);
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows > 0;
    }
}
?>