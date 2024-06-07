<?php

include 'database/connectDB.php'; // Include the database connection file

class LoginModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function authenticate($idNo, $password) {
        $stmt = $this->conn->prepare("SELECT id, full_name, section, role, imgPath, password FROM users WHERE IDNo = ?");
        if ($stmt === false) {
            die("Prepare failed: " . htmlspecialchars($this->conn->error));
        }

        $bind = $stmt->bind_param("s", $idNo);
        if ($bind === false) {
            die("Bind failed: " . htmlspecialchars($stmt->error));
        }

        $execute = $stmt->execute();
        if ($execute === false) {
            die("Execute failed: " . htmlspecialchars($stmt->error));
        }

        $stmt->store_result();
        if ($stmt->num_rows == 1) {
            $stmt->bind_result($id, $full_name, $section, $role, $imgPath, $hashedPassword);
            $stmt->fetch();

            if (password_verify($password, $hashedPassword)) {
                session_start();
                $_SESSION['id'] = $id;
                $_SESSION['full_name'] = $full_name;
                $_SESSION['section'] = $section;
                $_SESSION['idNo'] = $idNo;
                $_SESSION['role'] = $role;
                $_SESSION['imgPath'] = $imgPath;

                return $role;
            } else {
                return false;
            }
        } else {
            return false;
        }

        $stmt->close();
    }

    public function closeConnection() {
        $this->conn->close();
    }
}
?>