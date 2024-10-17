<?php
class Human {
   public $gender= "Male";
   public $myColor;
   public $humanName= "Victor";


   public function __construct($gen, $color, $humanName)
   {
    $this->gender= $gen;
    // $this->$myColor= $color;
    $this->myColor = $color;
    $this->humanName= $humanName;

   }

   public function eat(){
    return "$this->humanName needs to eat <br/>";
   }
   public function sleep(){
    return "Daniel loves to sleep <br/>";
   }
}




$daniel= new Human('Male', 'Fair', 'Daniel');
$Ayo= new Human('Female', 'Dark', 'Ayo');
echo $Ayo->eat();




$samuel= new Human('Male', 'Dark', 'Samuel');
$samuel->gender= "others <br/>";

// echo $samuel->humanName="samuel"."<br>";




?>