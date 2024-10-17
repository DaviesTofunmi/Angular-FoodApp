<?php
include("../database/connectdb.php");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Accept, Origin, X-Requested-With");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");

session_start();

// Check if the request is a POST request
if (isset($_POST['name'])) {
 
    $product_name = $_POST['name'];
    $quantity= $_POST['quantity'];
 

    // Insert the product details into the database
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "UPDATE cart SET quantity = quantity + 1 WHERE product_name = '$product_name'";
    $response= mysqli_query($conn, $sql);
    if ($response) {

      
        echo json_encode(['message' => 'Increased item quantity']);
        exit;
    } else {
        echo json_encode(['message' => 'Failed']);
        exit;
    }
} 

?>