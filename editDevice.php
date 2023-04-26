<?php
    require 'auth.php';
    if (isset($_POST["update"])) {
        
      $status = $_POST["statusEdit"];
      $id = $_GET["id"];
    //   echo $id.' '. $status;
        require_once "config.php";
        $sql = "UPDATE devices SET status = '$status' WHERE device_id = '$id'";
        $result = mysqli_query($db, $sql);
        $_SESSION["message"] = 'Device Edited Successfully!';
        header("Location: manageDevices.php");
    }
    header("Location: manageDevices.php");
?>