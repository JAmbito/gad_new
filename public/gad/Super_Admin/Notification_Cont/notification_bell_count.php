<?php

include '../connect.php';

session_start();


$sql = "SELECT `notification_id`,`session_doc_designation` FROM `notification_tbl` WHERE `session_status` = '0' GROUP BY `session_doc_designation` ORDER BY `notification_id` ";
$result=mysqli_query($con,$sql);

$row = mysqli_num_rows($result);

echo $row;

?>