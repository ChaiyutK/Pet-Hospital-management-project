<?php
session_start();
if($_SESSION['type'] != "admin")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$listid = $_REQUEST['listid'];
require("../mysql/config.php");
$sql = "delete from drugservicelist where listid = '$listid'";
require("../mysql/connect.php");
if(empty($result))
{
    echo "<script>alert('เกิดข้อผิดพลาด');window.open('AdminManageDrugServiceList.php','_self')</script>";
}
echo "<script>alert('ลบรายการยาและบริการสำเร็จ');window.open('AdminManageDrugServiceList.php','_self')</script>";
require("../mysql/unconnect.php");
?>