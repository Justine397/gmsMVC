<?php
require_once '../database/connectDB.php';

class AdminModel {
    public function userCount() {
        global $conn;

        $query = "SELECT COUNT(*) AS count, role FROM users GROUP BY role";
        $result = $conn->query($query);

        if ($result) {
            $counts = array();

            while ($row = $result->fetch_assoc()) {
                $counts[$row['role']] = $row['count'];
            }
            $result->close();
            return $counts;
        } else {
            return false;
        }
    }

    // not working
    public function removeUser($IDNo) {
        global $conn;
    
        $stmt = $conn->prepare("DELETE FROM users WHERE IDNo = ?");
        if (!$stmt) {
            error_log("Preparation failed: " . $conn->error);
            return ["success" => false, "error" => "Preparation failed: " . $conn->error];
        }
    
        $stmt->bind_param("i", $IDNo);
        $success = $stmt->execute();
    
        if (!$success) {
            error_log("Execution failed: " . $stmt->error);
            return ["success" => false, "error" => "Execution failed: " . $stmt->error];
        }
    
        $stmt->close();
        return ["success" => true];
    }
}
?>
