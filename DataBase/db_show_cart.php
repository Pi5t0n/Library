<?php
    // Start the session
    session_start();
    $member_ID=$_SESSION['user_id'];

    //##########################CONNECT TO DB#####################
    include("bd_connect.php");
    //##########################CONSULT##########################
    //$SQL0="SELECT * FROM member_cart WHERE member_id=$member_ID;";
    $SQL0="SELECT member_cart.book_ID, member_cart.member_ID, member_cart.initialDate, member_cart.qty_book, books.unit_price, books.title FROM member_cart INNER JOIN books ON books.book_ID=member_cart.book_ID where member_ID='$member_ID'";

    if(!($cart_values=mysqli_fetch_all(mysqli_query($conn,$SQL0),MYSQLI_ASSOC))){
         printf("Error ".mysqli_error($conn). "or your user is not correct");
    }else{
        //print_r(array_values($cart_values));
        echo json_encode($cart_values);
    }
?>