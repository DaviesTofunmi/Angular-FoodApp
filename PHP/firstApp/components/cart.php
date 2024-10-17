<?php
include("../database/connectdb.php");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Accept, Origin, X-Requested-With");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");




if (isset($_POST['User'])) {
$User = $_POST['User'];
$sql= "SELECT * FROM cart WHERE user_id= '$User'";
$res = mysqli_query($conn, $sql);
if ($res) {
    $rez = mysqli_fetch_all($res, MYSQLI_ASSOC);
    header('Content-Type: application/json');
    
    echo json_encode($rez);
} else {
    echo json_encode(["error" => "Error fetching data"]);
}
}


// $sql = "SELECT * FROM cart";
// $res = mysqli_query($conn, $sql);
// if ($res) {
//     $rez = mysqli_fetch_all($res, MYSQLI_ASSOC);
//     header('Content-Type: application/json');
    
//     echo json_encode($rez);
// } else {
//     echo json_encode(["error" => "Error fetching data"]);
// }

// if (isset($_POST['User'])) {
// $User = $_POST['User'];
// $sql= "SELECT * FROM cart WHERE user_id= '$User'";
// $response = mysqli_query($conn, $sql);
// $result = mysqli_fetch_assoc($response);
// if($result){
//     echo json_encode($result);
// }

// }




// if (isset($_POST['User'])) {
//     // Get the uploaded file
//     $User = $_POST['User'];
//     $sql = "SELECT cart FROM users WHERE email = '$User'";
//     $response = mysqli_query($conn, $sql);
//     $result = mysqli_fetch_assoc($response);
    
//     if($result){
//         $cart = json_decode($result['cart'], true); // decode the cart JSON string
//         $product_names = "'" . implode("','", $cart) . "'"; // convert the product names to a comma-separated string
        
//         $sql = "SELECT * FROM products WHERE product_name IN ($product_names)";
//         $product_res = mysqli_query($conn, $sql);
//         $product_rez = mysqli_fetch_all($product_res, MYSQLI_ASSOC); // fetch all products as an array
//         echo json_encode($product_rez);
//     }
//     else{
//         echo json_encode('failed to load user');
//     }
// } 
?>