<!DOCTYPE html>
<html>
    <body>
        <form method="post" action="">
         
          <label for="book_ID">Book ID to return:</label>
          <input type="number" name="book_ID" required><br>
          
          <label for="member_ID">Member ID that return:</label>
          <input type="number" name="member_ID" required><br>  
                        
          <input type="submit" name="book_return" value="book_return">
        </form>
        <?php
            include("DataBase/db_returnbook.php");
        ?>
    </body>
</html>