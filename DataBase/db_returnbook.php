<?php

    //if(isset($_POST["book_ID_return"])){
    if(isset($_POST["book_return"])){
        //echo($_POST["book_return"]);
        //POST all values from form
        //$book_ID=$_POST['book_ID'];
        $book_ID=$_POST["book_return"];
        //$book_ID=$_POST['book_ID_return'];
        //$member_ID=$_POST['member_ID'];
        $reservation_final_real_date=date("Y-m-d");
        
    //##########################CONNECT TO DB#####################
        include("bd_connect.php");
        
    //##########################QUERY#############################
        //Select member ID
        $SQL0="SELECT member_ID from reservations where book_ID='$book_ID'";
        //First I get the member ID that borrowed the book with $book_ID
        if (!$member_ID=mysqli_fetch_assoc(mysqli_query($conn,$SQL0))) {//Call Update query 
            printf("Error ".mysqli_error($conn)." Error to obtain the member ID");
        }
        
        $member_ID=$member_ID['member_ID'];
        
        echo $member_ID;
        
        
        
        //book_ID is unique to avoid borrow the same book two times
        $SQL="UPDATE Reservations SET realFinalDate='$reservation_final_real_date' WHERE book_ID='$book_ID' AND member_ID='$member_ID';"; //Query to insert the return date
        $SQL1="UPDATE books set borrowed=0 where book_ID='$book_ID'";
        //Querys to obtain values from reservations and save it in the Reservations logs
        $SQL2="SELECT initialDate, finalDate FROM Reservations WHERE book_ID='$book_ID' AND member_ID='$member_ID'";
        
        //Querys to delete Reservation, after save it in Reservations_log
        $SQL4="DELETE FROM Reservations WHERE book_ID='$book_ID' AND member_ID='$member_ID'";
        
        
    //##########################EXECUTE QUERYS####################
        
        //Set reali final date that the user has returned the book.
        if (!mysqli_query($conn,$SQL)) {//Call Update query 
            printf("Error ".mysqli_error($conn));
        }else{
            if (!mysqli_query($conn,$SQL1)) {//Call Update query for books
            printf("Error ".mysqli_error($conn));
            }//else echo("Reservation finished".$member_ID);
        }
        //CODIGO PARA AÑADIR VERIFICAR SI EL MEMBER_ID DEBE TENER O NO UNA PENALIZACIONS
        
        
        //Get values to save them in the Reservetions_Log
        if (!$dates=mysqli_fetch_row(mysqli_query($conn,$SQL2))) {//Call select query 
            printf("Error ".mysqli_error($conn));
        }else{
            $initialDate=$dates[0];
            $finalDate=$dates[1];
            
            $penaltyDay=getDiffDays($finalDate, $reservation_final_real_date)*2;
            
           // echo("User penalty ".$penaltyDay);
            
            setPenalty($member_ID, $reservation_final_real_date, $penaltyDay);      
           
            //After obtain values insert into Reservations_log
            $SQL3="INSERT INTO Reservations_log (book_ID,member_ID,initialDate,finalDate,realFinalDate) values ('$book_ID','$member_ID','$initialDate','$finalDate','$reservation_final_real_date');";
            if (!mysqli_query($conn,$SQL3)) {
                printf("Error ".mysqli_error($conn));
            }else{
                if (!mysqli_query($conn,$SQL4)) {
                    printf("Error ".mysqli_error($conn));
                }//else  echo("Added in the Reservetions logs and deleted from Reservetions");
            } 
            
        }
        
    }
    //Function to get DaysDiff
    function getDiffDays($finalDate, $reservation_final_real_date){
        if (new DateTime($reservation_final_real_date) > new DateTime($finalDate)) {
            //echo 'Penalty for user';
            $datediff = date_diff(new DateTime($reservation_final_real_date),new DateTime($finalDate));
            return $datediff->format("%a");
        }else{
            //echo 'No penalty';
            return 0;
        }
    }
    //Function to calculate the penalty to user
    function setPenalty($member_ID, $reservation_final_real_date, $penaltyDay){
        //##########################CONNECT TO DB#####################
        include("bd_connect.php");
        //Calculate nextAviableDate
        $nextAviableDate=date("Y-m-d",strtotime($reservation_final_real_date."+".$penaltyDay."days"));

        //Query to apply penalty to user
        $SQL5="UPDATE users SET nextAviableDate='$nextAviableDate' WHERE member_ID='$member_ID';";
        
        if (!mysqli_query($conn,$SQL5)) {//
            printf("Error ".mysqli_error($conn));
        }else{
            //echo("UserPenalty added!");
        }
        
    }

?>


