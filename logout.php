<?php
session_start();
if(isset($_SESSION['loggedin'])){
    $loggedin=true;
}else{
    $loggedin=false;
}
if($loggedin){
    session_unset();
    session_destroy();
    
    header("location: login.php");
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logged Out!</title>
</head>
<body>
    <?php
    require 'navbar.php'?>
    <?php
    if(!$loggedin){
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Hurrray!</strong> You Are Already Logged Out!!Please  <a href="login.php">Login</a>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div> ';
    }
    ?>
    
</body>
</html>