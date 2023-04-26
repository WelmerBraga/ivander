<html>
    <head>
        <style>
            body {
  font-family: Arial, sans-serif;
  background-size: cover;
  height: 100vh;
 
}

h5 {
  text-align: left;
  font-family: Tahoma, Arial, sans-serif;
  color: #004d99;
  margin: 20px 0;
}
h4 {
  text-align: left;
  font-family: Tahoma, Arial, sans-serif;
  color: #004d99;
  margin: 20px 0;
}
.box {
  width: 40%;
  margin: 0 auto;
  background: rgba(255,255,255,0.2);
  padding: 35px;
  border: 2px solid #fff;
  border-radius: 20px/50px;
  background-clip: padding-box;
  text-align: center;
}

.button {
  font-size: 1em;
  padding: 10px;
  color: #fff;
  border: 2px solid #06D85F;
  border-radius: 20px/50px;
  text-decoration: none;
  cursor: pointer;
  transition: all 0.3s ease-out;
}
.button:hover {
  background: #06D85F;
}

.overlay {
  position: fixed;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  background: rgba(0, 0, 0, 0.7);
  transition: opacity 500ms;
  visibility: hidden;
  opacity: 0;
}
.overlay:target {
  visibility: visible;
  opacity: 1;
}

.popup {
  margin: 70px auto;
  padding: 20px;
  background: #fff;
  border-radius: 5px;
  width: 80%;
  position: relative;
  transition: all 5s ease-in-out;
  
}

.popup h2 {
  margin-top: 0;
  color: #333;
  font-family: Tahoma, Arial, sans-serif;
}
.popup .close {
  position: absolute;
  top: 20px;
  right: 30px;
  transition: all 200ms;
  font-size: 30px;
  font-weight: bold;
  text-decoration: none;
  color: #333;
}
.popup .close:hover {
  color: red;
}
.popup .content {
  max-height: 30%;
  overflow: auto;
}


@media screen and (max-width: 700px){
  .box{
    width: 70%;
  }
  .popup{
    width: 70%;
  }
 
}
        </style>
       

<div class="menu-bar" id="myTopnav">
    <a href="#popup1"><h1 class="logo">ivander<span>2117.</span></h1></a>
    <div class="menu"><a href="#" onclick="myFunction()">Menu</a></div>
    
    
    <div id="popup1" class="overlay">
	<div class="popup">
		<h2>Our Aim;</h2>
		<a class="close" href="#">&times;</a>
		<div class="content">
			<h4>Thank you to pop me out of that button,</h4> <h5>IVANDER2117 Is an Auto-inflatable life jacket a device that can use by our rescuer equipt with GSM GPRS, GPS tracker, and Geolocation Dashboard for faster tracking and save lives due to drowning incidents.</h5>
			
			<h2>IVANDER2117 Main Objectives is;</h2>
		
		    
    <h5>1. Specifically to produce an Auto-inflatable triggering life jacket using Arduino UNO with GSM GPRS and GPS tracker for faster tracking using Geolocation and Google Maps.
    </h5>
    
    <h5>2. To Create a triggerable, auto-inflating personal floatation device with an Integrated Water Pressure Monitoring Transducer Sensor.</h5>
    
    
    <h5>3. Provide a navigational map to track the device’s exact location connected to Google Maps.</h5>
    
    <h5>4. To use a GSM module connected to an Arduino UNO. That sends a text message to let the admin knows that the device had been inflated and its location (longitude and &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;latitude).    
    </h5>
		</div>
		</div>
	</div>




  <ul>
    <?php
     if (isset($_SESSION["user"])&& isset($_SESSION["adminID"]) && isset($_SESSION["name"])) {
           echo '<li><a href="index.php">Map</a></li>
            <li><a href="dashboard.php">Dashboard</a></li>';
            echo '<li><a href="manageUser.php">Manage</a>';
            echo '<i class="fas fa-caret-down"></i></a>
        
                <div class="dropdown-menu">
                    <ul>
                      <li><a href="manageUser.php">Manage Users<i class="fas fa-caret-right"></i></a></li>
                      <li><a href="manageDevices.php" class="btn btn-warning">Manage Devices</a></li>';
                      if($_SESSION["is_superAdmin"]){
                          echo'<li><a href="manageAdmins.php" class="btn btn-warning">Manage Dasboard User</a></li>';
                      }
                    echo '</ul>
                  </div>
            </li>';
            echo '<li><a href="report.php">Reports<i class="fas fa-caret-down"></i></a>
            </li>
            <li><div class="vl"></div></li>';
            echo '<li><a href="adminProfile.php">'; echo $_SESSION["name"]; 
            echo '<i class="fas fa-caret-down"></i></a>
        
                <div class="dropdown-menu">
                    <ul>
                      <li><a href="adminProfile.php">Profile<i class="fas fa-caret-right"></i></a></li>
                      <li><a href="logout.php" class="btn btn-warning">Logout</a></li>
                    </ul>
                  </div>
            </li>';
        }else{
           echo'<li><a href="#" onclick="document.getElementById(';echo"'id01'";echo').style.display=';echo"'block'"; echo '" >Admin Login</a></li>';
        }
    ?>
    
  </ul>
  
  
                 <!--<div class="dropdown-menu">-->
                 <!--    <ul>-->
                 <!--      <li>-->
                 <!--        <a href="#">Rescuer Hotlines<i class="fas fa-caret-right"></i></a>-->
                        
                 <!--        <div class="dropdown-menu-1">-->
                 <!--          <ul>-->
                 <!--            <li><a href="#">BDRRMC</a></li>-->
                 <!--            <li><a href="#">FIRE Dept.</a></li>-->
                 <!--            <li><a href="#">REDCROSS</a></li>-->
                 <!--            <li><a href="#">COASTGUARD</a></li>-->
                 <!--            <li><a href="#">USAR</a></li>-->
                 <!--            <li><a href="#">PNP</a></li>-->
                 <!--            <li><a href="#">Phil. NAVY</a></li>-->
                 <!--          </ul>-->
                 <!--        </div>-->
                 <!--      </li>-->
                 <!--      <li><a href="report.php">Writen Reports</a></li>-->
                 <!--    </ul>-->
                 <!--  </div>-->
  
  <!--onclick="document.getElementById('id01').style.display='block'"-->
</div>

<script>
    function myFunction() {
      var x = document.getElementById("myTopnav");
      if (x.className === "menu-bar") {
        x.className += " responsive";
      } else {
        x.className = "menu-bar";
      }
    }
</script>

<!--<div class="hero">-->
<!--  &nbsp;-->
<!--</div>-->
