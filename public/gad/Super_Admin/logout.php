<?php 

session_start();
date_default_timezone_set('Asia/Manila');

include 'connect.php';

$sql1="SELECT * FROM `dtm_users` WHERE `username` = '$_SESSION[email]'";
$result1=mysqli_query($con,$sql1);
$row1=mysqli_fetch_assoc($result1);
$user_name=$row1['username'];

$phdate = date("Y-m-d H:i:s");

$sql2 = "INSERT INTO `activity_log`(`name`, `activity`, `date`) VALUES ('$user_name','Logout','$phdate')";
$result2 = mysqli_query($con, $sql2);          
session_destroy();
header('location:../index.php');



?>