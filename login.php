<?php
session_start();
if (isset($_SESSION["user"])) {
  header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Ivander | Login</title>
<body>

    <div class="container">
        <?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "config.php";
            // $sql = "SELECT * FROM users WHERE email = '$email'";
            $sql = "SELECT * FROM admins WHERE email = '$email'";
            $result = mysqli_query($db, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $fullName = '';
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    session_start();
                    $_SESSION["user"] = "yes";
                    $_SESSION["adminID"] = $user["admin_id"];
                    // $_SESSION["name"] = $user["fullName"];
                    $fullName = $user["first_name"].' '.($user["middle_name"] != ""? $user["middle_name"].' ':'');
                    $fullName .= $user["last_name"].' '.($user["suffix_name"] != ""? $user["suffix_name"].' ':'');
                    $_SESSION["name"] = $fullName;
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
        <h4>Welcome Back!</h4>
        <h3>Login To System Now!</h3>
      <form action="login.php" method="post">
        <div class="form-group">
            <input type="email" placeholder="Enter Email:" name="email" class="form-control">
        </div>
        <div class="form-group">
            <input type="password" placeholder="Enter Password:" name="password" class="form-control">
        </div>
        <div class="form-btn">
            <input type="submit"  value="Login" name="login" class="btn btn-primary">
        </div>
      </form>
     <div><p>Not registered yet <a href="registration.php">Register Here</a></p></div>
    </div>
</body>
</head>
<style>
body {
  
   background-image: url("");
  background-color: #cccccc;
  background-repeat: no-repeat;
  background-size: 100%;
  background-size: 1550px 800px;
}

div.container {
  background-color: #f2f2f2;
  padding: 40px;
  width: 400px;
  border-radius: 20px;
  opacity: 0.8;
  margin-top: 100px;
  margin-left: 100px
}

input {
  width: 100%;
  background-color: white;
  color: black;
  padding: 14px 20px;
  margin: 8px 0;
  display: inline-block;
  border-radius: 10px;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[value=Login]:hover {
  background-color: #45a049;
}
</style>
</html>