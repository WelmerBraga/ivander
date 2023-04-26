<?php
    if (isset($_POST["login"])) {
       $email = $_POST["email"];
       $password = $_POST["password"];
        require_once "config.php";
        // $sql = "SELECT * FROM users WHERE email = '$email'";
        $sql = "SELECT * FROM admins WHERE email = '$email'";
        $result = mysqli_query($db, $sql);
        $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
        if ($user) {
            if (password_verify($password, $user["password"])) {
                session_start();
                $_SESSION["user"] = "yes";
                $_SESSION["adminID"] = $user["admin_id"];
                $_SESSION["name"] = $user["fullName"];
                $_SESSION["gender"] = $user["gender"];
                $_SESSION["email"] = $user["email"];
                $_SESSION["birthday"] = $user["birthday"];
                header("Location: index.php");
                die();
            }else{
                echo "<div class='alert alert-danger'>Password does not match</div>";
            }
        }else{
            echo "<div class='alert alert-danger'>Email does not match</div>";
        }
    }
?>