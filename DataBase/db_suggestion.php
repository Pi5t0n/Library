<?php
        $author=htmlspecialchars($_GET['q']);
        //echo($author);
    //##########################CONNECT TO DB#####################
        include("bd_connect.php");
    //##########################CONSULT##########################
        $SQL="SELECT author FROM BOOKS WHERE author like ('$author%');";
    //##########################EXECUTE QUERY#####################
        $resul=mysqli_query($conn,$SQL);
        $books=mysqli_fetch_all($resul, MYSQLI_ASSOC);
        $books_u=array_unique($books);
        mysqli_close($conn); 
        //print_r($books_u);
        echo json_encode($books_u);
    
?>