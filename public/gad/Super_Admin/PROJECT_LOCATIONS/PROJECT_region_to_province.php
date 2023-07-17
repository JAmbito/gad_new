<?php 

include '../connect.php';

session_start();



	$chkquery = "SELECT * FROM `z_provinces` WHERE `region_code` = '".$_POST["region_id"]."'";
	$chkresult = mysqli_query($con, $chkquery);

	$output = '<option value="" style="display: none">--SELECT PROVINCE--</option>';

	while($row = mysqli_fetch_array($chkresult)){

		$output .= '
		<option value="'.$row["description"].'" data-value1="'.$row[3].'" data-value2="'.$row[4].'">'.$row["description"].'</option>';

	}

	echo $output;


?>