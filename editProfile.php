<?php
    require 'auth.php';
    if (isset($_POST["save"])) {
          $firstName = $_POST["firstName"];
          $middleName = $_POST["middleName"];
          $lastName = $_POST["lastName"];
          $suffixName = $_POST["suffixName"];
          $email = $_POST["email"];
          $birthday = $_POST["birthday"];
          $gender = $_POST["gender"];
          $id = $_GET["adminID"];
        // Check that a file was uploaded
        require_once "config.php";
          if (!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK) {
            $sql = "UPDATE admins SET first_name = '$firstName', middle_name = '$middleName', last_name = '$lastName', suffix_name = '$suffixName', email = '$email', birthday = '$birthday', gender = '$gender' WHERE admin_id = '$id'";
            $result = mysqli_query($db, $sql);
          }else{
              // Check that the uploaded file is a valid image file
              $file_type = mime_content_type($_FILES['image']['tmp_name']);
              if (substr($file_type, 0, 5) !== 'image') {
                $_SESSION["message"] = 'Invalid Image File!';
                header("Location: adminProfile.php");
              }
            
              // Open the uploaded file and read its contents
              $file_handle = fopen($_FILES['image']['tmp_name'], 'rb');
              $image_data = fread($file_handle, filesize($_FILES['image']['tmp_name']));
              fclose($file_handle);
              
            //   $sql = "UPDATE admins SET first_name = '$firstName', middle_name = '$middleName', last_name = '$lastName', suffix_name = '$suffixName', email = '$email', birthday = '$birthday', gender = '$gender', image = '$image_data' WHERE admin_id = '$id'";
            
            $sql = "UPDATE admins SET first_name=?, middle_name=?, last_name=?, suffix_name=?, email=?, birthday=?, gender=?, image=? WHERE admin_id=?";
            $stmt = mysqli_prepare($db, $sql);
            mysqli_stmt_bind_param($stmt, "ssssssssi", $firstName, $middleName, $lastName, $suffixName, $email, $birthday, $gender, $image_data, $id);
            mysqli_stmt_execute($stmt);
          }
        
        
        
        $fullName = $firstName.' '.($middleName != ""? $middleName.' ':'');
        $fullName .= $lastName.' '.($suffixName != ""? $suffixName.' ':'');
        $_SESSION["name"] = $fullName;
        $_SESSION["fName"] = $firstName;
        $_SESSION["mName"] = $middleName;
        $_SESSION["lName"] = $lastName;
        $_SESSION["sName"] = $suffixName;
        $_SESSION["gender"] = $gender;
        $_SESSION["email"] = $email;
        $_SESSION["birthday"] = $birthday;
        $_SESSION["message"] = 'Admin Edited Successfully!';
        header("Location: adminProfile.php");
    }
    header("Location: adminProfile.php");
?>