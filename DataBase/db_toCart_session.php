<?php
    if(isset($_POST['book_to_cart_session'])){
        $book_ID=strval($_POST['book_to_cart_session']);
        // Start the session
         //Start the session if is not set
        if(!isset($_SESSION)) 
        { 
            session_start(); 
        }
        
        //##########################CONNECT TO DB#####################
        include("bd_connect.php");
        //##########################CONSULT##########################
        //$SQL0="SELECT * FROM member_cart WHERE member_id=$member_ID;";
        //$SQL0="SELECT member_cart.book_ID, member_cart.member_ID, member_cart.initialDate, member_cart.qty_book, books.unit_price, books.title FROM member_cart INNER JOIN books ON books.book_ID=member_cart.book_ID where member_ID='$member_ID'";
        $SQL0="SELECT * from books where book_id='$book_ID'";

        if(!($cart_values=mysqli_fetch_assoc(mysqli_query($conn,$SQL0)))){
             printf("Error ".mysqli_error($conn). "or your user is not correct");
        }
        //print_r(json_encode($cart_values));
        
        if(isset($_SESSION["Cart"])){
            $session_value=json_decode($_SESSION["Cart"],TRUE);
            if(!(empty($session_value[$book_ID]))){
                $booksInCart= intval($session_value[$book_ID]["quantity"])+1;
                $session_value[$book_ID]["quantity"]=$booksInCart;
                $_SESSION["Cart"]=json_encode($session_value);
                
            }else{
                $session_value[$book_ID]=$cart_values;
                $session_value[$book_ID]["quantity"]=1;
                $_SESSION["Cart"]=json_encode($session_value);
            }
        }else{
            $session_value[$book_ID]=$cart_values;
            $session_value[$book_ID]["quantity"]=1;
            $_SESSION["Cart"]=json_encode($session_value);
        }
        //Sprint_r(json_encode($session_value));
    }
    
?>