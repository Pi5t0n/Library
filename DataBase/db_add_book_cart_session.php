<?php
    if(!isset($_SESSION["Cart"])){ 
        session_start(); 
    }
    if(isset($_SESSION["Cart"])){
        print_r($_SESSION["Cart"]);
        //unset($_SESSION["Cart"]);
        //echo("HOOOOOOOOOOOOOOLA");
    }
?>