<?php 
define('DB_HOST', 'localhost'); 
define('DB_USERNAME', 'id19735329_ivan'); 
define('DB_PASSWORD', 'M_7T[W]@wb_-1])v'); 
define('DB_NAME', 'id19735329_ivan_db');

date_default_timezone_set('Asia/Karachi');

// Connect with the database 
$db = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME); 
 
// Display error if failed to connect 
if ($db->connect_errno) { 
    echo "Connection to database is failed: ".$db->connect_error;
    exit();
}