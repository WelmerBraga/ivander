<?php require 'auth.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ivander | Manage Devices</title>
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
                    <h2>Manage Devices</h2>
                    <br>
                    <input type="text" placeholder="Search Device ID" id="searchDevice">
                </div>  
                    <?php
                    
                    require_once 'config.php';
                    
                    // Read all users from the database
                    $query = "SELECT * FROM devices";
                    $result = $db->query($query);
                    
                    echo "<table id='table'>";
                    echo "<thead><tr><th>Device ID</th><th>Date Created</th><th>Status</th><th>Deployed</th><th>Actions</th></tr></thead>";
                    
                    // Display each user as a table row
                    while ($row = mysqli_fetch_assoc($result)) {
                        $deployed = $row["is_deployed"]? 'True':'False';
                        echo "<tbody><tr>";
                        echo "<td>" . $row["device_id"] . "</td>";
                        echo "<td>" . $row["date_created"] . "</td>";
                        echo "<td>" . $row["status"] . "</td>";
                        echo "<td>" . $deployed . "</td>";
                        echo "<td>";
                        echo'<a href="#" onclick="editDevice('; echo "'".$row["device_id"]."','".$row["date_created"]."','".$row["status"]."'"; echo ')" class="edit-button">Edit</a>';
                        // echo "<a class='delete-button' href='delete.php?id=" . $row["id"] . "'>Delete</a>";
                        echo "</td>";
                        echo "</tr></tbody>";
                    }
                    
                    echo "</table>";
                    echo "<br>";
                    echo'<a href="#" onclick="document.getElementById(';echo"'addDevice'";echo').style.display=';echo"'block'"; echo '" class="add-button">Add Device</a>';
                    
                    ?>
                </div>
              </div>
            </div>
            
       </div>
       
       <div id="addDevice" class="modal">
	    
      
          <form class="modal-content animate" action="addDevice.php" method="post">
            
            <div class="imgcontainer">
              <span onclick="document.getElementById('addDevice').style.display='none'" class="close" title="Close Modal">&times;</span>
              <h1>Add Device</h1>
            </div>
        
            <div class="container">
              <label for="deviceId"><b>Device ID</b></label>
              <input type="number" placeholder="Enter Device ID" name="deviceId" required>
              
              <!--<label for="dateCreated"><b>Email</b></label>-->
              <!--<input type="email" placeholder="Enter Email" name="dateCreated" required>-->
        
                
              <button type="submit" name="add">Add</button>
              
            </div>
          </form>
        </div>
        
        <div id="editDevice" class="modal">
	    
      
          <form id="editForm" class="modal-content animate"  method="post">
            
            <div class="imgcontainer">
              <span onclick="document.getElementById('editDevice').style.display='none'" class="close" title="Close Modal">&times;</span>
              <h1>Edit Device</h1>
            </div>
        
            <div class="container">
              <label for="deviceIdEdit"><b>Device ID</b></label>
              <input type="text" placeholder="Enter Device ID" id='deviceIdEdit' name="deviceIdEdit" required readonly>
              
              <!--<label for="datedCreatedEdit"><b>Date Created</b></label>-->
              <!--<input type="date" placeholder="Enter Date" id='datedCreatedEdit' name="datedCreatedEdit" required>-->
              
              <label for="statusEdit"><b>Status</b></label>
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
    
        const input = document.getElementById("searchDevice");
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
            for (let j = 0; j < 1; j++) {
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
        var modal = document.getElementById('addDevice');
        var editModal = document.getElementById('editDevice');
        
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
            if (event.target == editModal) {
                editModal.style.display = "none";
            }
        }
        function editDevice(id, datedCreated, status){
            
            document.getElementById('editDevice').style.display='block';
            document.getElementById('deviceIdEdit').value = id;
            // document.getElementById('datedCreatedEdit').value = datedCreated;
            document.getElementById('statusEdit').value = status;
            document.getElementById('editForm').action="editDevice.php?id="+id;
        }
        
    </script>
       
    </body>
</html>