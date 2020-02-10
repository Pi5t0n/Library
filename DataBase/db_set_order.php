<?php
    // Start the session
    session_start();
    $member_ID=$_SESSION['user_id'];
    //##########################CONNECT TO DB#####################
    include("bd_connect.php");
    ///##########################CONSULT##########################
    $SQL0="SELECT member_cart.book_ID, member_cart.member_ID, member_cart.qty_book, books.unit_price FROM member_cart INNER JOIN books ON books.book_ID=member_cart.book_ID where member_ID='$member_ID';";
    
    
    if(!($cart_values=mysqli_fetch_all(mysqli_query($conn,$SQL0),MYSQLI_ASSOC))){
         printf("Error ".mysqli_error($conn));
    }else{
        foreach($cart_values as $row){
            $book_ID=$row['book_ID'];
            $qty_book=$row['qty_book'];
            $unit_price=$row['unit_price'];
            
            $SQL3="SELECT books_sell FROM books WHERE book_ID='$book_ID';";
            
            if(!($book_by_ID=mysqli_fetch_assoc(mysqli_query($conn,$SQL3)))){
                    printf("Error ".mysqli_error($conn));
            }else{
                if($qty_book>$book_by_ID['books_sell']){
                    $qty_book=$book_by_ID['books_sell'];
                    $book_by_ID=0;
                }else $book_by_ID=$book_by_ID['books_sell']-$qty_book;
            }
            
            $SQL1="INSERT INTO orders values('$book_ID','$member_ID','$qty_book',NOW(),'$unit_price');";
            $SQL2="DELETE from member_cart WHERE book_ID='$book_ID' and member_ID='$member_ID';";
            
            if(!mysqli_query($conn,$SQL1)){
                printf("Error ".mysqli_error($conn));
            }else{
                $SQL4="UPDATE books SET books_sell='$book_by_ID' WHERE book_ID='$book_ID';";
                if(!mysqli_query($conn,$SQL4)){
                        printf("Error ".mysqli_error($conn));
                } 
            } 
            if(!mysqli_query($conn,$SQL2)){
                    printf("Error ".mysqli_error($conn));
                }  
        }
    }
        //echo json_encode($cart_values);
        //echo($member_ID);
        //echo($cart_values[0]);
        //print_r($cart_values[0]['qty_book']);
?>