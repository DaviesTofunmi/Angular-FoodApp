<?php
include("../database/connectdb.php");
header('Access-Control-Allow-Origin: *');

$sql = "SELECT * FROM products";
$res = mysqli_query($conn, $sql);
if ($res) {
    $rez = mysqli_fetch_all($res, MYSQLI_ASSOC);
    header('Content-Type: application/json');
    
    echo json_encode($rez);
} else {
    echo json_encode(["error" => "Error fetching data"]);
}
?>