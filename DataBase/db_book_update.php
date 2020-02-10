<?php
    //##########################DEFINE SUBMINT CONDITIONALS######################
    //if(isset($_POST['book_select_id'])){
    if(isset($_POST['book_ID_update'])){
        //$id=$_POST['id'];
        $id=$_POST['book_ID_update'];
        //echo($author);
        
    //##########################CONNECT TO DB#####################
    include("bd_connect.php");
    //##########################CONSULT##########################
        $SQL0="SELECT * FROM BOOKS WHERE book_id=$id;";
    //##########################EXECUTE QUERY#####################
        if(!($book=mysqli_fetch_row(mysqli_query($conn,$SQL0)))){ //Save row to know if the location is full
            printf("Error ".mysqli_error($conn));
        }else{
            $id_book=$book[0];
            $title=$book[1];
            $isbn=$book[2];
            $author=$book[3];
            $editorial=$book[4];
            $category=$book[5];
            $lenguage=$book[6];
            $created=$book[7];
            $borrowed=$book[8];
            $location=$book[9];
            mysqli_close($conn);
        }
        //After, I show the form to modify the book with all values of book searched.
        include("Forms/form_book_update_all.php"); 
        
    }

    if(isset($_POST['book_update'])){
        //After librerian update values of the  form "form_book_update_all.php", 
        //I save them and send call update query
        //to update values
        $id_book=$_POST['id_book'];
        $title=$_POST['title'];
        $isbn=$_POST['isbn'];
        $author=$_POST['author'];
        $editorial=$_POST['editorial'];
        $category=$_POST['category'];
        $lenguage=$_POST['language'];
        $created=$_POST['created'];
        $location=$_POST['location'];
        
        //##########################CONNECT TO DB#####################
        include("bd_connect.php");
        
        //##########################CONSULT##########################
        $SQL1="UPDATE BOOKS SET TITLE='$title', ISBN ='$isbn',AUTHOR='$author',EDITORIAL='$editorial', CATEGORY='$category',LENGUAGE='$lenguage', CREATED_AT='$created', LOCATION_ID=$location WHERE BOOK_ID=$id_book;";
        
        //##########################EXECUTE QUERY#####################
        if(!mysqli_query($conn,$SQL1)){
            printf("Error ".mysqli_error($conn));
        }else  echo("Book with id: ".$id_book." updated!");

        mysqli_close($conn);
    }
?>
