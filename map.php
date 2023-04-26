
<?php
//error: Google Maps JavaScript API error: ApiNotActivatedMapError
//solution: click "APIs and services" Link
//			click "Enable APIs and services" button
//			Select "Maps JavaScript API" then click on enable


// require 'auth.php';
session_start();
require_once 'config.php';
// $adminID = $_SESSION["adminID"];
$sql = "SELECT g.*, u.first_name, u.middle_name, u.last_name, u.suffix_name FROM tbl_GPS g JOIN users u INNER JOIN (SELECT device_id, MAX(created_date) AS max_created_date FROM tbl_GPS GROUP BY device_id ) latest ON g.device_id = latest.device_id AND g.created_date = latest.max_created_date WHERE g.created_date >= DATE_SUB(NOW(), INTERVAL 24 HOUR) && g.device_id = u.device_id;";
$result = $db->query($sql);
if (!$result) {
  { echo "errno: " . $sql . "<br>" . $db->errno; }
}

$rows = $result -> fetch_all(MYSQLI_ASSOC);

?>
<html lang="en">
<html>
<head>
    
    <meta charset="UTF-8">
    <title>Ivander | Home</title>
    <link rel="stylesheet" href="style.css">
  
 
</head>
<style>

#map-layer {
    border: 10px solid white;
	/*width: 99%;*/
	/*height: 90%;*/
	width: 100%;
	/*height: 94.5%;*/
	height: 90%;
	margin-top: 50px;
 /*   margin-left: 10px;*/
    background-size: contain;
background-repeat: no-repeat;
    

}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}

/* Set a style for all buttons */
button {
  background-color: #2947a3;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: auto;
  padding: 10px 18px;
  background-color: #f44336;
  
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}


h1 {
  color: #2947a3;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-left: 20%;
  padding-right: 20%;
  padding-top: 10%;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
  position: absolute;
  right: 25px;
  top: 0;
  color: #000;
  font-size: 35px;
  font-weight: bold;
}

.close:hover,
.close:focus {
  color: red;
  cursor: pointer;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}
.gm-style-iw button {
  display: none !important;
}
.marker-details {
  position: absolute;
  top: 10px;
  left: 10px;
  z-index: 100;
  background-color: #fff;
  padding: 10px;
  border-radius: 5px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

</style>
<?php require 'style.php'?>

<body>
    <?php require 'navBar.php' ?>
    

	<div id="map-layer"></div>
	
	<div id="id01" class="modal">
	    
      
      <form class="modal-content animate" action="map.php" method="post">
        
        <div class="imgcontainer">
          <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
          <h1>Ivander Login</h1>
        </div>
        <hr>
        <div class="container">
          <label for="uname"><b>Username</b></label>
          <input type="text" placeholder="Enter Username" name="email" required>
    
          <label for="psw"><b>Password</b></label>
          <input type="password" placeholder="Enter Password" name="password" required>
            
          <button  type="submit" name="login">Login</button>
          <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
          </label>
          <hr>
           <!--<div><p>&nbsp; &nbsp; Not registered yet <a href="registration.php">&nbsp; Register Here</a></p></div>-->
           
           
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
                        if($user["status"] == 'active'){
                            $_SESSION["user"] = "yes";
                            $_SESSION["adminID"] = $user["admin_id"];
                            $fullName = $user["first_name"].' '.($user["middle_name"] != ""? $user["middle_name"].' ':'');
                            $fullName .= $user["last_name"].' '.($user["suffix_name"] != ""? $user["suffix_name"].' ':'');
                            $_SESSION["name"] = $fullName;
                            $_SESSION["adminID"] = $user["admin_id"];
                            $_SESSION["fName"] = $user["first_name"];
                            $_SESSION["mName"] = $user["middle_name"];
                            $_SESSION["lName"] = $user["last_name"];
                            $_SESSION["sName"] = $user["suffix_name"];
                            $_SESSION["gender"] = $user["gender"];
                            $_SESSION["email"] = $user["email"];
                            $_SESSION["birthday"] = $user["birthday"];
                            $_SESSION["is_superAdmin"] = ($user["is_superAdmin"]==1)? true:false;
                            $_SESSION["message"] = 'Good Day Admin!';
                            header("Location: index.php");
                            die();
                        }else{
                            $_SESSION["message"] = 'Admin account is not active, please contact your super admin.';
                        }
                    }else{
                        $_SESSION["message"] = 'Incorrect Email or Password';
                        // echo "<div class='alert alert-danger'>Password does not match</div>";
                    }
                }else{
                    $_SESSION["message"] = 'Incorrect Email or Password';
                    // echo "<div class='alert alert-danger'>Email does not match</div>";
                }
            }
        ?>
        </div>
      </form>
    </div>
	
	<?php require 'messageToast.php'?>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
      var map;
      var oldLoc = {};
      var myMarkers = [];
      function initMap() {
        
        var mapLayer = document.getElementById("map-layer");
		var centerCoordinates = new google.maps.LatLng(7.06152, 125.605);
		var defaultOptions = { center: centerCoordinates, zoom: 12 }

		map = new google.maps.Map(mapLayer, defaultOptions);
        
        getOldLocations();
    

        <?php foreach($rows as $location){ ?>
            var location = new google.maps.LatLng(<?php echo $location['lat']; ?>, <?php echo $location['lng']; ?>);
            var marker = new google.maps.Marker({
                position: location,
                map: map,
                title: <?php echo $location['device_id']; ?>
            });
            <?php 
                $fullname = $location['first_name']. ' ' . ($location['middle_name']!= ''? $location['middle_name'].' ':'');
                $fullname .= $location['last_name']. ' ' . ($location['suffix_name']!= ''? $location['suffix_name'].' ':'');
            ?>
            myMarkers.push(marker);
            var infoContent = '<div>Name: <?php echo $fullname?></div><div>Device ID: <?php echo $location['device_id']?></div>';
            var infoWindow = new google.maps.InfoWindow({
              content: infoContent
            });
            infoWindow.open(map, marker);
            // Move the center of the map to a new position
            newCenter = { lat: <?php echo $location['lat']; ?>, lng: <?php echo $location['lng']; ?> };
            map.setCenter(newCenter);
        
        <?php } ?>
        setInterval(function() {
          $.ajax({
            url: "getGps.php",
            dataType: "json",
            success: function(data) {
            console.log('new:');
            console.log(data);
            if(!(JSON.stringify(oldLoc) === JSON.stringify(data))){
                for (let i = 0; i < myMarkers.length; i++) {
                  myMarkers[i].setMap(null);
                }
                oldLoc = data;
                for (const element of data) {
                  
                  console.log(JSON.stringify(oldLoc) === JSON.stringify(data));
                      var location = new google.maps.LatLng(element.lat , element.lng);
                    var marker = new google.maps.Marker({
                        position: location,
                        map: map,
                        title: 'hello'
                    });
                    myMarkers.push(marker);
                    var newFullName = element.first_name +' '+ (element.middle_name? element.middle_name +' ':'');
                    newFullName += element.last_name +' '+ (element.suffix_name? element.suffix_name +' ':'');
                    var infoContent = '<div>Name: '+ newFullName +'</div><div>Device ID: '+ element.device_id +'</div>';
                    var infoWindow = new google.maps.InfoWindow({
                      content: infoContent
                    });
                    infoWindow.open(map, marker);
                    newCenter = { lat: element.lat, lng: element.lng };
                    map.setCenter(newCenter);
              } 
            }
              
            }
          });
        }, 5000);
        
      }
    //   // Create an HTML element for the list of marker details and position it using CSS
    //     const detailsDiv = document.createElement("div");
    //     detailsDiv.classList.add("marker-details");
    //     detailsDiv.innerHTML = markers
    //       .map(
    //         (marker) =>
    //           `<div class="marker-detail"><h3>${marker.title}</h3><p>${marker.content}</p></div>`
    //       )
    //       .join("");
    //     map.controls[google.maps.ControlPosition.TOP_LEFT].push(detailsDiv);
     
      function getOldLocations(){
          oldLoc = <?php echo json_encode($rows); ?>;
          
          console.log('old:');
          console.log(oldLoc);
      }
      
      // Get the modal
        var modal = document.getElementById('id01');
        
        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
        
        
        /////////////////////////////////////////
        
    <script>
      /**
       * @license
       * Copyright 2019 Google LLC. All Rights Reserved.
       * SPDX-License-Identifier: Apache-2.0
       */
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">
      function initMap() {
        const map = new google.maps.Map(document.getElementById("map"), {
          center: { lat: 40.749933, lng: -73.98633 },
          zoom: 13,
          mapTypeControl: false,
        });
        const card = document.getElementById("pac-card");
        const input = document.getElementById("pac-input");
        const biasInputElement = document.getElementById("use-location-bias");
        const strictBoundsInputElement =
          document.getElementById("use-strict-bounds");
        const options = {
          fields: ["formatted_address", "geometry", "name"],
          strictBounds: false,
          types: ["establishment"],
        };

        map.controls[google.maps.ControlPosition.TOP_LEFT].push(card);

        const autocomplete = new google.maps.places.Autocomplete(
          input,
          options
        );

        // Bind the map's bounds (viewport) property to the autocomplete object,
        // so that the autocomplete requests use the current map bounds for the
        // bounds option in the request.
        autocomplete.bindTo("bounds", map);

        const infowindow = new google.maps.InfoWindow();
        const infowindowContent = document.getElementById("infowindow-content");

        infowindow.setContent(infowindowContent);

        const marker = new google.maps.Marker({
          map,
          anchorPoint: new google.maps.Point(0, -29),
        });

        autocomplete.addListener("place_changed", () => {
          infowindow.close();
          marker.setVisible(false);

          const place = autocomplete.getPlace();

          if (!place.geometry || !place.geometry.location) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert(
              "No details available for input: '" + place.name + "'"
            );
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
          }

          marker.setPosition(place.geometry.location);
          marker.setVisible(true);
          infowindowContent.children["place-name"].textContent = place.name;
          infowindowContent.children["place-address"].textContent =
            place.formatted_address;
          infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        // Autocomplete.
        function setupClickListener(id, types) {
          const radioButton = document.getElementById(id);

          radioButton.addEventListener("click", () => {
            autocomplete.setTypes(types);
            input.value = "";
          });
        }

        setupClickListener("changetype-all", []);
        setupClickListener("changetype-address", ["address"]);
        setupClickListener("changetype-establishment", ["establishment"]);
        setupClickListener("changetype-geocode", ["geocode"]);
        setupClickListener("changetype-cities", ["(cities)"]);
        setupClickListener("changetype-regions", ["(regions)"]);
        biasInputElement.addEventListener("change", () => {
          if (biasInputElement.checked) {
            autocomplete.bindTo("bounds", map);
          } else {
            // User wants to turn off location bias, so three things need to happen:
            // 1. Unbind from map
            // 2. Reset the bounds to whole world
            // 3. Uncheck the strict bounds checkbox UI (which also disables strict bounds)
            autocomplete.unbind("bounds");
            autocomplete.setBounds({
              east: 180,
              west: -180,
              north: 90,
              south: -90,
            });
            strictBoundsInputElement.checked = biasInputElement.checked;
          }

          input.value = "";
        });
        strictBoundsInputElement.addEventListener("change", () => {
          autocomplete.setOptions({
            strictBounds: strictBoundsInputElement.checked,
          });
          if (strictBoundsInputElement.checked) {
            biasInputElement.checked = strictBoundsInputElement.checked;
            autocomplete.bindTo("bounds", map);
          }

          input.value = "";
        });
      }

      window.initMap = initMap;
        
        
    </script>
    <script
		src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDQHiE18s3j2Y8O8OcB4rCx8KnSgVVOkaY&callback=initMap"
		async defer></script>
		
</body>

</html>