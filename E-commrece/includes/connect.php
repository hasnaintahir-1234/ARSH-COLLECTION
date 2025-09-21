<?php

$con=mysqli_connect('localhost', 'root','','mystore');

// ! is sign ka matlb ha k "agar" mean agar con file nai hoi connect
if(!$con){ 

  die(mysqli_error($con));

}

?>