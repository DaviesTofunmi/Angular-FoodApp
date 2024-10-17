<?php

include("../database/connectdb.php");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Accept, Origin, X-Requested-With");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");



if (isset($_GET['session'])) {
  $sess = $_GET['session'];
  echo  json_encode([$sess]);
}


// function sanitize_input($data){
//     $data= trim($data);
//     $data= stripslashes($data);
//     $data= htmlspecialchars($data);
//     return $data;
// }
$data = json_decode(file_get_contents('php://input'), true);


$userToken = null;
$userEmail = null;

if ($data) {
  $email = $data['email'];
  $password = $data['password'];

  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }



  $sql = "SELECT * FROM users WHERE email = '$email'";
  $response = mysqli_query($conn, $sql);
  $result = mysqli_fetch_assoc($response);
  if ($response) {
    if (password_verify($password, $result['password'])) {


      session_start(); 
      $token = bin2hex(random_bytes(16));
      $token_expires = time() + 3600;
      $_SESSION['token'] = $token;
      $_SESSION['email'] = $result['email'];
      $_SESSION['token_exp'] = $token_expires;
      $userToken = $_SESSION['token'];







      $sql = "UPDATE users SET token= '$userToken' WHERE email='$email'";
      if (mysqli_query($conn, $sql)) {
        echo json_encode([
          'message' => 'Login Successful',
          'token' => $_SESSION['token'],
          'email' => $_SESSION['email']
        ]);
      } else {
        echo json_encode(['message' => 'Failed']);
        exit;
      }

      // header("location: newProfile.php");
    

      // header('Location: newProfile.php?email=' . $email);


    } else {
      echo json_encode(['message' => 'password invalid']);
    }
  } else {

    echo json_encode(['message' => 'Login Failed']);
  }
}
