<?php

    if(isset($_POST["book_rent"])){
        //POST all values from form
        $book_ID=$_POST['book_rent'];
            //$member_ID=$_POST['member_ID'];
        $member_ID=$_SESSION['user_id'];
        //$member_ID=$_SESSION['member_ID'];
        $reservation_date=date("Y-m-d");
        $reservation_final=date("Y-m-d",strtotime(date("Y-m-d", strtotime($reservation_date)) . " +1 month"));
        
    //##########################CONNECT TO DB#####################
        include("bd_connect.php");
        
    //##########################QUERY#############################
        //book_ID is unique to avoid borrow the same book two times
        $SQL="INSERT INTO Reservations (book_ID,member_ID,initialDate,finalDate) values ('$book_ID','$member_ID','$reservation_date','$reservation_final');"; //Query to insert a reservations
        $SQL1="UPDATE books set borrowed=1 where book_ID='$book_ID'";
        
    //##########################EXECUTE QUERYS####################
        if (!mysqli_query($conn,$SQL)) {//Call insert query
            printf("Error ".mysqli_error($conn));
        }else{
            if (!mysqli_query($conn,$SQL1)) {//Call insert query
                printf("Error ".mysqli_error($conn));
            }
            mysqli_close($conn);
        }
    }

?>