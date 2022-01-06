<?php
session_start();
require("../mysql/config.php");
if($_SESSION['type'] != "staff")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}

$petid = $_REQUEST['petid'];
$petname = $_REQUEST['petname'];
$pettype = $_REQUEST['pettype'];
$gender = $_REQUEST['gender'];
$birthday = $_REQUEST['birthday'];
$species = $_REQUEST['species'];
$sterilization = $_REQUEST['sterilization'];


$sql= "update pet set name='$petname',pettypeid='$pettype',gender=$gender,birthday='$birthday',species='$species',sterilization=$sterilization where petid=$petid";
require("../mysql/connect.php");

if(empty($result))
{
    echo "<script>alert('ผิดพลาดในการแก้ไขข้อมูลสัตว์');window.open('staffpetinfo.php?petid=' + $petid,'_self');</script>";
    exit();
}
else
{
    require("../mysql/unconnect.php");
    echo "<script>alert('แก้ไขข้อมลสัตว์เลี้ยงข้อมูลสำเร็จ');window.open('staffpetinfo.php?petid=' + $petid,'_self');</script>";
}



?>