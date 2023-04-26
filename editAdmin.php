<?php
    require 'auth.php';
    if (isset($_POST["update"])) {
        
      $firstName = $_POST["firstNameEdit"];
      $middleName = $_POST["middleNameEdit"];
      $lastName = $_POST["lastNameEdit"];
      $suffixName = $_POST["suffixNameEdit"];
      $email = $_POST["emailEdit"];
      $birthday = $_POST["birthdayEdit"];
      $gender = $_POST["genderEdit"];
      $status = $_POST["statusEdit"];
      $id = $_GET["id"];
       
       
        require_once "config.php";
        $sql = "UPDATE admins SET first_name = '$firstName', middle_name = '$middleName', last_name = '$lastName', suffix_name = '$suffixName', email = '$email', birthday = '$birthday', gender = '$gender', status = '$status' WHERE admin_id = '$id'";
        $result = mysqli_query($db, $sql);
        $_SESSION["message"] = 'Admin Edited Successfully!';
        header("Location: manageAdmins.php");
    }
    header("Location: manageAdmins.php");
?>