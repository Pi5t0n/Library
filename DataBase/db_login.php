<?php //include("test.php")?>
<?php
    if(isset($_POST['user_login'])){
    //#########################Variables to save values###########
        $nickname=htmlspecialchars($_POST['nickname']);
        $pass=htmlspecialchars(sha1($_POST['pass']));
        
    //##########################CONNECT TO DB#####################
        include("bd_connect.php");
        
    //##########################CONSULT##########################
        
        $SQL2="SELECT member_ID,u_name,U_TYPE FROM users WHERE nickname='$nickname' AND pass='$pass'"; //Quert to obtain all values needed.
        

    //##########################EXECUTE QUERY#####################
        
        //Fetch row in var to obtain the good pass.
        //I save the value of the good pass in DB.
        //ELSE --> I check if the pass add by user is the same in DB
        
        if(!($user_values=mysqli_fetch_assoc(mysqli_query($conn,$SQL2)))) {
                printf("Error ".mysqli_error($conn). "or your user is not correct");
        }else{
                
                //Save values needed
                $user_id=$user_values['member_ID'];
                $user_name=$user_values['u_name'];
                $user_type=$user_values['U_TYPE'];
                
                //Start a session for user
                //session_start();
                $_SESSION['user_id']  = $user_id;
                $_SESSION['user_name']  = $user_name;
                $_SESSION['user_type']  = $user_type;
                mysqli_close($conn);
      
                //I chech the type o user (librarian, root or member)
                /*if($user_type=='librarian'){
                     header('Location:form_librarian.php');//Open the php file for librarian
                }elseif($user_type=='root'){
                }elseif($user_type=='member'){
                    header("Location:form_member.php");//Open the php file for member        
                }*/
                
            }/*else{
                header("Location:form_login.php");
                mysqli_close($conn);
            }*/    
        }  
?>
<?php //include("footer.php") ?>
