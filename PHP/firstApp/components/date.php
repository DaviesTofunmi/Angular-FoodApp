<?php
date_default_timezone_set('Africa/Lagos');

// echo date('l' ). ' <br/>';//Returns the day of the week
// echo date('j'); //Returns the date of the month(1-31)
// echo date('S'); //Returns the prefix behind the date (rd, th, st, nd)
// echo date('F' ). ' <br/>';//Returns the month of the year
// echo date('Y' ). ' <br/>';//Returns the year
echo date('h:i' );//Returns the hour, minutes and seconds(hr:mins:seconds)
echo date('A' ). ' <br/>';//Returns AM/PM

print_r(getdate());

$str= "this is just a random text";
$hashed= bin2hex($str);
echo $hashed;
$reversed= hex2bin($hashed);
echo($reversed);
// echo(bin2hex($str));
echo ("<br/>");
echo ("<br/>");
echo rand(1, 100);
echo ("<br/>");
echo random_bytes(8);
?>