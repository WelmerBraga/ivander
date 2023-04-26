<?php
    require_once 'config.php';
    // $adminID = $_SESSION["adminID"];
    $sql = "SELECT g.*, u.first_name, u.middle_name, u.last_name, u.suffix_name FROM tbl_GPS g JOIN users u INNER JOIN (SELECT device_id, MAX(created_date) AS max_created_date FROM tbl_GPS GROUP BY device_id ) latest ON g.device_id = latest.device_id AND g.created_date = latest.max_created_date WHERE g.created_date >= DATE_SUB(NOW(), INTERVAL 24 HOUR) && g.device_id = u.device_id;";
    $result = $db->query($sql);
    if (!$result) {
      { echo "errno: " . $sql . "<br>" . $db->errno; }
    }
    
    $rows = $result -> fetch_all(MYSQLI_ASSOC); 
    // Return the data in JSON format
    header('Content-Type: application/json');
    echo json_encode($rows);
?>