<?php
    if(isset($_POST['book_insert'])){
        //For image
        $target_dir = "../img/books/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $file_name=$_FILES["fileToUpload"]["name"];
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                //echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                //echo "File is not an image.";
                $uploadOk = 0;
            }
        }
        
        // Check if file already exists
        if (file_exists($target_file)) {
            //echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
            //echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            //echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        
        //Get all values from form
        $title  =   $_POST['title'];
        $isbn   =   $_POST['isbn'];
        $author =   $_POST['author'];
        $editorial  =   $_POST['editorial'];
        $category   =   $_POST['category'];
        $language   =   $_POST['language'];
        $created    =   $_POST['created'];
        $location   =   $_POST['location'];
        
        if($_POST['created']==""){   //If date is null, then put the day of today.
            $created=date("Y-m-d");
        }else $created=$_POST['created'];    //If is not null, then put the date added in the form
        
    //##########################CONNECT TO DB#####################
        include("bd_connect.php");
    //##########################CONSULT##########################
        $SQL0="SELECT * FROM LOCATION WHERE LOCATION_ID='$location'";   //To know if the location is full
        $SQL="INSERT INTO Books (title,isbn,author,editorial,category,lenguage,created_At,borrowed,location_ID,image_name) values ('$title','$isbn','$author','$editorial','$category','$language','$created',FALSE,$location,'$file_name');";  //Query to insert Book

    //##########################EXECUTE QUERY#####################
        $full=mysqli_fetch_row(mysqli_query($conn,$SQL0)); //Save row to know if the location is full
        
        if($full[4]==0){//Check if the location is full.
            if (!mysqli_query($conn,$SQL)) {//Call insert query
                printf("Error ".mysqli_error($conn));
            }else{
                echo("Added book with values ".$title.", ".$isbn.", ".$author.", ".$editorial.", ".$category.", ".$language.",".$created.", ".$location);
                mysqli_close($conn);
            }
        }else echo("Location full!");
    }
?>