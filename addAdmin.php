<?php
    require 'auth.php';   
    if (isset($_POST["add"])) {
      $firstName = $_POST["firstName"];
      $middleName = $_POST["middleName"];
      $lastName = $_POST["lastName"];
      $suffixName = $_POST["suffixName"];
      $email = $_POST["email"];
      $birthday = $_POST["birthday"];
      $gender = $_POST["gender"];
      $passwordHash = password_hash('ivander2117', PASSWORD_DEFAULT);
       
        require_once "config.php";
        $sql = "INSERT INTO `admins` (`admin_id`, `first_name`, `middle_name`, `last_name`, `suffix_name`, `email`, `birthday`, `gender`, `password`) VALUES (NULL, '$firstName', '$middleName', '$lastName', '$suffixName', '$email', '$birthday', '$gender','$passwordHash')";
        $result = mysqli_query($db, $sql);
        $_SESSION["message"] = 'Admin Added Successfully!';
        header("Location: manageAdmins.php");
    }
    header("Location: manageAdmins.php");
?>