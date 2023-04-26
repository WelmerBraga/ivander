<?php

    require 'config.php';
    $db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME); 
    // Check connection
    if ($db->connect_errno) {
    die("Connection failed: " .$db->connect_errno);
    }
    
    $dID = $_GET["dID"];
    
    $viewSql = 'SELECT u.first_name as fName, u.middle_name as mName, u.last_name as lName, u.suffix_name as sName, g.lat as Latitude, g.lng as Longitude, g.created_date as "Date/Time" FROM tbl_GPS as g JOIN users as u WHERE g.device_id=u.device_id and g.device_id='.$dID;
    

    
            
  $result = mysqli_query($db, $viewSql) or die("error".mysqli_error($db));
  $rows = array();
    while($r = mysqli_fetch_assoc($result)) {
        $rows[] = $r;
    }
    echo json_encode($rows);
?>