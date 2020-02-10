<!DOCTYPE html>
<html>
    <body>
        <!--<form method="get" action="">
          <label for="author">Buscar libro:</label>
          <input type="text" name="author"><br>
          <input type="submit" name="book_select" value="book_select">
        </form>-->
        <div>
            <?php //include("db_book_select.php") ?>
        </div>
        <form method="post" action="">
          <label for="book_id">Book to delete:</label>
          <input type="number" name="book_id"><br>
          <input type="submit" name="book_delete" value="book_delete">
        </form>
        <div>
            <?php include("DataBase/db_book_delete.php")?>
        </div>
    </body>
</html>