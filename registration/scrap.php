<?php
ob_start();
include './php/dbconn.php';
$fname="ashwnai";
$lname="gupta";
$email="ashwanigupta30@yahoo.in";
$mobile="9830830071";
$etype="ON_STAGE";
$ename="solo-singing";
$college="the heritage academy";
$gender="male";
$sql = "SELECT * FROM `registrations` WHERE `fname`='$fname' AND `lname`='$lname' AND `email`='$email' AND `phone`='$mobile' AND `event_type`='$etype' AND `event_name`='$ename' AND `college_name`='$college' AND `gender`='$gender'";
$result = $conn->query($sql);
if($result->num_rows > 0){
    $row = $result->fetch_assoc();
    echo $row["sr_no"];
}
?>