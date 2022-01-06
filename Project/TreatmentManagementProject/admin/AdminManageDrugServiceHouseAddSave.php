<?php
session_start();
if($_SESSION['type'] != "admin")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$dshid = $_REQUEST['dshid'];
$name = $_REQUEST['name'];
$address = $_REQUEST['address'];
$connumber = $_REQUEST['connumber'];
require("../mysql/config.php");
$sql = "insert into drugservicestorehouse (`dshid`, `name`, `address`, `connumber`) VALUES ($dshid,'$name','$address','$connumber')";

require("../mysql/connect.php");
if(empty($result))
{
    echo "<script>alert('เกิดข้อผิดพลาด');window.open('AdminManageDrugServiceHouse.php','_self')</script>";
}
require("../mysql/unconnect.php");
//echo "<script>window.open('officerregissection-detail.php?subid=' + '$subid' + '&year=' + $year +'&semester=' + $semester,'_self');</script>";
echo "<script>alert('เพิ่มข้อมูลสำเร็จ');window.open('AdminManageDrugServiceHouse.php','_self')</script>";


?>