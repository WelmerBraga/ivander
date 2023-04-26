<?php require 'auth.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ivander | Profile</title>
        <style>
            
        </style>
        <?php require 'style.php' ?>
    </head>
    <body>
       <?php require 'navBar.php' ?>
       <div style="padding-top:50px"></div>
       <div class=""></div>
       <div class="wrapper">
           <div class="card">
              <div class="container">
                <div class="row">
                    <h2>Profile</h2>
                </div>  
                
                <div class="row">
                  <div class="column">
                    <img class="profile-image" id='profile-image' src="img_avatar_male.png" alt="Avatar">
                    <img class="logo-image" id='logo-image' src="Picture1.png" alt="Avatar">
                    <!--<input placeholder="Update Image" type="file" accept="image/*" onchange="previewImage(this)">-->
                    <br>
                    <a href="#" onclick="document.getElementById('viewUpdateProfile').style.display='block'" class="add-button">Edit Profile</a>
                    <a href="#" onclick="document.getElementById('viewUpdatePassword').style.display='block'" class="add-button">Update Password</a>
                  </div>

                  <div class="column" >
                      <p>Name</p>
                     <?php echo'<h2>'.$_SESSION["name"].'</h2>' ?>
                  </div>
                  <div class="column" >
                    <p>Email</p>
                    <?php echo'<h2>'.$_SESSION["email"].'</h2>' ?>
                  </div>
                  <div class="column" >
                    <p>Birthday</p>
                    <?php echo'<h2>'.$_SESSION["birthday"].'</h2>' ?>
                  </div>
                  <div class="column" >
                    <p>Gender</p>
                    <?php echo'<h2>'.$_SESSION["gender"].'</h2>' ?>
                </div>
              </div>
            </div>
          </div> 
       </div>
       <div id="viewUpdateProfile" class="modal">
          <form class="modal-content animate" action='editProfile.php?adminID=<?php echo $_SESSION["adminID"]?>' method='POST' enctype="multipart/form-data">
              <div class="container">
                  <h3>Edit Profile</h3>
                  <img class="profile-image" id='profile-image-preview' src="img_avatar_male.png" alt="Avatar">
                  <input placeholder="Select Image" name="image" type="file" accept="image/*" onchange="previewImage(this)">
                  <br>
                  <label for="firstName"><b>Firstname*</b></label>
                  <input value='<?php echo $_SESSION["fName"] ?>' type="text" placeholder="Enter Firstname" id='firstName' name="firstName" required>
                  <label for="middleName"><b>Middlename</b></label>
                  <input value='<?php echo $_SESSION["mName"] ?>' type="text" placeholder="Enter Middlename" id='middleName' name="middleName">
                  <label for="lastName"><b>Lastname*</b></label>
                  <input value='<?php echo $_SESSION["lName"] ?>' type="text" placeholder="Enter Lastname" id='lastName' name="lastName" required>
                  <label for="suffixName"><b>Suffix</b></label>
                  <select name="suffixName" id="suffixName">
                    <option value="" <?php if ($_SESSION["sName"] == '') echo 'selected'; ?>>N/A</option>
                    <option value="Jr" <?php if ($_SESSION["sName"] == 'Jr') echo 'selected'; ?>>Jr</option>
                    <option value="Sr" <?php if ($_SESSION["sName"] == 'Sr') echo 'selected'; ?>>Sr</option>
                    <option value="II" <?php if ($_SESSION["sName"] == 'II') echo 'selected'; ?>>II</option>
                    <option value="III" <?php if ($_SESSION["sName"] == 'III') echo 'selected'; ?>>III</option>
                    <option value="IV" <?php if ($_SESSION["sName"] == 'IV') echo 'selected'; ?>>IV</option>
                    <option value="V" <?php if ($_SESSION["sName"] == 'V') echo 'selected'; ?>>V</option>
                  </select>
                  
                  <label for="email"><b>Email*</b></label>
                  <input value='<?php echo $_SESSION["email"] ?>' type="email" placeholder="Enter Email" name="email" required>
                  <label for="birthday"><b>Birthday*</b></label>
                  <input value='<?php echo $_SESSION["birthday"] ?>' type="date" placeholder="Enter Birthday" id='birthday' name="birthday" required>
                  
                  <label for="gender"><b>Gender*</b></label>
                  <select name="gender" id="gender">
                    <option value="male" <?php if ($_SESSION["gender"] == 'male') echo 'selected'; ?>>Male</option>
                    <option value="female" <?php if ($_SESSION["gender"] == 'female') echo 'selected'; ?>>Female</option>
                  </select>
                  <button type="submit" name="save">Save</button>
              </div>
          </form>
        </div>
        
        <div id="viewUpdatePassword" class="modal">
          <form class="modal-content animate" action='updatePassword.php?adminID=<?php echo $_SESSION["adminID"]?>' method='POST'>
              <div class="container">
                  <h3>Update Password</h3>
                  
                  <br>
                  <label for="oldPassword"><b>Old Password</b></label>
                  <input type="password" placeholder="Enter Old Password" id='oldPassword' name="oldPassword" required>
                  <label for="newPassword"><b>New Password</b></label>
                  <input type="password" placeholder="Enter New Password" id='newPassword' name="newPassword" required>
                  
                  <button type="submit" name="update">Update</button>
              </div>
          </form>
        </div>
       
        

       <?php require 'messageToast.php'?>
       <script>
            window.addEventListener("load", function() {
              var adminID = "<?php echo $_SESSION['adminID']; ?>"; // Replace with the actual ID of the image
              updateProfileImage(adminID);
            });
            
            // Get the modal
            var viewUpdateProfile = document.getElementById('viewUpdateProfile');
            var viewUpdatePassword = document.getElementById('viewUpdatePassword');
            
            
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == viewUpdateProfile) {
                    viewUpdateProfile.style.display = "none";
                }
                if (event.target == viewUpdatePassword) {
                    viewUpdatePassword.style.display = "none";
                }
            }
          function previewImage(input) {
              if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                  document.getElementById('profile-image-preview').src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
              }
            }
            
            function updateProfileImage(adminID) {
              // Get a reference to the profile image element
              var profileImage = document.getElementById("profile-image");
              var profileImagePreview = document.getElementById('profile-image-preview');
            
              // Make an AJAX request to the server to retrieve the image data
              var xhr = new XMLHttpRequest();
              xhr.open("GET", "loadProfileImage.php?id=" + adminID, true);
              xhr.responseType = "arraybuffer";
                xhr.onload = function() {
                  // Convert the image data to base64 and set the image source dynamically
                  var imageData = new Uint8Array(xhr.response);
                  var imageFormat = xhr.getResponseHeader("Content-Type");
                  if(imageFormat != null){
                      var base64Image = "data:" + imageFormat + ";base64," + arrayBufferToBase64(imageData);
                      profileImage.src = base64Image;
                      profileImagePreview.src = base64Image;
                  }
                
                };
              xhr.send();
            }
            
            // Helper function to convert an ArrayBuffer to a base64 string
            function arrayBufferToBase64(buffer) {
              var binary = "";
              var bytes = new Uint8Array(buffer);
              var len = bytes.byteLength;
              for (var i = 0; i < len; i++) {
                binary += String.fromCharCode(bytes[i]);
              }
              return window.btoa(binary);
            }
       </script>
       
    </body>
    
</html>