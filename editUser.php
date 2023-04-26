<?php
    require 'auth.php';
    if (isset($_POST["update"])) {
        
      $firstName = $_POST["firstNameEdit"];
      $middleName = $_POST["middleNameEdit"];
      $lastName = $_POST["lastNameEdit"];
      $suffixName = $_POST["suffixNameEdit"];
      $email = $_POST["emailEdit"];
      $status = $_POST["statusEdit"];
      $newDeviceID = $_POST["deviceIDEdit"];
      $id = $_GET["id"];
      $oldDeviceID = $_GET["oldDeviceID"];
       
       
        require_once "config.php";
        $sql = "UPDATE users SET first_name = '$firstName', middle_name = '$middleName', last_name = '$lastName', suffix_name = '$suffixName', email = '$email', device_id = '$newDeviceID', status = '$status' WHERE id = '$id'";
        $result = mysqli_query($db, $sql);
        
        if($oldDeviceID != $newDeviceID){
            require_once "config.php";
             $sql = "UPDATE devices SET status = 'inactive', is_deployed = '0' WHERE device_id = ".$oldDeviceID."";
             $result = mysqli_query($db, $sql);
             
             require_once "config.php";
             $sql = "UPDATE devices SET status = 'active', is_deployed = '1' WHERE device_id = ".$newDeviceID."";
             $result = mysqli_query($db, $sql);
        }
        $_SESSION["message"] = 'User Edited Successfully!';
        header("Location: manageUser.php");
    }
    header("Location: manageUser.php");
?>