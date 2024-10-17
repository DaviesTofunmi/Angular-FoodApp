<?php
include("../database/connectdb.php");
session_start();


if($_GET['session']){
    $mess= $_GET['message'];
    echo $mess;
}


if (!isset($_SESSION['email']) || time() > $_SESSION['token_exp']) {
    error_log("Session expired or not set");
    session_destroy();
    header("Location: login.php?messsage=Your token has expired. Please login again");
    exit;
} else {
    $user_email = $_SESSION['email'];
    $sql = "SELECT * FROM users WHERE email = '$user_email'";
    $response = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($response);

    if ($result) {
        $first_namee = $result['first_name'];
        $last_namee = $result['last_name'];
        $prof_pic= $result['picture'];
        echo $user_email;
    }
    else {
        error_log("User data not found");
        echo "User not found";
        exit;
    }


 
}



if(isset($_POST['update'])){
    $img_path= "images/";
    $file= $img_path.basename($_FILES['profile_picture']['name']);
    echo $file;
    $sql = "UPDATE users SET picture= '$file' WHERE email='$user_email'";
    if(mysqli_query($conn, $sql)){
        move_uploaded_file($_FILES['profile_picture']['tmp_name'], $file);
        echo 'profile_picture updated';
        header("Location: profile.php?message= profile updated succesfully");
    }
    else{
        echo mysqli_error($conn). "Cannot upload Image";
    }

}


if(isset($_POST['logout'])){
    error_log("Logout requested");
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
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
                        
                        <img src="<?php echo $prof_pic?>" width="100" class="rounded-circle">
                    </div>

                    <div class="text-center mt-3">
                        <span class="bg-secondary p-1 px-4 rounded text-white">Pro</span>
                        <h3 class="mt-3"> <?php echo $first_namee . ' ' . $last_namee; ?></h3>

                        <span>UI/UX Designer</span>

                        <div class="px-4 mt-1">
                            <p class="fonts">Consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>

                        </div>

                        <ul class="social-list">
                            <li><i class="fa fa-facebook"></i></li>
                            <li><i class="fa fa-dribbble"></i></li>
                            <li><i class="fa fa-instagram"></i></li>
                            <li><i class="fa fa-linkedin"></i></li>
                            <li><i class="fa fa-google"></i></li>
                        </ul>

                        <div class="buttons">

                            <button class="btn btn-outline-primary px-4">Message</button>
                            <button class="btn btn-primary px-4 ms-3">Contact</button>
                        </div>
                        <form method="POST" action="profile.php" enctype="multipart/form-data">
                            <input name="profile_picture" type="file">
                            <button type="submit" name="update">Update</button>


                        </form>


                    </div>




                </div>

            </div>

        </div>

    </div>
</body>

</html>