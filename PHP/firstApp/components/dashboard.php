<?php
include("../database/connectdb.php");


session_start();

if(isset($_SESSION['email'])){
    $user_email= $_SESSION['email'];
    echo $user_email;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Welcome to your dashboard {{$user_email}}</h1>
    
</body>
</html>