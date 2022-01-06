<?php
session_start();
if($_SESSION['type'] != "admin")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$dcid = $_REQUEST['dcid'];
require("../mysql/config.php");
$sql = "delete from drugservicecatagory where dcid = $dcid";
require("../mysql/connect.php");
if(empty($result))
{
    echo "<script>alert('เกิดข้อผิดพลาด');window.open('AdminManageDrugServiceCatagory.php','_self')</script>";
}
echo "<script>alert('ลบหมวดยาและบริการสำเร็จ');window.open('AdminManageDrugServiceCatagory.php','_self')</script>";
require("../mysql/unconnect.php");
?>