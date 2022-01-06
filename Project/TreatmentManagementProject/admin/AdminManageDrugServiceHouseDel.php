<?php
session_start();
if($_SESSION['type'] != "admin")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$dshid = $_REQUEST['dshid'];
require("../mysql/config.php");
$sql = "delete from drugservicestorehouse where dshid = $dshid";
require("../mysql/connect.php");
if(empty($result))
{
    echo "<script>alert('เกิดข้อผิดพลาด');window.open('AdminManageDrugServiceHouse.php','_self')</script>";
}
echo "<script>alert('ลบคลังยาและบริการสำเร็จ');window.open('AdminManageDrugServiceHouse.php','_self')</script>";
require("../mysql/unconnect.php");
?>