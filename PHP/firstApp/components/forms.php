<?php
// $first_name= $_POST["first_name"];
// $last_name= $_POST["last_name"];
include("../database/connectdb.php");

if(isset($_POST['register'])){
    echo "My First name is". $first_name. "<br />";
    echo "My First name is". $last_name. "<br />";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <title>Document</title>
</head>
<body>

<form method="POST" action="processForm.php" class="w-50 mx-auto">
    <h3>Register</h3>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">first name</label>
    <input name="first_name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Last Name</label>
    <input name="last_name" type="text" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label  for="exampleInputEmail1" class="form-label">Email</label>
    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
 
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
    <input name="cpassword" type="password" class="form-control" id="exampleInputPassword1">
  </div>
  
  <button name='register' type="submit" class="btn btn-primary">Submit</button>
</form>

    
</body>
</html>