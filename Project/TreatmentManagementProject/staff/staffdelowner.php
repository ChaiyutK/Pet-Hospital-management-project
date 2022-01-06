<?php
session_start();
if($_SESSION['type'] != "staff")
{
        echo "<script>alert('สิทธิ์การใช้งานไม่ถูกต้อง');window.open('../Main.php','_self');</script>";
}

$userid = $_REQUEST['userid'];
require("../mysql/config.php");
$sql = "delete from user where userid = $userid and level=4";
require("../mysql/connect.php");
if(empty($result))
{
    echo "<script>alert('เกิดข้อผิดพลาด');window.open('staffmanageowner.php','_self')</script>";
}
echo "<script>alert('ลบผู้ใช้งานสำเร็จ');window.open('staffmanageowner.php','_self')</script>";
require("../mysql/unconnect.php");
?>