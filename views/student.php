<?php
include '../database/connectDB.php';
include '../controllers/StudentController.php';

$controller = new StudentController($conn);
$userInfo = $controller->UserModel->getUserInfo();

$gradesTab1 = $controller->studentFetchGrades(1);
$gradesTab2 = $controller->studentFetchGrades(2);
$gradesTab3 = $controller->studentFetchGrades(3);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
    <div class="container1">
        <div class="container2">
            <div class="container3">
                <div class="mainContainer">
                <a href=".." class="logoutBTN">Logout</a>
                    <header>
                    <div class="imgContainer" id="imgContainer">
                        <?php
                        $imgPath = isset($userInfo['imgPath']) ? $userInfo['imgPath'] : '';
                        ?>
                        <img src="<?php echo !empty($imgPath) ? '../assets/images/upload/' . htmlspecialchars($imgPath) : '../assets/images/default.jpg'; ?>" alt="user_image" class="mainIMG" id="userImage">
                        <div class="overlay" id="studentOverlay">Change Photo</div>
                        <input type="file" class="hidden-input" id="file-input" name="profile_pic" accept="image/*"> 
                    </div>
                        <div class="infoContainer">
                            <div class="nameContainer">
                                <div class="info">Name:</div>
                                <?php echo isset($userInfo['fullName']) ? htmlspecialchars($userInfo['fullName']) : ''; ?>
                            </div>
                            <div class="idContainer">
                                <div class="info">ID No.</div>
                                <?php echo isset($userInfo['idNo']) ? htmlspecialchars($userInfo['idNo']) : ''; ?>
                            </div>
                            <div class="sectionContainer">
                                <div class="info">Section:</div>
                                <?php echo isset($userInfo['section']) ? htmlspecialchars($userInfo['section']) : ''; ?>
                            </div>
                        </div>
                    </header>
                    <div class="content">
                      <hr>
                        <div class="tab-container">
                            <div class="tab-header">
                                <button class="tab-button active" data-tab="tab1">1st Year</button>
                                <button class="tab-button" data-tab="tab2">2nd Year</button>
                                <button class="tab-button" data-tab="tab3">3rd Year</button>
                            </div>
                            <div class="tab-content" id="tab1">
                                <div class="tableWrapper">
                                    <table>
                                        <tr>
                                            <th>Instructor</th>
                                            <th>Subject</th>
                                            <th>1st Sem</th>
                                            <th>2nd Sem</th>
                                            <th>Final</th>
                                          </tr>
                                          <tbody id="gradesTab1">
                                          <?php if(!empty($gradesTab1)): ?>
                                            <?php foreach ($gradesTab1 as $grade): ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($grade['instructor_name']); ?></td>
                                                    <td><?php echo htmlspecialchars($grade['subject']); ?></td>
                                                    <td><?php echo htmlspecialchars($grade['first_semester_grade']); ?></td>
                                                    <td><?php echo htmlspecialchars($grade['second_semester_grade']); ?></td>
                                                    <td><?php echo htmlspecialchars($grade['final_grade']); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="5">
                                                        <h3 class='no-grades'>No grades found for 1st year.</h3>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                          </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-content" id="tab2" style="display: none;">
                                <div class="tableWrapper">
                                    <table>
                                        <tr>
                                            <th>Instructor</th>
                                            <th>Subject</th>
                                            <th>1st Sem</th>
                                            <th>2nd Sem</th>
                                            <th>Final</th>
                                          </tr>
                                          <tbody id="gradesTab2">
                                          <?php if(!empty($gradesTab2)): ?>
                                            <?php foreach ($gradesTab2 as $grade): ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($grade['instructor_name']); ?></td>
                                                    <td><?php echo htmlspecialchars($grade['subject']); ?></td>
                                                    <td><?php echo htmlspecialchars($grade['first_semester_grade']); ?></td>
                                                    <td><?php echo htmlspecialchars($grade['second_semester_grade']); ?></td>
                                                    <td><?php echo htmlspecialchars($grade['final_grade']); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="5">
                                                        <h3 class='no-grades'>No grades found for 2nd year.</h3>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                          </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-content" id="tab3" style="display: none;">
                                <div class="tableWrapper">
                                    <table>
                                        <tr>
                                            <th>Instructor</th>
                                            <th>Subject</th>
                                            <th>1st Sem</th>
                                            <th>2nd Sem</th>
                                            <th>Final</th>
                                          </tr>
                                          <tbody id="gradesTab3">
                                          <?php if(!empty($gradesTab3)): ?>
                                            <?php foreach ($gradesTab3 as $grade): ?>
                                                <tr>
                                                    <td><?php echo htmlspecialchars($grade['instructor_name']); ?></td>
                                                    <td><?php echo htmlspecialchars($grade['subject']); ?></td>
                                                    <td><?php echo htmlspecialchars($grade['first_semester_grade']); ?></td>
                                                    <td><?php echo htmlspecialchars($grade['second_semester_grade']); ?></td>
                                                    <td><?php echo htmlspecialchars($grade['final_grade']); ?></td>
                                                </tr>
                                            <?php endforeach; ?>
                                            <?php else: ?>
                                                <tr>
                                                    <td colspan="5">
                                                        <h3 class='no-grades'>No grades found for 3rd year.</h3>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                          </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="../assets/js/script.js"></script>
</body>
</html>