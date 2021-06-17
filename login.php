<?php
$showAlert=false;
$showError=false;
$login=false;

require "dbconnection.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST')
 {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $verify = "SELECT * FROM `users` WHERE username = '$username'";
    $result = mysqli_query($conn, $verify);
    $numExistRows = mysqli_num_rows($result);
    if ($numExistRows==1)
    {
        while($row=mysqli_fetch_assoc($result))
        {$dbpassword=$row['password'];}
        if(password_verify($password,$dbpassword))
        {
            $login=true;
            session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            header("location: welcome.php");

        }else{
            $showError="Invalid Credentials";
        }
        
    }else{
        $showError="Invalid Credentials";
    } 
    
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login-iSecure</title>
</head>
<body>
    <?php
    
    require "navbar.php"?>
    <?php
     if($showError){
        echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> '. $showError.'
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                
            </button>
        </div> ';
        }
    ?>
    <div class="container my-4">
        <form action="/iSecure/login.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" maxlength="11" class="form-control" id="username" name="username" aria-describedby="emailHelp">

            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

    
</body>
</html>