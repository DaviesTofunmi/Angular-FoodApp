<?php

include("../database/connectdb.php");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Accept, Origin, X-Requested-With");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");

 $data = json_decode(file_get_contents('php://input'), true);

// function sanitize_input($data){
//     $data= trim($data);
//     $data= stripslashes($data);
//     $data= htmlspecialchars($data);
//     return $data;
// }




if($data){
    $first_name = $data['first_name'];
    $last_name =$data['last_name'];
    $email = $data['email'];
    $password = $data['password'];

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }
     
      $hashpassword= password_hash($password, PASSWORD_DEFAULT);
    
      $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES ('$first_name', '$last_name', '$email', '$hashpassword')";
      if (mysqli_query($conn, $sql)) {
       echo json_encode(['message' => 'Success']);
     
      } else {
    
      }
    
      mysqli_close($conn);
}



?>