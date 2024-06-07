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
}
?>
