<?php 
    session_start();
    if (!isset($_SESSION["user"]) && !isset($_SESSION["adminID"]) && !isset($_SESSION["name"]) && !isset($_SESSION["is_superAdmin"])) {
       header("Location: index.php");
    }
?>