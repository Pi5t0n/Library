<?php include("DataBase/db_member_librarian_root.php") ?>
<?php  ?>
<?php include("DataBase/db_returnbook.php"); ?>


<?php  $_SESSION['penalty']  = false; //Librarian dont have penalty?>
   
    <script>
        updateUserCart();
    </script>
    <div class="welcome">
        <h1><?php echo("Welcome ".$user_name." ".$user_type) ?></h1>
        <?php include("form_logout.php")?>
        <div><!--hidden?-->
           <form  method="post" action=""><input type="submit" class="btn btn-outline-secondary" name="add_insert_butt" value="Insert Book"></form>
        </div>
        <?php include("form_shopping_cart.php")?>
    </div>
    <div>
        <?php //if(isset($_POST['perform_select'])){include("form_book_select.php"); include("db_reservations.php");}?>
        <?php include("form_book_select.php"); 
            include("DataBase/db_reservations.php"); 
            include("DataBase/db_add_book_cart.php"); 
            include("DataBase/db_rest_book_cart.php"); 
            include("DataBase/db_delete_row_cart.php");
            include("DataBase/db_book_delete.php");
            include("DataBase/db_guest_to_user_cart.php");?>
    </div>
    <div>
       <br/><br/><br/>
        <?php if(isset($_POST['add_insert_butt'])){ include("form_book_insert.php");}?>
    </div>
    <div>
        <?php include("DataBase/db_book_update.php"); ?>
    </div>
