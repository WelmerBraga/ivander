<?php require 'auth.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Ivander | Reports</title>
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
                color: #2947a3;
                font-family: monospace;
                font-size: 20px;
                text-align: center;
                
            }
            th {
                background-color: #588c7e;
                color: white;
            }
            
            tr{
                background-color: #f2f2f2;
                color: #2947a3;
                
            }
            tr:nth-child(even) {
               background-color: #f2f2f2;
                
            }
        </style>
        <?php require 'style.php' ?>
    </head>
    <body>
        <?php require 'navBar.php' ?>
        <div style="padding-top:50px"></div>
        <div class="wrapper">
            <div class="card">
                <div class="container">
                    <table>
                        <tr>
                            <th>Device ID</th>
                            <th>Name</th>
                            <th>Actions</th>
                        </tr>
                        <tr>
                            
                        </tr>
                        <?php
                            require 'config.php';
                            $db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME); 
                            // Check connection
                            if ($db->connect_errno) {
                            die("Connection failed: " .$db->connect_errno);
                            }
                            $sql = 'SELECT DISTINCT gps.device_id as dID, u.first_name as fName, u.middle_name as mName, u.last_name as lName, u.suffix_name as sName FROM `tbl_GPS` as gps JOIN users as u WHERE u.device_id = gps.device_id';
                            // $sql = "SELECT users.first_name, middle_name, last_name, email, status, tbl_GPS.lat, lng, user_id, created_date FROM users INNER JOIN tbl_GPS ON users.device_id = tbl_GPS.device_id";
                                    
                                   
              
                                    
                           $result = mysqli_query($db, $sql) or die("error".mysqli_error($db));
                            if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $fullname = $row["fName"]. ' '.($row["mName"]!=''?$row["mName"]:'');
                                $fullname .= $row["lName"]. ' '.($row["sName"]!=''?$row["sName"]:'');
                                echo "<tr >
                                    <td>" . $row["dID"]. "</td>
                                    <td>" . $fullname. "</td>";
                                    echo "<td>";
                                        echo '<a href="#" onclick="viewDetails('. $row["dID"] .')" class="edit-button">View Details</a>';
                                    echo "</td>";
                                echo "</tr>";
                            } 
                           } else { echo "0 results"; }
                           
                        
                        ?>
                    </table>
                </div>
            </div>
        </div>
        <div id="viewReportDetails" class="modal">
          <div class="modal-content animate">
              <div class="container">
                  <h3 id='myName'></h3>
                  <h3 id='myDeviceID'></h3>
                  <div id='results-container'>
                    <table id='myTable'></table>
                  </div>
                  
              </div>
          </div>
        </div>
        <script>
            // Get the modal
            var viewDetailsModal = document.getElementById('viewReportDetails');
            
            
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == viewDetailsModal) {
                    viewDetailsModal.style.display = "none";
                }
            }
            
            function viewDetails(dID){
              var xhr = new XMLHttpRequest();
              xhr.open("GET", "reportsViewDetails.php?dID=" + dID);
              xhr.onreadystatechange = function() {
                if (this.readyState === 4 && this.status === 200) {
                  var results = JSON.parse(this.responseText);
                  
                  // Create a table element
                  var table = document.getElementById("myTable");
                  while(table.rows.length > 0) {
                   table.deleteRow(0);
                  }
                //   var table = document.createElement("table");
                  var fName = results[0]['fName'];
                  var mName = results[0]['mName'];
                  var lName = results[0]['lName'];
                  var sName = results[0]['sName'];
                  var fullName = fName +' '+ (mName!=''? mName+' ':'');
                  fullName += lName +' '+ (sName!=''? sName+' ':'');
                  var myName = document.getElementById("myName");
                  myName.innerText = 'Name: '+fullName;
                  var myDeviceID = document.getElementById("myDeviceID");
                  myDeviceID.innerText = 'Device ID: '+dID;
                  // Create a header row
                  // Create a header row
                  var headerRow = table.insertRow(0);
                  var keys = Object.keys(results[0]);
                  for (var i = 0; i < keys.length; i++) {
                    if (keys[i] !== 'fName' && keys[i] !== 'mName' && keys[i] !== 'lName' && keys[i] !== 'sName') {
                      var headerCell = headerRow.insertCell();
                      headerCell.innerText = keys[i];
                    }
                  }
                  
                  // Create a row for each result
                  for (var i = 0; i < results.length; i++) {
                    var row = table.insertRow();
                    var values = Object.values(results[i]);
                    for (var j = 0; j < values.length; j++) {
                      if (keys[j] !== 'fName' && keys[j] !== 'mName' && keys[j] !== 'lName' && keys[j] !== 'sName') {
                        var cell = row.insertCell();
                        cell.innerText = values[j];
                      }
                    }
                  }
                  document.getElementById('viewReportDetails').style.display='block';
                  // Add the table to the page
                //   var container = document.getElementById("results-container");
                //   container.appendChild(table);
                }
              };
              xhr.send();
                
                
                
            }
            
        </script>
    </body>
</html>