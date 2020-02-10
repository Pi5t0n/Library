<!DOCTYPE html>
<html>
    <body>
        <form  method="post" action="" >
          <label for="id_book">Id book to update:</label>
          <input type="number" name="id_book" value="<?php echo $id_book;?>" readonly><br>     
         
          <label for="title">Title book to update:</label>
          <input type="text" name="title" value="<?php echo $title;?>"><br>
          
          <label for="isbn">isbn book to update:</label>
          <input type="text" name="isbn" value="<?php echo $isbn;?>"><br>
          
          <label for="author">Author book to update:</label>
          <input type="text" name="author" value="<?php echo $author;?>"><br>
          
          <label for="editorial">Editorial book to update:</label>
          <input type="text" name="editorial" value="<?php echo $editorial;?>"><br>
          
          <label for="category">Category book to update:</label>
          <input type="text" name="category" value="<?php echo $category;?>"><br>
          
          <label for="language">Language book to update:</label>
          <input type="text" name="language" value="<?php echo $lenguage;?>"><br>
          
          <label for="created">Data created book to update:</label>
          <input type="date" name="created" value="<?php echo $created;?>"><br>
          
          
          <label for="location">ID location book to update:</label>
          <input type="number" name="location" min="1" max="240" value="<?php echo $location;?>"><br>
          
          <input type="submit" name="book_update" value="book_update">
          
        </form>
    </body>
</html>