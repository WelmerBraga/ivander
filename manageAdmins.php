<?php require 'auth.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ivander | Manage Admins</title>
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
                    <h2>Manage Dashboard User</h2>
                    <br>
                    <input type="text" placeholder="Search Admin" id="searchAdmin">
                </div>  
                    <?php
                    
                    require_once 'config.php';
                    
                    // Read all users from the database
                    $query = "SELECT * FROM admins";
                    $result = $db->query($query);
                    $fullNameToEdit = '';
                    $emailToEdit = '';
                    
                    echo "<table id='table'>";
                    echo "<thead>
                          <tr>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Birthday</th>
                          <th>Gender</th>
                          <th>Status</th>
                          <th>Actions</th>
                          </tr>
                          </thead>";
                    
                    // Display each admin as a table row
                    while ($row = mysqli_fetch_assoc($result)) {
                        $middle_name = $row["middle_name"]!=''?$row["middle_name"]: '';
                        $suffix_name = $row["suffix_name"]!=''?$row["suffix_name"]: '';
                        $full_name =  $row["first_name"] .' '. $middle_name . ' ' . $row["last_name"] . ' ' . $suffix_name;
                        
                        echo "<tbody>
                        <tr>";
                        echo "<td>" . $full_name . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["birthday"] . "</td>";
                        echo "<td>" . $row["gender"] . "</td>";
                        echo "<td>" . $row["status"] . "</td>";
                        echo "<td>";
                        
                        echo'<a href="#" onclick="editAdmin('; echo "'".$row["admin_id"]."','".$row["first_name"]."','".$row["middle_name"]."','".$row["last_name"]."','".$row["suffix_name"]."','".$row["email"]."','".$row["birthday"]."','".$row["gender"]."','".$row["status"]."'"; echo ')" class="edit-button">Edit</a>';
                        // echo "<a class='delete-button' href='delete.php?id=" . $row["id"] . "'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    
                    echo "</tbody></table>";
                    echo "<br>";
                    echo'<a href="#" onclick="document.getElementById(';echo"'addAdmin'";echo').style.display=';echo"'block'"; echo '" class="add-button">Add Dasboard User</a>';
                    
                    ?>
                </div>
              </div>
            </div>
            
       </div>
       
       <div id="addAdmin" class="modal">
	    
      
          <form class="modal-content animate" action="addAdmin.php" method="post">
            
            <div class="imgcontainer">
              <span onclick="document.getElementById('addAdmin').style.display='none'" class="close" title="Close Modal">&times;</span>
              <h1>Add Dashboard User</h1>
            </div>
        
            <div class="container">
              
              <label for="firstName"><b>Firstname*</b></label>
              <input type="text" placeholder="Enter Firstname" id='firstName' name="firstName" required>
              <label for="middleName"><b>Middlename</b></label>
              <input type="text" placeholder="Enter Middlename" id='middleName' name="middleName">
              <label for="lastName"><b>Lastname*</b></label>
              <input type="text" placeholder="Enter Lastname" id='lastName' name="lastName" required>
              <label for="suffixName"><b>Suffix</b></label>
              <select name="suffixName" id="suffixName">
                <option value="">N/A</option>
                <option value="Jr">Jr</option>
                <option value="Sr">Sr</option>
                <option value="II">II</option>
                <option value="III">III</option>
                <option value="IV">IV</option>
                <option value="V">V</option>
              </select>
              
              <label for="email"><b>Email*</b></label>
              <input type="email" placeholder="Enter Email" name="email" required>
              <label for="birthday"><b>Birthday*</b></label>
              <input type="date" placeholder="Enter Birthday" id='birthday' name="birthday" required>
              
              <label for="gender"><b>Gender*</b></label>
              <select name="gender" id="gender">
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
              
        <!--      <div class="mb-3">-->
		      <!--  <label class="form-label"><b>Profile Picture</b></label>-->
		      <!--  <input type="file" -->
		      <!--     class="form-control"-->
		      <!--     name="pp">-->
		      <!--</div>-->
              
              <h6>Note: Default password is 'ivander2117'.</h6>
              
              <button type="submit" name="add">Add</button>
            </div>
          </form>
        </div>
        
        <div id="editAdmin" class="modal">
	    
      
          <form id="editForm" class="modal-content animate"  method="post">
            
            <div class="imgcontainer">
              <span onclick="document.getElementById('editAdmin').style.display='none'" class="close" title="Close Modal">&times;</span>
              <h1>Edit Admin</h1>
            </div>
        
            <div class="container">
              <label for="firstNameEdit"><b>Firstname*</b></label>
              <input type="text" placeholder="Enter Firstname" id='firstNameEdit' name="firstNameEdit" required>
              <label for="middleNameEdit"><b>Middlename</b></label>
              <input type="text" placeholder="Enter Middlename" id='middleNameEdit' name="middleNameEdit">
              <label for="lastNameEdit"><b>Lastname*</b></label>
              <input type="text" placeholder="Enter Lastname" id='lastNameEdit' name="lastNameEdit" required>
              <label for="suffixNameEdit"><b>Suffix</b></label>
              <select name="suffixNameEdit" id="suffixNameEdit">
                <option value="">N/A</option>
                <option value="Jr">Jr</option>
                <option value="Sr">Sr</option>
                <option value="II">II</option>
                <option value="III">III</option>
                <option value="IV">IV</option>
                <option value="V">V</option>
              </select>
              
              <label for="emailEdit"><b>Email*</b></label>
              <input type="email" placeholder="Enter Email" id='emailEdit' name="emailEdit" required>
              <label for="birthdayEdit"><b>Birthday*</b></label>
              <input type="date" placeholder="Enter Birthday" id='birthdayEdit' name="birthdayEdit" required>
              
              <label for="genderEdit"><b>Gender*</b></label>
              <select name="genderEdit" id="genderEdit">
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
              
              <label for="statusEdit"><b>Status*</b></label>
              <select name="statusEdit" id="statusEdit">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
              </select>
              
              <button type="submit" name="update">Update</button>
              
            </div>
          </form>
        </div>
    <?php require 'messageToast.php'?>
    <script>
        const input = document.getElementById("searchAdmin");
        const table = document.getElementById("table");
        const rows = table.getElementsByTagName("tr");
        const headerRow = table.getElementsByTagName("thead")[0].getElementsByTagName("tr")[0];

        input.addEventListener("input", function() {
          const searchTerm = input.value.trim().toLowerCase();
          headerRow.style.display = "table-row";
          for (let i = 0; i < rows.length; i++) {
            const row = rows[i];
            if (row === headerRow) continue;
            const columns = row.getElementsByTagName("td");
            let isMatched = false;
            for (let j = 0; j < columns.length-1; j++) {
              const column = columns[j];
              const columnText = column.textContent.toLowerCase();
              if (columnText.includes(searchTerm)) {
                isMatched = true;
                break;
              }
            }
            if (isMatched) {
              row.style.display = "table-row";
            } else {
              row.style.display = "none";
            }
          }
        });






        // Get the modal
        var modal = document.getElementById('addAdmin');
        var editModal = document.getElementById('editAdmin');
        
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
            if (event.target == editModal) {
                editModal.style.display = "none";
            }
        }
        function editAdmin(id, first_name, middle_name, last_name, suffix_name, email, birthday, gender, status){
            
            document.getElementById('editAdmin').style.display='block';
            document.getElementById('firstNameEdit').value = first_name;
            document.getElementById('middleNameEdit').value = middle_name;
            document.getElementById('lastNameEdit').value = last_name;
            document.getElementById('suffixNameEdit').value = suffix_name;
            document.getElementById('emailEdit').value = email;
            document.getElementById('birthdayEdit').value = birthday;
            document.getElementById('genderEdit').value = gender;
            document.getElementById('statusEdit').value = status;
            
            
            document.getElementById('editForm').action="editAdmin.php?id="+id;
        }
        
        

    </script>
       
    </body>
</html>