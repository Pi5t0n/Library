<?php
    if(isset($_POST['user_add'])){
        //POST values from the form
        $name=$_POST['u_name'];
        $surname1=$_POST['u_surname1'];
        $surname2=$_POST['u_surname2'];
        $nickname=$_POST['nickname'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        $email=$_POST['u_email'];
        $pass=$_POST['pass'];
        $pass2=$_POST['pass2'];
              
    //##########################CONNECT TO DB#####################
        include("bd_connect.php");
    //##########################CONSULT##########################
        $SQL="INSERT INTO users (u_name,u_surname1,u_surname2,nickname,phone,address,u_email,pass,u_type) values ('$name','$surname1','$surname2','$nickname','$phone','$address','$email',SHA('$pass'),'member');";

    //##########################EXECUTE QUERY#####################
        if(!mysqli_query($conn,$SQL)){
            printf("Error ".mysqli_error($conn). "Error to add user");
        }else{
            mysqli_close($conn);
        }  
    }
?>


