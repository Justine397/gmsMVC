<?php
require_once '../database/connectDB.php';

class UserModel {
    public function getUserInfo() {
        session_start();
        $userInfo = [
            'fullName' => isset($_SESSION['full_name']) ? $_SESSION['full_name'] : '',
            'idNo' => isset($_SESSION['idNo']) ? $_SESSION['idNo'] : '',
            'section' => isset($_SESSION['section']) ? $_SESSION['section'] : '',
            'imgPath' => isset($_SESSION['imgPath']) ? $_SESSION['imgPath'] : '',
        ];
        return $userInfo;
    }

    public function studentFetchGrades($year) {
        $userId = $_SESSION['id'];
        
        global $conn;

        $query = "SELECT g.*, u.full_name AS instructor_name FROM grades g 
                  JOIN users u ON g.instructor_id = u.id 
                  WHERE g.student_id = ? AND g.year = ?";
        
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ii", $userId, $year);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($result->num_rows > 0) {
            $grades = $result->fetch_all(MYSQLI_ASSOC);
        } else {
            $grades = array();
        }
        
        return $grades;
    }

    public function fetchUsers() {
        global $conn;
        
        $tab1 = [];
        $tab2 = [];
        $tab3 = [];
        $tab4 = [];
        $tab5 = [];
    
        $sql = "SELECT full_name, section, IDNo, role FROM users";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if ($row['role'] === 'student') {
                    if (!empty($row['section'])) {
                        $sectionNumber = (int) $row['section'][0];
                        if ($sectionNumber == 1 || $sectionNumber == 2) {
                            $fetchUsers['students']['tab1'][] = $row;
                        } elseif ($sectionNumber == 3 || $sectionNumber == 4) {
                            $fetchUsers['students']['tab2'][] = $row;
                        } elseif ($sectionNumber == 5 || $sectionNumber == 6) {
                            $fetchUsers['students']['tab3'][] = $row;
                        }
                    }
                } elseif ($row['role'] === 'instructor') {
                    $fetchUsers['instructors']['tab4'][] = $row;
                } elseif ($row['role'] === 'admin') {
                    $fetchUsers['admins']['tab5'][] = $row;
                }
            }
        }
        return $fetchUsers;
    }
    
    public function searchUsers() {
        //need
    }
}
?>
