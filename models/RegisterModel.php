<?php
require_once '../database/connectDB.php';

class RegisterModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function registerUser($fullName, $idNo, $section, $password, $role) {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->conn->prepare("INSERT INTO users (full_name, idNo, section, password, role) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $fullName, $idNo, $section, $hashedPassword, $role);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
?>