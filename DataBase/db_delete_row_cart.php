<?php

    if(isset($_POST["row_delete_cart"])){
        //POST all values from form
        $book_ID=$_POST['row_delete_cart'];
            //$member_ID=$_POST['member_ID'];
        $member_ID=$_SESSION['user_id'];
        
    //##########################CONNECT TO DB#####################
        include("bd_connect.php");
        
     //##########################QUERY#############################
        //Query to determine if there are books with the same book_ID and mmember_ID
        $SQL0="DELETE FROM member_cart WHERE book_ID='$book_ID' and member_ID='$member_ID'";

        
    //##########################EXECUTE QUERYS####################
        if (!(mysqli_query($conn,$SQL0))) {
            printf("Error ".mysqli_error($conn));
        }else  mysqli_close($conn); 
        
         echo '<script type="text/javascript">','showCart();','</script>';
        
    }
?>