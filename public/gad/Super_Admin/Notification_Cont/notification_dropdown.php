<?php

include '../connect.php';

session_start();


$sql = "SELECT * FROM `notification_tbl` GROUP BY `date_submitted` ORDER BY `date_submitted` DESC LIMIT 20";
$result=mysqli_query($con,$sql);


if(mysqli_num_rows($result) > 0){
	foreach($result as $value){
		echo '	
			<div class="notif-mid-cont">
				<span> 
					<span style="color: #C30000!important; font-size: 10px"><i class="fa-solid fa-circle"></i></span>
					<span style="font-weight: 700; text-transform: uppercase;">'.$value["session_user_name"].' [ '.$value["session_user_postion"].' ]</span>
					<span style="color: #ADADAD; text-transform: uppercase; letter-spacing: .3px;">'.$value["session_action"].'</span>
					<span style="font-weight: 600; color: #C30000; text-transform: uppercase">'.$value["session_doc_designation"].'</span>

					<div style="margin-top: 14px;">
					<span style="color: #ADADAD;">'.date('M d, Y', strtotime($value["date_submitted"])).' at '.date('h:i A', strtotime($value["date_submitted"])).'</span>
					</div>

				</span>
			</div>

			 ';
	}

}else{
	echo
	 	'<div class="notif-mid-cont">
			<span style="text-align: center;"> 
				<span style="font-weight: 500; font-style: italic; color: #B8B8B8; font-size: 13.5px;">No New Notification!</span>
				<br>
			</span>
		</div>';
}

?>