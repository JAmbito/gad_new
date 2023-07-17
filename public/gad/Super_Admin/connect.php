<?php  



date_default_timezone_set('Asia/Manila');

// Create connection         
$con = new mysqli('localhost','root','','gad_bpsu');

// Check connection
if (!$con) {
  die(mysqli_error($con));
}


?>