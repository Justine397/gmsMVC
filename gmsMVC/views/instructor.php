<?php
include '../database/connectDB.php';
include '../controllers/InstructorController.php';

$controller = new InstructorController($conn);
$userInfo = $controller->UserModel->getUserInfo();

$userTab = $controller->fetchUsers();

$tab1 = $userTab['students']['tab1'];
$tab2 = $userTab['students']['tab2'];
$tab3 = $userTab['students']['tab3'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GMS - Instructor</title>
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        td:first-child,
        td:last-child {
            width: 10%;
        }
        td:nth-child(2) {
            width: 60%;
        }
    </style>
</head>
<body>
    <div class="container1">
        <div class="container2">
            <div class="container3">
                <div class="mainContainer">
                    <a href=".." class="logoutBTN">Logout</a>
                    </form> 
                    <header>
                        <div class="imgContainer">
                            <?php
                            $imgPath = isset($_SESSION['imgPath']) ? $_SESSION['imgPath'] : '';
                            ?>
                            <img src="<?php echo !empty($imgPath) ? '../assets/images/upload/' . htmlspecialchars($imgPath) : '../assets/images/default.jpg'; ?>" alt="user_image" class="mainIMG" id="userImage">
                            <div class="overlay" id="instOverlay">Change Photo</div>
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
                            <div class="sectionContainer">
                                <div class="info">Section:</div>
                                <?php echo isset($userInfo['section']) ? htmlspecialchars($userInfo['section']) : ''; ?>
                            </div>
                        </div>
                    </header>
                    <hr>
                    <div class="instructorFeatures">
                        <div class="searchContainer" >
                            <div class="searchHeader">Search Student</div>
                            <input type="search" id="search" placeholder="Search Student 🔎">
                            <div id="searchResults"></div>
                        </div>
                    </div>
                    <div id="userModal" class="modal">
                            <div class="modal-content">
                                <span class="close">&times;</span>
                                    <div id="modalContentInst">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="../assets/js/script.js"></script>
</body>
</html>