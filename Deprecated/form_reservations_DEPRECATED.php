<!DOCTYPE html>
<html>
    <body>
        <form method="get" action="">
         
          <label for="book_ID">Book ID:</label>
          <input type="number" name="book_ID" required><br>
          
          <label for="member_ID">Member ID:</label>
          <input type="number" name="member_ID" required><br>  
                        
          <input type="submit" name="book_rent" value="book_rent">
        </form>
        <?php
            include("db_reservations.php");
        ?>
    </body>
</html>
