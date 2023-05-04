<?php
require 'config.php';
$scholartype = "shscholar";
$status = "ASSESSMENT";
$sql = "SELECT * FROM tbl_admin WHERE status='$status' AND typescholar='$scholartype'";
$result = $conn->query($sql);
$count = 0;
while ($row = $result->fetch_assoc()) {
    $count++;
    $id = $row['id'];
    $academic_year = $row['academic_year'];
    $application_no = $row['application_no'];
    $sql1 = "SELECT * FROM tbl_studentinfo WHERE academic_year='$academic_year' AND application_no='$application_no'";
    $result1 = $conn->query($sql1);
    $row1 = $result1->fetch_assoc();

    echo $count . ")" . $id . "" . $row1['firstname'] . " " . $row1['lastname'] . " " . $row1['gwa'] . "<br>";
}
