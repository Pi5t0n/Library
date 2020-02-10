<?php //include("header.php")?>
<?php
    if(isset($_POST['user_logout'])){
    //#########################Variables to save values###########
        session_destroy();
        session_unset();
        
        header("location:index.php");
    }
?>