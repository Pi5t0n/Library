<?php
     //Start the session if is not set
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    //Check if GET that contains values is checked
    if(isset($_GET['values'])){
        $local_storage=explode(",",$_GET['values']);
    }
    $member_ID=$_SESSION['user_id'];
    $date_add_cart=date("Y-m-d");

    if(!empty($local_storage)){
        $book_ID=$local_storage[0];
        $quantity=intval($local_storage[1]);
        //##########################QUERY#############################
        //Query to determine the number of sell samples aviable
        $SQL0="SELECT books_sell FROM Books where book_ID='$book_ID'";
        //Query to determine if there are books with the same book_ID and mmember_ID
        $SQL1="SELECT * FROM member_cart where book_ID='$book_ID' and member_ID='$member_ID'"; 
        //Query els SQL is not empty we need to add to qty_boo +1 this will bee defined in the if else because we can use de SQL1 to obtain the qty_book
        
    }
    
        
    //##########################CONNECT TO DB#####################
        include("bd_connect.php");
    //##########################EXECUTE QUERYS####################
        if(!empty($local_storage)){
            if (!($getBooksToSell=mysqli_fetch_row(mysqli_query($conn,$SQL0)))) {//Check if there are books to sell
                printf("Error ".mysqli_error($conn));
            }else{
                if($getBooksToSell[0]>0){//Check if value of books to sell is greater than 0
                    if(mysqli_num_rows(mysqli_query($conn,$SQL1))>0){
                        if (!($getTotalBooksID=mysqli_fetch_row(mysqli_query($conn,$SQL1)))) {
                            printf("Error ".mysqli_error($conn));
                        }else{
                            $getBooksInCar=$getTotalBooksID[3]+$quantity;
                            $SQL2="UPDATE member_cart set qty_book='$getBooksInCar' where book_ID='$book_ID' and member_ID='$member_ID'";
                            if (!mysqli_query($conn,$SQL2)) {//Call insert query
                                printf("Error ".mysqli_error($conn));
                            } 
                        }   
                    }else{
                        //Query if SQL1 is empty, then insert into member_cart new entry
                        $SQL3="INSERT INTO member_cart (book_ID,member_ID,initialDate,qty_book) values ('$book_ID','$member_ID','$date_add_cart','$quantity');";
                        if (!mysqli_query($conn,$SQL3)) {//Call insert query
                            printf("Error ".mysqli_error($conn));
                        }  
                    }

                }
                mysqli_close($conn);
                echo "Books added to member Cart";
            }
        }
?>