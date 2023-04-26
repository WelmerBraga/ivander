<?php
    require 'auth.php';
    if (isset($_POST["update"])) {
        
      $oldPassword = $_POST["oldPassword"];
      $newPassword = $_POST["newPassword"];
      $id = $_GET["adminID"];
      
      require_once "config.php";
      
      $query = "SELECT password FROM admins WHERE admin_id = '". $id . "'";
      $result = mysqli_query($db, $query);
      $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
      if(password_verify($oldPassword, $user["password"])){
          
          $newPass =  password_hash($newPassword, PASSWORD_DEFAULT);
          $sql = "UPDATE admins SET password = '$newPass'  WHERE admin_id = '$id'";
          $result = mysqli_query($db, $sql);
        
          $_SESSION["message"] = 'Password Updated Successfully!';
          header("Location: adminProfile.php");
      }else{
          $_SESSION["message"] = 'Incorrect Old Password!';
          header("Location: adminProfile.php");
      }
    }
    header("Location: adminProfile.php");
?>