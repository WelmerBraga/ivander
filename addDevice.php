<?php
    require 'auth.php';   
    if (isset($_POST["add"])) {
        //   $fullName = $_POST["fullName"];
        // echo '<script>console.log('; echo $_POST["add"]; echo'); </script>';
        
      $deviceId = $_POST["deviceId"];
       
        require_once "config.php";
        $sql = "INSERT INTO `devices` (`device_id`) VALUES ( '$deviceId')";
        $result = mysqli_query($db, $sql);
        $_SESSION["message"] = 'Device Added Successfully!';
        header("Location: manageDevices.php");
        // echo '<script>console.log('; echo $sql; echo'); </script>';
    }
    header("Location: manageDevices.php");
?>