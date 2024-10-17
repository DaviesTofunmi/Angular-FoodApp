<?php
include("../database/connectdb.php");

if(isset($_GET['message'])){
    $mess= $_GET['message'];
    echo $mess;
}

if(isset($_POST['login'])){

$email= $_POST['email'];
$password= $_POST['password'];

$sql = "SELECT * FROM users WHERE email = '$email'";
    $response= mysqli_query($conn, $sql);
    $result= mysqli_fetch_assoc($response);

    echo "Hashed password from database: " . $result['password'] . "<br>";
    echo "Password you are trying to verify: " . $password . "<br>";
   
    if($result){
      
        if(password_verify($password, $result['password'])){
            print_r($result);
            session_start();
            $token= bin2hex(random_bytes(16));
            $token_expires= time()+60;
            $_SESSION['token']=$token;
            $_SESSION['email']= $email;
            $_SESSION['firstName']= $result['first_name'];
            $_SESSION['lastName']= $result['last_name'];

            $_SESSION['token_exp']= $token_expires;
            header("location: profile.php");
         
        }
        else {
            echo "Incorrect password";
        }
     

    }
    else{
        echo "Account does not exist";
    }

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
    <h1>LOGIN</h1>
    <form action="login.php" method= "POST">
    <input name="email" type="text" placeholder="email"> <br> <br>
    <input name="password" type="text" placeholder="password"> <br> <br>
    <button name= 'login' >Login</button>
    </form>
   
    
</body>
</html>
