<?php
include("../database/connectdb.php");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Accept, Origin, X-Requested-With");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");

session_start();

// Check if the request is a POST request
if (isset($_POST['name'])) {
    // Get the uploaded file


    // Get the other product details from the request
    $product_name = $_POST['name'];
    $quantity= $_POST['quantity'];
   
// Use this incase file path is wrong
    // $img_path = "images/";
    // if (!file_exists($img_path)) {
    //     mkdir($img_path, 0777, true);
    // }

//    $img_path = "images/";
//     if (!file_exists($img_path)) {
//         mkdir($img_path, 0777, true);
//     }

  
//     $file = $img_path.basename($product_img['name']);

    // Insert the product details into the database
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    if($quantity>1){
        $sql = "UPDATE cart SET quantity = quantity - 1 WHERE product_name = '$product_name'";
        $response= mysqli_query($conn, $sql);
        if ($response) {
    
          
            echo json_encode(['message' => 'decreased item quantity']);
            exit;
        } else {
            echo json_encode(['message' => 'Action Failed']);
            exit;
        }
    } 
    }
   

?>