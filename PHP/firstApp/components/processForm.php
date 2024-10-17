<?php
include("../database/connectdb.php");


$first_name= $_POST["first_name"];
$last_name= $_POST["last_name"];
$email= $_POST["email"];
$password= $_POST["password"];
$cpassword= $_POST["cpassword"];

if(isset($_POST['register'])){
  if(empty($_POST["first_name"])){
    die("first Name is required");
     echo "Please enter your firstname ";
  }
  if(empty($_POST["last_name"])){
    echo "Please enter your lastname ";
  }
  if(empty($_POST["email"])){
  die(
    'email is required'
  );
  }
  if(!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)){
    die("invalid email");
  }


  if(empty($_POST["password"])){
    die("password is required");
  }
  if(strlen($_POST['password']) < 8){
    die("password can not be less than 8 char");
  }
  if(($_POST['cpassword'])!=($_POST['password'])){
    die("passwords do not match");
  }
  if((!preg_match('/[a-z]/i', $_POST['password']))){
    die('password must contain Caps');
  }
  if((!preg_match('/[A-Z]/i', $_POST['password']))){
    die('password must contain Caps');
  }


  if((!preg_match('/[A-Z]/i', $_POST['password']))){
    die('password must contain Caps');
    
  }
  $hashpassword= password_hash($_POST['password'], PASSWORD_DEFAULT);
  
  echo " $hashpassword";
  

  $first_name= mysqli_escape_string($conn, $_POST['first_name']);
  $last_name= mysqli_escape_string($conn, $_POST['last_name']);
  $email= mysqli_escape_string($conn, $_POST['email']);


  $sql= "INSERT INTO users(first_name, last_name, email, password ) VALUE('$first_name', '$last_name', '$email', '$hashpassword')";
  if(mysqli_query($conn, $sql)){
    echo 'data saved';
    header("location: login.php");
    }else{
      if(mysqli_errno($conn)=== 1062){
        echo 'email already exist';
      }
      else{
        echo "Error". mysqli_error($conn). mysqli_errno($conn);
      }
  }
  mysqli_close($conn);
}



?>