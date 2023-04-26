<?php
    require 'auth.php';   
    if (isset($_POST["add"])) {
      $firstName = $_POST["firstName"];
      $middleName = $_POST["middleName"];
      $lastName = $_POST["lastName"];
      $suffixName = $_POST["suffixName"];
      $email = $_POST["email"];
      $deviceID = $_POST["deviceID"];
       
        echo $firstName.' '.$middleName.' '.$lastName.' '.$suffixName;
        require_once "config.php";
        $sql = "INSERT INTO `users` (`id`, `first_name`, `middle_name`, `last_name`, `suffix_name`, `email`, `device_id`, `status`) VALUES (NULL, '$firstName', '$middleName', '$lastName', '$suffixName', '$email', '$deviceID', 'active')";
        $result = mysqli_query($db, $sql);
        
        require_once "config.php";
        $sql = "UPDATE devices SET status = 'active', is_deployed = '1' WHERE device_id = '$deviceID'";
        $result = mysqli_query($db, $sql);
        $_SESSION["message"] = 'User Added Successfully!';
        header("Location: manageUser.php");
        // echo $sql;
    }
    header("Location: manageUser.php");
?>