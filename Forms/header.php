<?php    
    session_start();
    $user_id=$_SESSION['user_id'] ?? '0';
    $user_name=$_SESSION['user_name'] ?? 'guest';
    $user_type=$_SESSION['user_type'] ?? 'guest';
?>    
<!DOCTYPE html>
<html lang="en">
    <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <!--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>-->
      <!--<link rel="stylesheet" type="text/css" href="css/bootstrap-grid.css">
      <link rel="stylesheet" type="text/css" href="css/bootstrap.css">-->
      <link rel="stylesheet" type="text/css" href="../css/css_body.css">
      <link rel="stylesheet" type="text/css" href="../css/css_index.css">
     <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">-->
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <script type="text/javascript" src="../ajax/updateCart.js"></script>
        
  

      <title>Library</title>
      
    </head>
    <header>
        <div class="header_class">
            <h1>Library Miquel Riera</h1>
        </div>
    </header> 
    <body>
    <div class="allContent">
    
    
   