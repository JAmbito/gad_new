<?php


include 'Super_Admin/connect.php';

session_start();
date_default_timezone_set('Asia/Manila');

$email = $_POST['email'];
$passdehash = md5($_POST['password']);
$campus = $_POST['campus'];

$phdate = date("Y-m-d H:i:s");


$qry = "SELECT * FROM `dtm_users` WHERE `username` = '$email' AND `password` = '$passdehash' AND `campus_name` = '$campus'";
$result = mysqli_query($con, $qry);

if($result){

	$row = mysqli_fetch_array($result);
	
	if($row['username'] == $email && $row['password'] == $passdehash){

		$sql1 = "INSERT INTO `activity_log`(`name`, `activity`, `date`) VALUES ('$email','Login','$phdate')";
        $result1 = mysqli_query($con, $sql1);      

		$_SESSION['email'] = $email;
		header('location:Super_Admin/index.php');
	}
	
	else{
		$_SESSION['status'] = "Wrong Credentials. Try again";
		header('location:index.php');
	}

}





?>