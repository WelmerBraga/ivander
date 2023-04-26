<?php 
require 'auth.php'; 

require_once 'config.php';
//Query for Users Chart
$sql = "SELECT * FROM users";
$result = $db->query($sql);
if (!$result) {
  { echo "errno: " . $sql . "<br>" . $db->errno; }
}
$rows = $result -> fetch_all(MYSQLI_ASSOC);
$userActive = 0;
$userInactive = 0;

foreach($rows as $user){
    if($user['status'] == 'active'){
        $userActive++;
    }else if($user['status'] == 'inactive'){
        $userInactive++;
    }
}

//Query for Devices Chart
$sql = "SELECT * FROM devices";
$result = $db->query($sql);
if (!$result) {
  { echo "errno: " . $sql . "<br>" . $db->errno; }
}
$rows = $result -> fetch_all(MYSQLI_ASSOC);
$deviceActive = 0;
$deviceInactive = 0;

foreach($rows as $device){
    if($device['status'] == 'active'){
        $deviceActive++;
    }else if($device['status'] == 'inactive'){
        $deviceInactive++;
    }
}


?>
<!DOCTYPE HTML>
<html>
<head>


<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
  
}

/* Create four equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 10px;
  
}
.column-whole {
  float: left;
  width: 100%;
  padding: 10px;
  
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
  
}

/* Responsive layout - makes a two column-layout instead of four columns */
@media screen and (max-width: 900px) {
  .column  {
    width: 50%;
  }
}

/* Responsive layout - makes the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column  {
    width: 100%;
    
  }
  .div.b {
  line-height: 1.6;
  
}
}

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
            <h2>Dashboard</h2><hr>
            </div>  
    
  <div class="row">  
  <div class="column" style="background-color:#4080bf;">
  <h2>Total Active Device:</h2>
  <h3><?php echo '  '. $deviceActive . ' active Device/s'?></h3>
  </div>
  <div class="column" style="background-color:#6699cc;">
  <h2>Total Inactive Device:</h2>
  <h3><?php echo '  '. $deviceInactive . ' inactive Device/s'?></h3>
  </div>
  <div class="column" style="background-color:#8cb3d9;">
  <h2>Total Active User:</h2>
  <h3><?php echo '  '. $userActive . ' active User/s'?></h3>
  </div>
  <div class="column" style="background-color:#b3cce6;">
  <h2>Total Inactive User:</h2>
  <h3><?php echo '  '. $userInactive . ' inactive User/s'?></h3>
  </div>
   </div>
   <hr>
       
        <div class="row">
            <div class="column-whole">
                <div id="dailyEmergencyChartContainer" style="height: 360px;"></div>
              </div>
        </div>
        <div class="row">
          <div class="column">
            <div id="usersChartContainer" style="height: 360px;"></div>
          </div>
          <div class="column" >
             <div id="devicesChartContainer" style="height: 360px; "></div>
          </div>
    </div>
    </div>
</div>



<script>
window.onload = function () {

var userChart = new CanvasJS.Chart("usersChartContainer", {
	exportEnabled: true,
	animationEnabled: true,
	title:{
		text: "Users"
	},
	subtitles: [{
		text: ""
	}], 
	axisX: {
		title: "Status"
	},
	axisY: {
		title: "Active Count",
		titleFontColor: "#4F81BC",
		lineColor: "#4F81BC",
		labelFontColor: "#4F81BC",
		tickColor: "#4F81BC",
		includeZero: true
	},
	axisY2: {
		title: "Inactive Count",
		titleFontColor: "#ff0000",
		lineColor: "#ff0000",
		labelFontColor: "#ff0000",
		tickColor: "#ff0000",
		includeZero: true
	},
	toolTip: {
		shared: true
	},
	legend: {
		cursor: "pointer",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "Active",
		showInLegend: true,      
		yValueFormatString: "#,##0.# Users",
		dataPoints: [
			{ label: "Users",  y: <?php echo $userActive?> },
			
		]
	},
	{
		type: "column",
		name: "Inactive",
		axisYType: "secondary",
		showInLegend: true,
		yValueFormatString: "#,##0.# Users",
		dataPoints: [
			{ label: "Users", y: <?php echo $userInactive?> },
			
		]
	}]
});




var deviceChart = new CanvasJS.Chart("devicesChartContainer", {
	exportEnabled: true,
	animationEnabled: true,
	title:{
		text: "Devices"
	},
	subtitles: [{
		text: ""
	}], 
	axisX: {
		title: "Status"
	},
	axisY: {
		title: "Active Count",
		titleFontColor: "#4F81BC",
		lineColor: "#4F81BC",
		labelFontColor: "#4F81BC",
		tickColor: "#4F81BC",
		includeZero: true
	},
	axisY2: {
		title: "Inactive Count",
		titleFontColor: "#ff0000",
		lineColor: "#ff0000",
		labelFontColor: "#ff0000",
		tickColor: "#ff0000",
		includeZero: true
	},
	toolTip: {
		shared: true
	},
	legend: {
		cursor: "pointer",
		itemclick: toggleDataSeries
	},
	data: [{
		type: "column",
		name: "Active",
		showInLegend: true,      
		yValueFormatString: "#,##0.# Devices",
		dataPoints: [
			{ label: "Devices",  y: <?php echo $deviceActive?> },
			
		]
	},
	{
		type: "column",
		name: "Inactive",
		axisYType: "secondary",
		showInLegend: true,
		yValueFormatString: "#,##0.# Devices",
		dataPoints: [
			{ label: "Devices", y: <?php echo $deviceInactive?> },
			
		]
	}]
});
const today = new Date();
const dateMax = new Date();
const dateMin = new Date(dateMax)
dateMin.setDate(dateMin.getDate() - 6);

const min1 = new Date(), min2 = new Date(), min3 = new Date(),min4 = new Date(),min5 = new Date(),min6 = new Date();
min1.setDate(dateMax.getDate() - 1);
min2.setDate(dateMax.getDate() - 2);
min3.setDate(dateMax.getDate() - 3);
min4.setDate(dateMax.getDate() - 4);
min5.setDate(dateMax.getDate() - 5);
min6.setDate(dateMax.getDate() - 6);
// calling a constructor, can use other methods to extract info from returned value


// dateMax.toDateString();
// dateMin.toDateString()


var dailyEmergencyChart = new CanvasJS.Chart("dailyEmergencyChartContainer", {
    
    exportEnabled: true,
	animationEnabled: true,
	title: {
		text: "Daily Emergency Analysis"
		
	},
	axisX: {
	    title: "Deflation Counts",
		valueFormatString: "DDD",
		minimum: new Date(dateMin.getFullYear(), dateMin.getMonth(), dateMin.getDate()),
		maximum: new Date(dateMax.getFullYear(), dateMax.getMonth(), dateMax.getDate()),
	},
	axisY: {
		title: "Number of Triggered Devices",
	},
	axisY2: {
		title: "End of Counting",
		titleFontColor: "#C0504E",
		lineColor: "#C0504E",
		labelFontColor: "#C0504E",
		tickColor: "#C0504E",
		includeZero: true
	},
	
	toolTip: {
		shared: true
	},
	legend: {
		verticalAlign: "top",
		horizontalAlign: "right",
		dockInsidePlotArea: true
	},
	
	data: [{
		name: "Triggered Devices",
		showInLegend: true,
		legendMarkerType: "square",
		type: "area",
		color: "#004080",
		markerSize: 2,
		dataPoints: [
			{ x: new Date(dateMax.getFullYear(), dateMax.getMonth(), dateMax.getDate()), y: 4 },
			{ x: new Date(min1.getFullYear(), min1.getMonth(), min1.getDate()), y: 0 },
			{ x: new Date(min2.getFullYear(), min2.getMonth(), min2.getDate()), y: 2 },
			{ x: new Date(min3.getFullYear(), min3.getMonth(), min3.getDate()), y: 1 },
			{ x: new Date(min4.getFullYear(), min4.getMonth(), min4.getDate()), y: 6 },
			{ x: new Date(min5.getFullYear(), min5.getMonth(), min5.getDate()), y: 3 },
			{ x: new Date(min6.getFullYear(), min6.getMonth(), min6.getDate()), y: 2 }
		]
	},
// 	{
// 		name: "Sent",
// 		showInLegend: true,
// 		legendMarkerType: "square",
// 		type: "area",
// 		color: "#4F81BC",
// 		markerSize: 0,
// 		dataPoints: [
// 			{ x: new Date(2017, 1, 6), y: 42 },
// 			{ x: new Date(2017, 1, 7), y: 34 },
// 			{ x: new Date(2017, 1, 8), y: 29 },
// 			{ x: new Date(2017, 1, 9), y: 42 },
// 			{ x: new Date(2017, 1, 10), y: 53},
// 			{ x: new Date(2017, 1, 11), y: 15 },
// 			{ x: new Date(2017, 1, 12), y: 12 }
// 		]
// 	}
	]
});

userChart.render();
deviceChart.render();
dailyEmergencyChart.render();

function toggleDataSeries(e) {
	if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
		e.dataSeries.visible = false;
	} else {
		e.dataSeries.visible = true;
	}
	e.chart.render();
}

}
</script>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>