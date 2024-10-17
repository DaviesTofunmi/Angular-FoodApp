<?php
include("../database/connectdb.php");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Accept, Origin, X-Requested-With");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");

session_start();

// Check if the request is a POST request
if (isset($_POST['product_id']) ) {
    // Get the uploaded file


    // Get the other product details from the request
    $product_id = $_POST['product_id'];
  
  

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "DELETE FROM cart WHERE product_id = '$product_id'";
    $response= mysqli_query($conn, $sql);
   
    if ($response) {
        echo json_encode([
            'message' => 'Item Deleted',
           
          ]);
        
      

        
        }
        else {
            echo json_encode(['message' => 'Delete action failed']);

        }
     
}
    ?>