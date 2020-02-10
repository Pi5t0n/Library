<?php
    if(isset($_POST['book_delete'])){
        $book_id=$_POST['book_delete'];  //Get ID passed to delete the book
        echo "HOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOOLA";
    //##########################CONNECT TO DB#####################
        include("bd_connect.php");
    //##########################CONSULT##########################
        $SQL="DELETE FROM BOOKS WHERE book_ID=$book_id;";   //Query to delete the book
    //##########################EXECUTE QUERY#####################
        mysqli_query($conn,$SQL);   //Execute the query
        mysqli_close($conn);    //Close connection
    }
?>