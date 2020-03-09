<?php
    if(isset($_POST['book_to_cart_cookie'])){
        $book_ID=$_POST['book_to_cart_cookie'];
        //$cookie_value = 1;

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
        
        if(isset($_COOKIE["Cart"])){
            $cookie_value=json_decode($_COOKIE["Cart"],TRUE);
            if(!(empty($cookie_value[$book_ID]))){
                $booksInCart= intval($cookie_value[$book_ID]["quantity"])+1;
                $cookie_value[$book_ID]["quantity"]=$booksInCart;
                setcookie("Cart", json_encode($cookie_value), time() + (86400 * 30), "/"); // 86400 = 1 day
                //echo($booksInCart);
                //
                //
                
            }else{
                $cookie_value[$book_ID]=$cart_values;
                $cookie_value[$book_ID]["quantity"]=1;
                setcookie("Cart", json_encode($cookie_value), time() + (86400 * 30), "/"); // 86400 = 1 day
            }
        }else{
            $cookie_value[$book_ID]=$cart_values;
            $cookie_value[$book_ID]["quantity"]=1;
            setcookie("Cart", json_encode($cookie_value), time() + (86400 * 30), "/"); // 86400 = 1 day
        }
        //print_r(json_encode($cookie_value));
    }
    
?>