<?php

$users= [
    ["firstName"=> "Daniel", "age"=> 5, "gender"=> "male"],
    ["firstName"=> "Samuel", "age"=> 5, "gender"=> "male"],
    ["firstName"=> "Victor", "age"=> 5, "gender"=> "male"]
];

echo $users[0]["firstName"]. "<br />";
echo $users[0]["gender"]. "<br />";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<table class="table">

<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  
  <tbody>
  <tr>
      <th scope="col">name</th>
      <?php
      foreach ($users as $value) {
       echo "<td>".$value["firstName"]."</td>";
      }
      
      ?>
    </tr>
    <tr>
      <th scope="row">age</th>
      <?php
      foreach ($users as $value) {
       echo "<td>".$value["age"]."</td>";
      }
      
      ?>
    </tr>
    <tr>
      <th scope="row">gender</th>
      <?php
      foreach ($users as $value) {
       echo "<td>".$value["gender"]."</td>";
      }
      
      ?>
    </tr>
   
  </tbody>
</table>


    <?php
    
    
    ?>
    
</body>
</html>