<?php
    if(isset($_POST['book_select'])){
        $author=htmlspecialchars($_POST['author']);
        //echo($author);
    //##########################CONNECT TO DB#####################
        include("bd_connect.php");
    //##########################CONSULT##########################
        $SQL="SELECT * FROM BOOKS WHERE author like ('%$author%');";
    //##########################EXECUTE QUERY#####################
        $resul=mysqli_query($conn,$SQL);
        $books=mysqli_fetch_all($resul, MYSQLI_ASSOC);
        //echo $books;
        //$books_json=json_encode($books);
        //echo $books_json;
        mysqli_free_result($resul);
        mysqli_close($conn); 
    }
?>

<!DOCTYPE html>
<html>
    <!--<head>
      <link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
    </head>-->
	<div>
        <?php if(isset($_POST['book_select'])):?>
            <table class="table table-hover table-dark">
                <tr>
                  <th>Book Image</th>
                  <th>Book Information</th>
                   
                    <!--<th>Book ID</th>
                    <th>Title</th>
                    <th>ISBN</th>
                    <th>Author</th>
                    <th>Editorial</th>
                    <th>Category</th>
                    <th>Language</th>
                    <th>Inserted At</th>
                    <th>Borrowed</th>
                    <th>Location</th>-->
                </tr>
                <?php foreach($books as $book):?>
                      <tr>
                        <td><img src="../img/books/<?php echo $book['image_name']?>" alt="No image"></td>
                        <td>
                            <ul>
                                <li>Book ID: <?=$book['book_ID'];?> </li>
                                <li>Title: <?=$book['title'];?> </li>
                                <li>ISBN: <?=$book['isbn'];?></li>
                                <li>Author: <?=$book['author'];?> </li>
                                <li>Editorial: <?=$book['editorial'];?></li>
                                <li>Category: <?=$book['category'];?></li>
                                <li>Language: <?=$book['lenguage'];?></li>
                                <li>Inserted At: <?=$book['created_At'];?> </li>
                                <li>Borrowed: <?=$book['borrowed'];?></li>
                                <li>Location: <?=$book['location_ID'];?></li>
                                <li>Samples to sell: <?=$book['books_sell'];?></li>
                                <li>Price: <?=$book['unit_price'];?> €</li>
                            </ul>  
                        </td>
                        <!--<td><?=$book['book_ID'];?></td>
                        <td><?=$book['title'];?></td>
                        <td><?=$book['isbn'];?></td>
                        <td><?=$book['author'];?></td>
                        <td><?=$book['editorial'];?></td>
                        <td><?=$book['category'];?></td>
                        <td><?=$book['lenguage'];?></td>
                        <td><?=$book['created_At'];?></td>
                        <td><?=$book['borrowed'];?></td>
                        <td><?=$book['location_ID'];?></td>-->
                        <?php if(isset($_SESSION['penalty']) and $_SESSION['penalty']==false and $book['borrowed']=="0") :?>
                            <td>
                              <form method="post" action="">
                                  <button type="submit" name="book_rent" value="<?php echo $book['book_ID'] ?>">Rent IT!</button>
                              </form>
                            </td>
                        <?php endif;?>
                        <?php if(isset($_SESSION['user_type']) and $_SESSION['user_type']=="librarian"):?>
                            <td>
                              <form method="post" action="">
                                  <button type="submit" name="book_delete" value="<?php echo $book['book_ID'] ?>">Delete it!</button>
                              </form>
                            </td>
                        <?php endif;?>
                        <?php if(isset($_SESSION['user_type']) and $_SESSION['user_type']=="librarian"):?>
                            <td>
                              <form method="post" action="">
                                  <button type="submit" name="book_ID_update" value="<?php echo $book['book_ID'] ?>">Update it!</button>
                              </form>
                            </td>
                        <?php endif;?>
                        <?php if(isset($_SESSION['user_type']) and $_SESSION['user_type']=="librarian" and $book['borrowed']=="1"):?>
                            <td>
                              <form method="post" action="">
                                  <button type="submit" name="book_return" value="<?php echo $book['book_ID'] ?>">Return it!</button>
                              </form>
                            </td>
                        <?php endif;?>
                        <?php if(isset($_SESSION['user_type']) and ($_SESSION['user_type']=="librarian" or $_SESSION['user_type']=="member")  and $book['books_sell']>0):?>
                            <td>
                              <form method="post" action="">
                                  <button type="submit" name="book_to_cart" value="<?php echo $book['book_ID'] ?>">To Cart!</button>
                              </form>
                            </td> 
                        <?php endif;?>
                      </tr>
                <?php endforeach;?>  
            </table> 
        <?php  endif; ?>
	</div>
</html>
    
