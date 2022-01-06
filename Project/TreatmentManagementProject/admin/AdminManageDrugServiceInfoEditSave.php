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
$sql = "update drugserviceinfo set dcid='$type',name='$name',manufactid='$manufacturer',properties='$properties',instruction='$instruction',extra='$extra' where drugid = '$drugid'";
require("../mysql/connect.php");
if(empty($result))
{
 echo "<script>alert('เกิดข้อผิดพลาด');window.open('AdminManageDrugServiceInfo.php','_self')</script>";
}
require("../mysql/unconnect.php");
echo "<script>alert('แก้ไขข้อมูลสำเร็จ');window.open('AdminManageDrugServiceInfo.php','_self')</script>";


?>