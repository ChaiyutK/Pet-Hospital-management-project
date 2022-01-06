<?php
session_start();
if($_SESSION['type'] != "admin")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$roomname = $_REQUEST['roomname'];
$roomid = $_REQUEST['roomid'];
require("../mysql/config.php");
$sql = "insert into treatmentroom (treatmentroomid,name) VALUES ('$roomid','$roomname')";

require("../mysql/connect.php");
if(empty($result))
{
    echo "<script>alert('เกิดข้อผิดพลาด');window.open('Managetreatmentroom.php','_self')</script>";
}
require("../mysql/unconnect.php");
//echo "<script>window.open('officerregissection-detail.php?subid=' + '$subid' + '&year=' + $year +'&semester=' + $semester,'_self');</script>";
echo "<script>alert('เพิ่มข้อมูลห้องตรวจสำเร็จ');window.open('Managetreatmentroom.php','_self')</script>";


?>