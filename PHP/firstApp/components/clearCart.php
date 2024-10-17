<?php

include("../database/connectdb.php");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Accept, Origin, X-Requested-With");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");

$data = json_decode(file_get_contents('php://input'), true);

if ($data) {
    $User = $data['User'];
$Amount = $data['Amount'];

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

   
        $sql= "DELETE FROM cart WHERE user_id= '$User'";
        $response= mysqli_query($conn, $sql);
        if($response){

        echo json_encode(['message' => 'Cart Cleared']);
        exit;
    }
        else {
            echo json_encode(['message' => 'Failed']);
            exit;
        }

   

}




?>