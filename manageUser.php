<?php require 'auth.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ivander | Manage Users</title>
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
                    <h2>Manage Users</h2>
                    <br>
                    <input type="text" placeholder="Search User" id="searchUser">
                </div>  
                    <?php
                    
                    require_once 'config.php';
                    
                    // Read all users from the database
                    $query = "SELECT * FROM users";
                    $result = $db->query($query);
                    $fullNameToEdit = '';
                    $emailToEdit = '';
                    
                    echo "<table id='table'>";
                    echo "<thead>
                            <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Device ID</th>
                            <th>Status</th>
                            <th>Actions</th>
                            </tr>
                           </thead>";
                    
                    // Display each user as a table row
                    while ($row = mysqli_fetch_assoc($result)) {
                        $middle_name = $row["middle_name"]!=''?$row["middle_name"]: '';
                        $suffix_name = $row["suffix_name"]!=''?$row["suffix_name"]: '';
                        $full_name =  $row["first_name"] .' '. $middle_name . ' ' . $row["last_name"] . ' ' . $suffix_name;
                        echo "<tbody><tr>";
                        echo "<td>" . $full_name . "</td>";
                        echo "<td>" . $row["email"] . "</td>";
                        echo "<td>" . $row["device_id"] . "</td>";
                        echo "<td>" . $row["status"] . "</td>";
                        echo "<td>";
                        echo'<a href="#" onclick="editUser('; echo "'".$row["id"]."','".$row["first_name"]."','".$row["middle_name"]."','".$row["last_name"]."','".$row["suffix_name"]."','".$row["email"]."','".$row["device_id"]."','".$row["status"]."'"; echo ')" class="edit-button">Edit</a>';
                        // echo "<a class='delete-button' href='delete.php?id=" . $row["id"] . "'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    
                    echo "</tbody></table>";
                    echo "<br>";
                    echo'<a href="#" onclick="document.getElementById(';echo"'addUser'";echo').style.display=';echo"'block'"; echo '" class="add-button">Add User</a>';
                    
                    ?>
                </div>
              </div>
            </div>
            
       </div>
       
       <div id="addUser" class="modal">
	    
      
          <form class="modal-content animate" action="addUser.php" method="post">
            
            <div class="imgcontainer">
              <span onclick="document.getElementById('addUser').style.display='none'" class="close" title="Close Modal">&times;</span>
              <h1>Add User</h1>
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
              
             
                <?php 
                    require_once 'config.php';
                    
                 // Read all devices that is not yet deployed from the database
                 $query = "SELECT device_id FROM devices WHERE is_deployed ='0'";
                 $result = $db->query($query);
                 $is_empty = true;
                
                 echo '<label for="deviceID"><b>Device ID*</b></label>
                 <select name="deviceID" id="deviceID">';
                 // Display each device as a select
                 while ($row = mysqli_fetch_assoc($result)) {
                    echo '<option value='. $row["device_id"] .'>'. $row["device_id"] .'</option>';
                    $is_empty = false;
                 }
                 echo'</select>';
                    
                 if($is_empty){
                    echo'<h5 style="color:red">Warning: All devices are deployed to other users. Try to add device first.<span><a href="manageDevices.php"> Click Here To Add</a></span></h5>';
                    echo '<button type="submit" name="add" style="pointer-events: none; color:grey" disabled>Add</button>';
                 }else{
                    echo '<button type="submit" name="add">Add</button>';
                 }
                
                     
                ?>
              
                
              
              
            </div>
          </form>
        </div>
        
        <div id="editUser" class="modal">
	    
      
          <form id="editForm" class="modal-content animate"  method="post">
            
            <div class="imgcontainer">
              <span onclick="document.getElementById('editUser').style.display='none'" class="close" title="Close Modal">&times;</span>
              <h1>Edit User</h1>
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
              
              <label for="statusEdit"><b>Status*</b></label>
              <select name="statusEdit" id="statusEdit">
                <option value="active">Active</option>
                <option value="inactive">Inactive</option>
              </select>
              <label for="deviceIDEdit"><b>Device ID*</b></label>
              <select name="deviceIDEdit" id="deviceIDEdit"></select>
              
              <button type="submit" name="update">Update</button>
              
            </div>
          </form>
        </div>
        
    <?php require 'messageToast.php'?>
    
    <script>
        const input = document.getElementById("searchUser");
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
        var modal = document.getElementById('addUser');
        var editModal = document.getElementById('editUser');
        
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
            if (event.target == editModal) {
                editModal.style.display = "none";
            }
        }
        function editUser(id, first_name, middle_name, last_name, suffix_name, email, device_id, status){
            
            document.getElementById('editUser').style.display='block';
            document.getElementById('firstNameEdit').value = first_name;
            document.getElementById('middleNameEdit').value = middle_name;
            document.getElementById('lastNameEdit').value = last_name;
            document.getElementById('suffixNameEdit').value = suffix_name;
            document.getElementById('emailEdit').value = email;
            document.getElementById('statusEdit').value = status;
            var deviceIDSelect = document.getElementById("deviceIDEdit");
            while (deviceIDSelect.options.length > 0) {
              deviceIDSelect.options[0].remove();
            }
            var newOption = document.createElement("option");
            newOption.value = device_id;
            newOption.text = device_id;
            deviceIDSelect.appendChild(newOption);
            
            <?php 
            
            
             require_once 'config.php';
             // Read all devices that is not yet deployed from the database
             $query = "SELECT device_id FROM devices WHERE is_deployed ='0'";
             $result = $db->query($query);
             
             while ($row = mysqli_fetch_assoc($result)) {
                 echo 'var newOption = document.createElement("option");';
                 echo 'newOption.value = '. $row["device_id"] .';
                        newOption.text = '. $row["device_id"] .';
                        deviceIDSelect.appendChild(newOption);';
             }
            ?>
            
            document.getElementById('editForm').action="editUser.php?id="+id+"&oldDeviceID="+device_id;
        }
        
        

    </script>
       
    </body>
</html>