<?php


include("../database/connectdb.php");

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type, Accept, Accept-Language, Content-Language, Accept-Encoding');
header('Access-Control-Allow-Credentials: true');

// if(isset($_SESSION['email'])){
  

//     echo $_SESSION['email'];

// }
// // if($_GET['message']){
// //     $mess= $_GET['message'];
// //     echo $mess;

// if (isset($_SESSION['email']) && $_SESSION['email'] == $email) {
//     // Session is valid
    

// } else {
//     // Session is invalid
// }

$data = json_decode(file_get_contents('php://input'), true);

// $Useremail = $_SESSION['email'];
// $token = $_SESSION['token'];


if($data){
    $currUser= $data['User'];
  
    session_start();
    $_SESSION['email']= $currUser;
    $token_expires= time() + 100;
    $_SESSION['token_exp']= $token_expires;
    if (!isset($_SESSION['email'])){
        echo json_encode('No current user');
        session_destroy();
        exit;
    }
    if(time() > $_SESSION['token_exp']){
        echo json_encode('Your session expired');
        session_destroy();
    
        exit;

    }
    else{
        
        echo json_encode([
            'user'=> $_SESSION['email'],
            'token_exp'=> $_SESSION['token_exp'],
            'message' => 'carry on now'
            ]);
    }
}


//     if (!$conn) {
//         die("Connection failed: " . mysqli_connect_error());
//       }

      
//       if (!isset($_SESSION['email']) || time() > $_SESSION['token_exp']) {
//         error_log("Session expired or not set");
//         session_destroy();
//         header("Location: newLogin.php? session=Your token has expired. Please login again");
//         exit;
//     } else {
      
//         $sql = "SELECT * FROM users WHERE email = '$Useremail'";
//         $response = mysqli_query($conn, $sql);
//         $result = mysqli_fetch_assoc($response);
    
//         if ($result) {
//             $first_namee = $result['first_name'];
//             $last_namee = $result['last_name'];
//           $email = $result['email'];
//             // echo $user_email; 
//             echo json_encode([
//                 'message' => $result,
//                 'email' => $email
//             ]);
            
//         }
//         else {
//             error_log("User data not found");
    
//             echo json_encode(['message' => "user not found"]);
//             exit;
//         }
    
    
     
//     }



//     }





// // if(isset($_POST['update'])){
// //     $img_path= "images/";
// //     $file= $img_path.basename($_FILES['profile_picture']['name']);
// //     echo $file;
// //     $sql = "UPDATE users SET picture= '$file' WHERE email='$user_email'";
// //     if(mysqli_query($conn, $sql)){
// //         move_uploaded_file($_FILES['profile_picture']['tmp_name'], $file);
// //         echo 'profile_picture updated';
// //         header("Location: profile.php?message= profile updated succesfully");
// //     }
// //     else{
// //         echo mysqli_error($conn). "Cannot upload Image";
// //     }

// // }


// // if(isset($_POST['logout'])){
// //     error_log("Logout requested");
// //     session_unset();
// //     session_destroy();
// //     header("Location: login.php");
// //     exit;
// // }
?>


