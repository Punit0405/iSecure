<?php
session_start();
if(isset($_SESSION['loggedin'])){
    $loggedin=true;
}else{
    $loggedin=false;
}

if($loggedin){
    require "welcome.php";
}
if(!$loggedin){
    require "login.php";
}
?>