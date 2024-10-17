<?php
include("../database/connectdb.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Accept, Origin, X-Requested-With");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");


// if(isset($_GET['message'])){
//     $message= $_GET['message'];
//     echo json_decode($message);
// }

$data = json_decode(file_get_contents('php://input'), true);

if($data){
    $email = $data['email'];
    $password = $data['password'];
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
      }

$sql = "SELECT * FROM users WHERE email = '$email'";
$response= mysqli_query($conn, $sql);
$result= mysqli_fetch_assoc($response);
if($result){
    if($result['password'] !== $password){
        echo json_encode([ 'message'=> 'Incorrect details']);
        return;
    }
    if($result['role'] !== "admin"){
        echo json_encode([
            'message' => 'You are not authorized for this action'

        ]);
     
        exit();
    }
    session_start();
    $token= bin2hex(random_bytes(16));
    $token_expires= time()+3600;
    $_SESSION['role']= $result['role'];
    $_SESSION['token']=$token;
    $_SESSION['email']= $result['email'];
    $_SESSION['token_exp']= $token_expires;
    echo json_encode(['message' => 'adminLogin successful']);
    // header('Location: createProduct.php');
}
else{
    echo json_encode(['message' => 'User could not be found']);
 
}

}

?>
