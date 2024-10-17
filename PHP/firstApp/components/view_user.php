<?php 
include("../database/connectdb.php");
// if(isset($_GET['id'])){
//     $id= $_GET['id'];
//     echo $id;
// }




if(isset($_GET["id"])){
    $id = $_GET["id"];
    $sql = "SELECT * FROM users WHERE email = '$id'";
    $response = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($response); 


    if ($response) {
        $first_namee= $user["first_name"];
        $last_namee= $user["last_name"];
        $email= $user["email"];
  
    } else {
        echo "Error: " . mysqli_error($conn);
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
</head>

<body>
    <div class="container mt-5">

        <div class="row d-flex justify-content-center">

            <div class="col-md-7">

                <div class="card p-3 py-4">

                    <div class="text-center">
                        <img src="https://i.imgur.com/bDLhJiP.jpg" width="100" class="rounded-circle">
                    </div>

                    <div class="text-center mt-3">
                        <span class="bg-secondary p-1 px-4 rounded text-white">Pro</span>
                        <h3 class="mt-3"> <?php echo $first_namee . ' ' . $last_namee; ?></h3>

                        <span><?php echo $email?></span>
                        <br>
                        <br>

                        <div class="px-4 mt-1">
                            <p class="fonts">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>

                        </div>

                        <br>
                        <br>
                        <br>
                        <br>

            

                        <div class="buttons">

                            <button class="btn btn-outline-primary px-4">Message</button>
                            <button class="btn btn-primary px-4 ms-3">Contact</button>
                        </div>


                    </div>




                </div>

            </div>

        </div>

    </div>
</body>

</html>