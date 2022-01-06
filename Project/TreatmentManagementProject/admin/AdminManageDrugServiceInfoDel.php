<?php
session_start();
if($_SESSION['type'] != "admin")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$drugid = $_REQUEST['drugid'];
require("../mysql/config.php");
$sql = "delete from drugserviceinfo where drugid = $drugid";
require("../mysql/connect.php");
if(empty($result))
{
    echo "<script>alert('เกิดข้อผิดพลาด');window.open('AdminManageDrugServiceInfo.php','_self')</script>";
}
echo "<script>alert('ลบข้อมูลยาและบริการสำเร็จ');window.open('AdminManageDrugServiceInfo.php','_self')</script>";
require("../mysql/unconnect.php");
?>