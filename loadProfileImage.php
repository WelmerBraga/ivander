<?php
// Get the image ID from the query string
$imageId = $_GET['id'];

require_once "config.php";

// Prepare a SQL query to retrieve the image data from the database
$sql = "SELECT image FROM admins WHERE admin_id = ?";

// Prepare a statement object and bind the image ID parameter
$stmt = mysqli_prepare($db, $sql);
mysqli_stmt_bind_param($stmt, "i", $imageId);

// Execute the query and retrieve the image data
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $imageData);
mysqli_stmt_fetch($stmt);

// Close the statement and database connections
mysqli_stmt_close($stmt);
mysqli_close($db);

// Get the image format dynamically
$imageInfo = getimagesizefromstring($imageData);
$imageFormat = $imageInfo['mime'];

// Set the content type header to indicate that the response contains image data
header("Content-Type: " . $imageFormat);


// Output the image data to the browser
echo $imageData;
?>