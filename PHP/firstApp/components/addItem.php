<?php

include("../database/connectdb.php");

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Content-Type, Accept, Origin, X-Requested-With");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS, PUT, DELETE");







// Check if the request is a POST request
if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['category'])) {


    // Get the uploaded file
    $product_img = $_POST['image'];

    // Get the other product details from the request
    $product_name = $_POST['name'];
    $product_price = $_POST['price'];
    $product_category = $_POST['category'];
    $product_desc = $_POST['desc'];
    $quantity = $_POST['quantity'];
    $User = $_POST['User'];

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    $id = bin2hex(random_bytes(16));
    $product_id = bin2hex(random_bytes(16));



    $sql = "SELECT * FROM cart WHERE user_id = '$User' AND product_name = '$product_name'";
    $res = mysqli_query($conn, $sql);

    if (mysqli_num_rows($res) > 0) {
        echo json_encode(['message' => 'Item is already in your cart']);
        exit;
    } else {
        $sql = "INSERT INTO cart (id, user_id, product_id, product_name, product_price, product_category, product_img, product_desc, quantity) VALUES ('$id','$User', '$product_id','$product_name', '$product_price', '$product_category', '$product_img', '$product_desc', '$quantity')";
        if (mysqli_query($conn, $sql)) {

            echo json_encode(['message' => 'Added item to cart']);
            exit;
        } else {
            echo json_encode(['message' => 'Failed']);
            exit;
        }
    }






    // $sql = "SELECT product_name FROM products  WHERE product_name = '$product_name'";
    // $res = mysqli_query($conn, $sql);
    // $product_rez = mysqli_fetch_assoc($res);

    // if ($product_rez) {
    //     $item = $product_rez['product_name'];

    //     // Get the existing cart for the user
    //     $sql = "SELECT cart FROM users WHERE email = '$User'";
    //     $res = mysqli_query($conn, $sql);
    //     $user_rez = mysqli_fetch_assoc($res);
    //     $existing_cart = json_decode($user_rez['cart'], true);

    //     if (in_array($item, $existing_cart)) {
    //         echo json_encode(["error" => "Item is already in your cart"]);
    //     } else {
    //         // Add the new item to the existing cart
    //         $existing_cart[] = $item;
    //         $new_cart = json_encode($existing_cart);

    //         // Update the user's cart
    //         $sql = "UPDATE users SET cart = '$new_cart' WHERE email = '$User'";
    //         $res = mysqli_query($conn, $sql);

    //         if ($res) {
    //             echo json_encode($item);
    //         } else {
    //             echo json_encode(["error" => "Error updating cart"]);
    //         }
    //     }
    // } else {
    //     echo json_encode(["error" => "Error fetching data"]);
    // } 

}
