<?php
    require 'auth.php';   
    if (isset($_POST["submit"])) {
      $fullName = $_POST["fullName"];
       $gender = $_POST["gender"];
       $birthday = $_POST["birthday"];
       $email = $_POST["email"];
       $password = $_POST["password"];
       $passwordRepeat = $_POST["repeat_password"];
       
       $passwordHash = password_hash($password, PASSWORD_DEFAULT);
       
        require_once "config.php";
        $sql = "INSERT INTO admins (fullName, gender, birthday, email, password) VALUES ( '$fullName', '$gender', '$birthday', '$email', '$passwordHash')";
        $result = mysqli_query($db, $sql);
        header("Location: registration.php");
        // echo $fullName.''.$gender.''.$birthday.''.$email.''.$password.''.$passwordRepeat;
        echo $result;
    }
    header("Location: registration.php");
?>