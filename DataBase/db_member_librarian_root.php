<?php
    //session_start();
    //$user_id=$_SESSION['user_id'] ?? 'guest';
//##########################CONNECT TO DB#####################
    include("bd_connect.php");
//##########################CONSULT##########################
    $SQL="SELECT nextAviableDate FROM users WHERE member_ID='$user_id';";
//##########################EXECUTE QUERY#####################
    if (!($user_values=mysqli_fetch_row(mysqli_query($conn,$SQL)))) {
        printf("Error ".mysqli_error($conn));
    }else{
        //$user_name=$user_values[0];
        $nextAviableDate=getNextAviableDate($SQL);
        //$user_type=$user_values[2]; 
    } 
    mysqli_close($conn);

//FUNCTIONS

    function getNextAviableDate($SQL){
         $date_today=date("Y-m-d");//Get date of today
        //##########################CONNECT TO DB#####################
        include("bd_connect.php");
        //Get if values is bigger than today
        if(!($nextAviableDate=mysqli_fetch_row(mysqli_query($conn,$SQL)))){
            printf("Error ".mysqli_error($conn));
        }else{
            $nextAviableDate=$nextAviableDate[0];
            if (new DateTime($nextAviableDate) > new DateTime($date_today)) {
                return $nextAviableDate;
            }else{
                return NULL;
            }   
        } 
    }
?>


   

    

