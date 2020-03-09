<?php include("DataBase/db_member_librarian_root.php") ?>
<?php 
    $penalty=false;
    if($nextAviableDate!=NULL){
        $penalty=true;
    }
    $_SESSION['penalty']  = $penalty;
?> 
<script>
    updateUserCart();
</script>
    
<div class="welcome">
    <h1><?php echo("Welcome ".$user_name) ?></h1>
    <?php include("form_logout.php")?>
    <?php include("form_shopping_cart.php")?>
</div>
<h2>
    <?php 
        if($penalty){
           echo("You have a penalty. Next aviable date ".$nextAviableDate);
        }
    ?>
</h2>
<div>
    <?php  include("form_book_select.php"); 
    include("DataBase/db_reservations.php");
    include("DataBase/db_add_book_cart.php");
    include("DataBase/db_rest_book_cart.php");
    include("DataBase/db_delete_row_cart.php");
    include("DataBase/db_guest_to_user_cart.php");?>
</div>





