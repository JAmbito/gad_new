<?php 

include '../connect.php';

session_start();



	$chkquery = "SELECT * FROM `z_barangays` WHERE `region_code` = '".$_POST["region_id"]."' AND `province_code` = '".$_POST["province_id"]."' AND `city_code` = '".$_POST["city_id"]."'";
	$chkresult = mysqli_query($con, $chkquery);

	$output = '<option value="" style="display: none">--SELECT BARANGAY--</option>';

	while($row = mysqli_fetch_array($chkresult)){

		$output .= '
		<option value="'.$row["description"].'" data-value1="'.$row[3].'" data-value2="'.$row[4].'" data-value3="'.$row[5].'">'.$row["description"].'</option>';

	}

	echo $output;


?>