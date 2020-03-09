<h1><?php echo("Welcome ".$user_name.", ".$user_type) ?></h1>

<div>
    <?php  include("form_book_select.php");
           include("DataBase/db_toCart_cookie.php");
           include("DataBase/db_toCart_session.php");
    ?>
</div>