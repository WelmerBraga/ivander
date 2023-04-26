<?php 

require 'config.php';

$lat = $_GET['lat'];
$lng = $_GET['lng'];
$user_id = $_GET['user_id'];
$device_id = $_GET['device_id'];

echo $lat;
echo "<br>";
echo $lng;


$sqlGet = "SELECT id FROM users WHERE device_id = '". $device_id ."'";
$result = $db->query($sqlGet);
while ($row = mysqli_fetch_assoc($result)) {
    $user_id = $row['id'];
}

$sql = "INSERT INTO tbl_GPS(user_id, device_id, lat,lng) 
	VALUES('".$user_id."','".$device_id."','".$lat."','".$lng."')";

if($db->query($sql) === FALSE)
	{ echo "Error: " . $sql . "<br>" . $db->error; }

echo "<br>";
echo $db->insert_id;


