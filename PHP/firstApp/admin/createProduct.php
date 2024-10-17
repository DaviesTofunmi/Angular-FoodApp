<?php
include("../database/connectdb.php");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Accept, Origin, X-Requested-With");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");

session_start();

// Check if the request is a POST request
if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['category'])) {
    // Get the uploaded file
    $product_img = $_FILES['image'];

    // Get the other product details from the request
    $product_name = $_POST['name'];
    $product_price = $_POST['price'];
    $product_category = $_POST['category'];
    $product_desc = $_POST['desc'];
   
// Use this incase file path is wrong
    // $img_path = "images/";
    // if (!file_exists($img_path)) {   
    //     mkdir($img_path, 0777, true);
    // }

   $img_path = "images/";
    if (!file_exists($img_path)) {
        mkdir($img_path, 0777, true);
    }

  
    $file = $img_path.basename($product_img['name']);

    // Insert the product details into the database
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "INSERT INTO products (product_name, product_price, product_category, product_img, product_desc) VALUES ('$product_name', '$product_price', '$product_category', '$file', '$product_desc')";
    if (mysqli_query($conn, $sql)) {
        move_uploaded_file($product_img['tmp_name'], $file);
        echo json_encode(['message' => 'File Upload Success']);
        exit;
    } else {
        echo json_encode(['message' => 'Failed']);
        exit;
    }
} 


if (time() > $_SESSION['token_exp']) {
    error_log("Session expired or not set");
    session_destroy();
    echo json_encode(['message'=> 'Your token has expired']);
    // header("Location: adminLogin.php?messsage=Your token has expired. Please login again");
    exit;
}
if(!$_SESSION['role'] || $_SESSION['role'] !== "admin"){
    echo json_encode(['message'=> 'No admin found']);
    // header("Location: adminLogin.php?message= No admin found");
    exit();
}



if(isset($_GET['logout'])){
session_unset();
session_destroy();
header('Location: adminLogin.php');
}
?>
