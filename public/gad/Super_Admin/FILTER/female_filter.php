<?php

include '../connect.php';

$department = isset($_POST['department']) ? $_POST['department'] : null;
$campus = isset($_POST['campus']) ? $_POST['campus'] : null;
$civil = isset($_POST['civil']) ? $_POST['civil'] : null;
$status = isset($_POST['status']) ? $_POST['status'] : null;
$academic = isset($_POST['academic']) ? $_POST['academic'] : null;
$administrative = isset($_POST['administrative']) ? $_POST['administrative'] : null;

$sql = "SELECT `personal_civil_status`, COUNT(*) AS 'count' FROM `main_i_personal_info` WHERE `personal_sex` = 'FEMALE' AND `approval` = 'APPROVED'";
if (!empty($campus)) {
    $sql .= " AND `personal_campus` = '$campus'";
}
if (!empty($department)) {
    $sql .= " AND `personal_department` = '$department'";
}
if (!empty($civil)) {
    $sql .= " AND `personal_civil_status` = '$civil'";
}
if (!empty($status)) {
    $sql .= " AND `personal_emp_status` = '$status'";
}
if (!empty($academic)) {
    $sql .= " AND `personal_academic_rank` = '$academic'";
}
if (!empty($administrative)) {
    $sql .= " AND `personal_administrative_rank` = '$administrative'";
}
$sql .= " GROUP BY `personal_civil_status`";

$result = mysqli_query($con, $sql);

$data_female = array();
$labels_female = array();
while ($row = mysqli_fetch_assoc($result)) {
    $labels_female[] = $row['personal_civil_status'];
    $data_female[] = $row['count'] * 100 / 100;
}

if (mysqli_num_rows($result) === 0) {
    $labels_female = array("No results found");
    $data_female = array(0);
}

echo json_encode(array("labels_female" => $labels_female, "data_female" => $data_female));

?>