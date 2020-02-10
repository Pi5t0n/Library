<?php
    //All do it by root
    $conn = mysqli_connect('localhost','root','','library');
    mysqli_set_charset($conn,'utf8');
    
    //Check correct connection
    if(!$conn) {
            echo 'Connection error: '. mysqli_connect_error();
    } 
?>