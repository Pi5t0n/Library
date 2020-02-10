<!DOCTYPE html>
<html>
    <body>
        <form method="get" action="">
          <label for="id">Book to update:</label>
          <input type="number" name="id"><br>
          <input type="submit" name="book_select_id" value="book_select_id" >
        </form>
        <br/><br/><br/>
        <?php
               include("db_book_update.php");
        ?>
    </body>
</html>