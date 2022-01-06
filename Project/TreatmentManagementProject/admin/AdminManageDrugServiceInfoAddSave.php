<?php
session_start();
if($_SESSION['type'] != "admin")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$drugid = $_REQUEST['drugid'];
$type = $_REQUEST['type'];
$name = $_REQUEST['name'];
$manufacturer = $_REQUEST['manufacturer'];
$properties = $_REQUEST['properties'];
$instruction = $_REQUEST['instruction'];
$extra = $_REQUEST['extra'];
require("../mysql/config.php");
$sql = "INSERT INTO drugserviceinfo VALUES ('$drugid','$name','$properties','$instruction','$extra','$type','$manufacturer');";
require("../mysql/connect.php");
if(empty($result))
{
 echo "<script>alert('เกิดข้อผิดพลาด');window.open('AdminManageDrugServiceInfo.php','_self')</script>";
}
require("../mysql/unconnect.php");
echo "<script>alert('เพิ่มข้อมูลสำเร็จ');window.open('AdminManageDrugServiceInfo.php','_self')</script>";


?>