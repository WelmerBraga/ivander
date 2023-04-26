<?php

if(isset($_POST["id"]))  
{
    $output = '';
    
    
   require 'config.php';
  $db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME); 
                    // Check connection
                    if ($db->connect_errno) {
                    die("Connection failed: " .$db->connect_errno);
                    }
                     $query = "SELECT * FROM users WHERE id = '".$_POST["id"]."'";  
    
                    $result = $db->query($sql);
                    if ($result->num_rows > 0) {
                    // output data of each row
                    while($row = $result->fetch_assoc()) {
    

    $output .= '  
    <div class="table-responsive">  
         <table class="table table-bordered">';  
    while($row = mysqli_fetch_array($result))  
    {  
         $output .= '  
               <tr>  
                   <td width="30%"><label>ID</label></td>  
                   <td width="70%">'.$row["id"].'</td>  
              </tr>
              <tr>  
                   <td width="30%"><label>First Name</label></td>  
                   <td width="70%">'.$row["first_name"].'</td>  
              </tr>  
              <tr>  
                   <td width="30%"><label>Middle Name</label></td>  
                   <td width="70%">'.$row["middle_name"].'</td>  
              </tr>  
              <tr>  
                   <td width="30%"><label>Last Name</label></td>  
                   <td width="70%">'.$row["last_name"].'</td>  
              </tr>  
              <tr>  
                   <td width="30%"><label>Suffix Name</label></td>  
                   <td width="70%">'.$row["suffix_name"].'</td>  
              </tr>  
              <tr>  
                   <td width="30%"><label>Email</label></td>  
                   <td width="70%">'.$row["email"].'</td>  
              </tr>  
               <tr>  
                   <td width="30%"><label>Latitude</label></td>  
                   <td width="70%">'.$row["lat"].'</td>  
              </tr>  
              <tr>  
                   <td width="30%"><label>Longitude</label></td>  
                   <td width="70%">'.$row["lng"].'</td>  
              </tr> 
              ';  
    }  
    $output .= "</table></div>";  
    echo $output;  






}
}
}