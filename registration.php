<?php
session_start();
if (isset($_SESSION["user"])) {
  // header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <title>Ivander | Register</title>
<body>
    
     <div class="container">

        <?php
        // if (isset($_POST["submit"])) {
        //   $fullName = $_POST["fullName"];
        //   $gender = $_POST["gender"];
        //   $birthday = $_POST["birthday"];
        //   $email = $_POST["email"];
        //   $password = $_POST["password"];
        //   $passwordRepeat = $_POST["repeat_password"];
        //   $date_created = $_POST["date_created"];
           
        //   $passwordHash = password_hash($password, PASSWORD_DEFAULT);

        //   $errors = array();
           
        //   if (empty($fullName) OR empty($gender) OR empty($birthday) OR empty($email) OR empty($password) OR empty($passwordRepeat)) {
        //     array_push($errors,"All fields are required");
        //   }
        //   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //     array_push($errors, "Email is not valid");
        //   }
        //   if (strlen($password)<8) {
        //     array_push($errors,"Password must be at least 8 charactes long");
        //   }
        //   if ($password!==$passwordRepeat) {
        //     array_push($errors,"Password does not match");
        //   }
        //   require_once "config.php";
        //   $sql = "SELECT * FROM admins WHERE email = '$email'";
        //   $result = mysqli_query($db, $sql);
        //   $rowCount = mysqli_num_rows($result);
        //   if ($rowCount>0) {
        //     array_push($errors,"Email already exists!");
        //   }
        //   if (count($errors)>0) {
        //     foreach ($errors as  $error) {
        //         echo "<div class='alert alert-danger'>$error</div>";
        //     }
        //   }else{
            
        //     $sql = "INSERT INTO admins (fullName, gender, birthday, email, password, date_created) VALUES ( ?, ?, ?, ?, ?, ? )";
        //     $stmt = mysqli_stmt_init($db);
        //     $prepareStmt = mysqli_stmt_prepare($stmt,$sql);
        //     if ($prepareStmt) {
        //         mysqli_stmt_bind_param($stmt,"sss", $fullName, $gender, $birthday, $email, $passwordHash, $date_created);
        //         mysqli_stmt_execute($stmt);
        //         echo "<div class='alert alert-success'>You are registered successfully.</div>";
        //     }else{
        //         die("Something went wrong");
        //     }
        //   }
          

        // }
        ?>
        <h3>Sign Up Form</h3>
        <h4>Register To System Now!</h4>
        <form action="registerAdmin.php" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name="fullName" placeholder="Full Name:">
            </div>
             <div class="form-group">
                <input type="text" class="form-control" name="gender" placeholder="Gender:">
            </div>
             <div class="form-group">
                <input type="date" class="form-control" name="birthday" placeholder="Birthday:">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="password" placeholder="Password:">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="repeat_password" placeholder="Repeat Password:">
            </div>
            <!-- <div class="form-group">-->
            <!--    <input type="datetime" class="form-control" name="date_created" placeholder="Date Created:">-->
            <!--</div>-->
            <div class="form-btn">
      <input type="submit" class="btn btn-primary" value="Register" name="submit"/>
            </div>
           <div><p>Already Registered as Admin? <a href="map.php">Login Here</a></p></div>
        </form>
    </div>
    <div class="colum">
                    <img class="logo-image" src="bucana1.png" alt="logo">
                  </div>
</body>
</head>
<style>
body {
  
  background-image: url("dashboard.jpg");
  background-color: #006699;
  background-repeat: no-repeat;
  background-size: 100%;
  background-size: 1550px 800px;
}

div.container {
  background-color: #ffffff;
  padding: 20px;
  width: 400px;
  border-radius: 20px;
  /*opacity: 0.8;*/
  margin-top: 30px;
  margin-left: 80px
}

input {
  width: 100%;
  background-color: white;
  color: black;
  padding: 14px 20px;
  margin: 8px 0;
  display: inline-block;
  border-radius: 10px;
  box-sizing: border-box;
}
input[type=submit] {
  width: 100%;
  background-color: #006699;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[value=Register]:hover {
  background-color: #0099e6;
}
.form-group{
    margin-bottom:10px;
}

.logo-image{
        width: 80%;
  position: absolute;
  top: 15%;
  left: 50%;
        width: 60%;
        max-width: 500px;
        min-width: 500px;
    
    }

</style>
</html>