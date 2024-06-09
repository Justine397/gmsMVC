<?php
require_once '../controllers/RegisterController.php';
require_once '../database/connectDB.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullName = $_POST['wholeName'];
    $idNo = $_POST['idNo'];
    $section = $_POST['section'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];
    $role = $_POST['role'];

    $RegisterController = new RegisterController($conn);
    $registrationResult = $RegisterController->registerUser($fullName, $idNo, $section, $password, $confirmPassword, $role);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMS Register</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/register.css">
</head>
<body>
    <div class="container1">
        <div class="container2">
            <div class="container3">
                <div class="mainContainer">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" onsubmit="return matchPassword()">
                        <div class="headerContainer">
                            <header>
                                <span>
                                    <h3>Register Form</h3>
                                    <p>Please Enter your User Information</p>
                                </span>
                            </header>
                        </div>
                        <hr>
                        <br>
                        <?php if (isset($registrationResult)): ?>
                            <div class="registration-message"><?php echo $registrationResult; ?></div>
                        <?php endif; ?>
                        <input type="text" name="wholeName" placeholder="Complete Name (ex. Juan Dela Cruz)" required>
                        <input type="text" name="idNo" placeholder="ID No." required>
                        <input type="text" name="section" placeholder="Section (ex. 4-G)">
                        <input type="password" name="password" placeholder="Password" id="password" required>
                        <input type="password" name="confirm_password" placeholder="Confirm Password" id="confirm_password" required>
                        
                        <div class="radio">
                            <input type="radio" id="admin" name="role" value="admin" required>
                            <label for="admin"><img src="../assets/images/icons/admin.png" alt="Admin"> Admin</label>
                            
                            <input type="radio" id="student" name="role" value="student" required>
                            <label for="student"><img src="../assets/images/icons/student.png" alt="Student"> Student</label>
                            
                            <input type="radio" id="instructor" name="role" value="instructor" required>
                            <label for="instructor"><img src="../assets/images/icons/instructor.png" alt="Instructor"> Instructor</label>
                        </div>

                        <br>
                        <button type="submit">Register Account</button>
                        <button type="button" id="cancelBTN">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/register.js"></script>
</body>
</html>
