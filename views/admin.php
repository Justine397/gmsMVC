<?php
include '../database/connectDB.php';
include '../controllers/AdminController.php';

$controller = new AdminController($conn);
$userInfo = $controller->UserModel->getUserInfo();

$userTab = $controller->fetchUsers();
$userCount = $controller->userCount();

// $query = isset($_POST['search_query']) ? $_POST['search_query'] : '';
// $user_role = isset($_POST['user_role']) ? $_POST['user_role'] : '';
// $userSearch = $controller->searchUsers($query, $user_role);

$tab1 = $userTab['students']['tab1'];
$tab2 = $userTab['students']['tab2'];
$tab3 = $userTab['students']['tab3'];
$tab4 = $userTab['instructors']['tab4'];
$tab5 = $userTab['admins']['tab5'];

// echo '<pre>';
// print_r($tab4);
// echo '</pre>';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GMS Admin </title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <script src="../assets/js/script.js"></script>
</head>
<body>
    <div class="container1">
        <div class="container2">
            <div class="container3">
                <div class="mainContainer">
                    <a href=".." class="logoutBTN">Logout</a>
                    <header>
                        <div class="imgContainer">
                        <?php
                        $imgPath = isset($_SESSION['imgPath']) ? $_SESSION['imgPath'] : '';
                        ?>
                        <img src="<?php echo !empty($imgPath) ? '../assets/images/upload/' . htmlspecialchars($imgPath) : '../assets/images/default.jpg'; ?>" alt="user_image" class="mainIMG" id="userImage">
                        <div class="overlay" id="adminOverlay">Change Photo</div>
                            <form id="uploadForm" enctype="multipart/form-data">
                                <input type="hidden" name="userId" value="<?php echo isset($_SESSION['idNo']) ? htmlspecialchars($_SESSION['idNo']) : ''; ?>">
                                <input type="file" class="hidden-input" id="file-input" name="profile_pic" accept="image/*">
                            </form>
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
                        </div>
                    </header>
                    <hr>
                    <div class="features">
                        <div class="addAccountContainer">
                            <div class="addAccountHeader">
                                <a href="register.php" id="addAccount">Add Account</a>
                            </div>
                        </div>
                        <div class="searchContainer">
                            <div class="searchHeader">Search Member</div>
                            <input type="search" id="search" placeholder="Search Member 🔎">
                            <div id="searchResults">
                            </div>
                        </div>
                        <div class="populationContainer">
                            <div class="populationHeader">
                                Population
                            </div>
                            <div class="populationContent">
                                <div class="populationRow">
                                    <div class="populationCategory">Admin:</div>
                                    <div class="populationCount"><?php echo isset($userCount['admin']) ? $userCount['admin'] : 0; ?></div>
                                </div>
                                <div class="populationRow">
                                    <div class="populationCategory">Student:</div>
                                    <div class="populationCount"><?php echo isset($userCount['student']) ? $userCount['student'] : 0; ?></div>
                                </div>
                                <div class="populationRow">
                                    <div class="populationCategory">Instructors:</div>
                                    <div class="populationCount"><?php echo isset($userCount['instructor']) ? $userCount['instructor'] : 0; ?></div>
                                </div>
                                <div class="populationRow">
                                    <div class="populationCategory">Total:</div>
                                    <div class="populationCount"><?php echo array_sum($userCount); ?></div>
                                </div>
                                <div id="userModal" class="modal">
                                    <div class="modal-content">
                                        <span class="close">&times;</span>
                                        <div id="modalContent">
                                            <!-- Modal content will be populated dynamically -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                    <div class="content">
                        <hr>
                        <div class="tab-container">
                            <div class="tab-header">
                                <button class="tab-button active" data-tab="tab1">1st Year</button>
                                <button class="tab-button" data-tab="tab2">2nd Year</button>
                                <button class="tab-button" data-tab="tab3">3rd Year</button>
                                <button class="tab-button" data-tab="tab4">Instructors</button>
                                <button class="tab-button" data-tab="tab5">Admins</button>
                            </div>
                            <div class="tab-content" id="tab1">
                                <div class="tableWrapper">
                                    <?php if(!empty($tab1)): ?>
                                        <?php foreach ($tab1 as $user) : ?>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <?php echo htmlspecialchars($user['section']); ?>
                                                    </td> 
                                                    <td>
                                                        <?php echo htmlspecialchars($user['full_name']); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo htmlspecialchars($user['IDNo']); ?>
                                                    </td> 
                                                    <td>
                                                        <a href="#" class="remove-user" data-id="<?php echo $user['IDNo']; ?>" alt="remove" title="Remove">remove</a>
                                                        <a href="#" class="view-user" data-id="<?php echo $user['IDNo']; ?>" alt="view" title="View">view</a>
                                                    </td>
                                                </tr>
                                            </table>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <p>No users found for tab 1.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="tab-content" id="tab2">
                                <div class="tableWrapper">
                                    <?php if(!empty($tab2)): ?>
                                        <?php foreach ($tab2 as $user) : ?>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <?php echo htmlspecialchars($user['section']); ?>
                                                    </td> 
                                                    <td>
                                                        <?php echo htmlspecialchars($user['full_name']); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo htmlspecialchars($user['IDNo']); ?>
                                                    </td> 
                                                    <td>    
                                                        <a href="#" class="remove-user" data-id="<?php echo $user['IDNo']; ?>" alt="remove" title="Remove">remove</a>
                                                        <a href="#" class="view-user" data-id="<?php echo $user['IDNo']; ?>" alt="view" title="View">view</a>
                                                    </td>
                                                </tr>
                                            </table>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <p>No users found for tab 2.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="tab-content" id="tab3">
                                <div class="tableWrapper">
                                    <?php if(!empty($tab3)): ?>
                                        <?php foreach ($tab3 as $user) : ?>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <?php echo htmlspecialchars($user['section']); ?>
                                                    </td> 
                                                    <td>
                                                        <?php echo htmlspecialchars($user['full_name']); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo htmlspecialchars($user['IDNo']); ?>
                                                    </td> 
                                                    <td>
                                                        <a href="#" class="remove-user" data-id="<?php echo $user['IDNo']; ?>" alt="remove" title="Remove">remove</a>
                                                        <a href="#" class="view-user" data-id="<?php echo $user['IDNo']; ?>" alt="view" title="View">view</a>
                                                    </td>
                                                </tr>
                                            </table>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <p>No users found for tab 3.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="tab-content" id="tab4">
                                <div class="tableWrapper">
                                    <?php if(!empty($tab4)): ?>
                                        <?php foreach ($tab4 as $user) : ?>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <?php echo htmlspecialchars($user['section']); ?>
                                                    </td> 
                                                    <td>
                                                        <?php echo htmlspecialchars($user['full_name']); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo htmlspecialchars($user['IDNo']); ?>
                                                    </td> 
                                                    <td>
                                                        <a href="#" class="remove-user" data-id="<?php echo $user['IDNo']; ?>" alt="remove" title="Remove">remove</a>
                                                        <a href="#" class="view-user" data-id="<?php echo $user['IDNo']; ?>" alt="view" title="View">view</a>
                                                    </td>
                                                </tr>
                                            </table>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <p>No users found for tab 4.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="tab-content" id="tab5">
                                <div class="tableWrapper">
                                    <?php if(!empty($tab5)): ?>
                                        <?php foreach ($tab5 as $user) : ?>
                                            <table>
                                                <tr>
                                                    <td>
                                                        <?php echo htmlspecialchars($user['section']); ?>
                                                    </td> 
                                                    <td>
                                                        <?php echo htmlspecialchars($user['full_name']); ?>
                                                    </td>
                                                    <td>
                                                        <?php echo htmlspecialchars($user['IDNo']); ?>
                                                    </td> 
                                                    <td>
                                                        <a href="#" class="remove-user" data-id="<?php echo $user['IDNo']; ?>" alt="remove" title="Remove">remove</a>
                                                        <a href="#" class="view-user" data-id="<?php echo $user['IDNo']; ?>" alt="view" title="View">view</a>
                                                    </td>
                                                </tr>
                                            </table>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <p>No users found for tab 5.</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../assets/js/admin.js"></script>
</body>
</html>