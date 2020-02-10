<?php

    if(isset($_POST["book_out_cart"])){
        //POST all values from form
        $book_ID=$_POST['book_out_cart'];
            //$member_ID=$_POST['member_ID'];
        $member_ID=$_SESSION['user_id'];
        //$member_ID=$_SESSION['member_ID'];
        $date_add_cart=date("Y-m-d");
        
    //##########################CONNECT TO DB#####################
        include("bd_connect.php");
        
    //##########################QUERY#############################
        //Query to determine if there are books with the same book_ID and mmember_ID
        $SQL0="SELECT * FROM member_cart where book_ID='$book_ID' and member_ID='$member_ID'"; 
        //Query els SQL is not empty we need to add to qty_boo +1 this will bee defined in the if else because we can use de SQL1 to obtain the qty_book
        

        //Query to rest 1 book -->USE IT TO DO A ORDER
        //$SQL1="SELECT books_sell from books book_ID='$book_ID'";
        
        
    //##########################EXECUTE QUERYS####################
        if(mysqli_num_rows(mysqli_query($conn,$SQL0))>0){
            if (!($getTotalBooksID=mysqli_fetch_row(mysqli_query($conn,$SQL0)))) {
                printf("Error ".mysqli_error($conn));
            }else{
                $getBooksInCar=$getTotalBooksID[3]-1;
                if($getBooksInCar==0){
                    $SQL1="DELETE from member_cart WHERE book_ID='$book_ID' and member_ID='$member_ID'";
                    if (!mysqli_query($conn,$SQL1)) {//Call insert query
                        printf("Error ".mysqli_error($conn));
                    }
                }else{
                    $SQL2="UPDATE member_cart set qty_book='$getBooksInCar' where book_ID='$book_ID' and member_ID='$member_ID'";
                    if (!mysqli_query($conn,$SQL2)) {//Call insert query
                        printf("Error ".mysqli_error($conn));
                    }
                } 
            }   
        }
        mysqli_close($conn);
        echo '<script type="text/javascript">','showCart();','</script>';
    }
?>