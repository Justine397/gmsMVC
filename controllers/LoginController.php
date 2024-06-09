<?php

include 'models/LoginModel.php';
include 'database/connectDB.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idNo = $_POST['idNo'];
    $password = $_POST['password'];

    $loginModel = new LoginModel($conn); 
    $role = $loginModel->authenticate($idNo, $password);

    if ($role) {
        switch ($role) {
            case 'student':
                header("Location: views/student.php");
                break;
            case 'admin':
                header("Location: views/admin.php");
                break;
            case 'instructor':
                header("Location: views/instructor.php");
                break;
            default:
                echo "<script>alert('Unknown role.'); history.back();</script>";
                break;
        }
    } else {
        echo "<script>alert('Invalid ID No. or Password.'); history.back();</script>";
    }

    $loginModel->closeConnection();
}
?>
