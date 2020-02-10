<?php include("Forms/header.php")?>
 
<?php include("Forms/form_login.php")?>

<?php include("DataBase/db_logout.php"); ?>

<?php include("DataBase/db_user_register.php"); ?>

<?php if(isset($_POST['user_login'])){
        include("DataBase/db_login.php");
        }
    ?>

<div class="user_type">
    <?php  
        switch($user_type){
           case 'librarian':include("Forms/form_librarian.php"); break;
           case 'member': include("Forms/form_member.php"); break;
           case 'guest': include("Forms/form_guest.php"); break;
           default: break;
        }
    ?>
</div>
<?php if(isset($_POST['book_select'])){include("DataBase/db_book_select.php");}?>
<?php if(isset($_POST['user_register'])){ include("Forms/form_user_register.php");}?>
<!--<section id="cartSection">section cartSection</section>
<section id="cartSection2">section cartSection2</section>-->
<section id="cartSection"></section>



<?php include("Forms/footer.php")?>
