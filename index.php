<?php
include 'database/connectDB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once 'controllers/LoginController.php'; 

    $controller = new LoginController($conn); 

    $controller->login($_POST['idNo'], $_POST['password']);
    exit(); 
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grade Management System</title>
    <link rel="stylesheet" href="assets/css/login.css">
</head>
<body>
    <div class="container1">
        <div class="container2">
            <div class="container3">
                <div class="mainContainer">
                    <form action="" method="post">
                        <div class="headerContainer">
                            <header>
                                <span>
                                    <h3>Sign In</h3>
                                    <p>Please Enter your User Information</p>
                                </span>
                            </header>
                        </div>
                        <hr>
                        <br>
                        <input type="text" name="idNo" placeholder="ID No." required>
                        <input type="password" name="password" placeholder="Password" required>
                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">Remember Me</label>
                        </div>
                        <br>
                        <input type="submit" value="Login" id="loginBTN">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
