<?php
session_start();
if($_SESSION['type'] != "admin")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$diseaseid = $_REQUEST['diseaseid'];
$dname = $_REQUEST['dname'];
$treatmenttype = $_REQUEST['treatmenttype'];
$syndrome = $_REQUEST['syndrome'];
$typedisease = $_REQUEST['typedisease'];
require("../mysql/config.php");
$sql = "INSERT INTO `disease`(`DiseaseID`, `Name`, `TreatmentType`, `Syndrome`, `TypeDisease`) 
VALUES ('$diseaseid','$dname','$treatmenttype','$syndrome','$typedisease')";

require("../mysql/connect.php");
if(empty($result))
{
    echo "<script>alert('เกิดข้อผิดพลาด');window.open('Managedisease.php','_self')</script>";
}
require("../mysql/unconnect.php");
//echo "<script>window.open('officerregissection-detail.php?subid=' + '$subid' + '&year=' + $year +'&semester=' + $semester,'_self');</script>";
echo "<script>alert('เพิ่มข้อมูลโรคสำเร็จ');window.open('Managedisease.php','_self')</script>";


?>