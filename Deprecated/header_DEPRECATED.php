<?php    
    session_start();
    $user_id=$_SESSION['user_id'] ?? '0';
    $user_name=$_SESSION['user_name'] ?? 'guest';
    $user_type=$_SESSION['user_type'] ?? 'guest';
    echo("Hello ".$user_name.", ".$user_type);
?>    
<!DOCTYPE html>
<html>
    <head>
      <link rel="stylesheet" type="text/css" href="css/css_body.css">
    </head>
    <header>
        <h1>Biblioteca</h1>
    </header> 
    <body>
    </body>
</html>