<?php
session_start();
if($_SESSION['type'] != "admin")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$manufactid = $_REQUEST['manufactid'];
require("../mysql/config.php");
$sql = "delete from manufacturer where manufactid = '$manufactid'";
require("../mysql/connect.php");
if(empty($result))
{
    echo "<script>alert('เกิดข้อผิดพลาด');window.open('AdminManageManuFacturer.php','_self')</script>";
}
echo "<script>alert('ลบข้อมูลผู้ผลิตสำเร็จ');window.open('AdminManageManuFacturer.php','_self')</script>";
require("../mysql/unconnect.php");
?>