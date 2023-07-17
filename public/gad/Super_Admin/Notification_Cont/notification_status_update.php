<?php

include '../connect.php';

session_start();

$sql = "UPDATE `notification_tbl` SET `session_status`='1'";
$res = mysqli_query($con, $sql);
if ($res) {
  echo "Success";
} else {
  echo "Failed";
}