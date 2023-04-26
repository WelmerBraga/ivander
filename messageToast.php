

<?php
    if (isset($_SESSION["user"]) && isset($_SESSION["adminID"]) && isset($_SESSION["name"]) && isset($_SESSION["is_superAdmin"])) {
       echo '<div id="snackbar"> '. $_SESSION["message"] .' </div>';
    }

    
?>

<script>

    function showToast() {
      // Get the snackbar DIV
      var x = document.getElementById("snackbar");
    
      // Add the "show" class to DIV
      x.className = "show";
    
      // After 3 seconds, remove the show class from DIV
      setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
    }
    
    <?php
        if(isset($_SESSION["message"])&& $_SESSION["message"]!=''){
            echo 'showToast()';
            $_SESSION["message"] = '';
        }
    ?>
</script>