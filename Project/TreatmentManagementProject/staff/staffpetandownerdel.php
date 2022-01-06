<?php
session_start();
if($_SESSION['type'] != "staff")
{
        echo "<script>alert('สิทธิ์การใช้งานไม่ถูกต้อง');window.open('../Main.php','_self');</script>";
}

$userid = $_REQUEST['userid'];
$petid = $_REQUEST['petid'];
require("../mysql/config.php");
$sql = "delete from ownerpet where userid = $userid and petid = $petid";
require("../mysql/connect.php");
if(empty($result))
{
    echo "<script>alert('เกิดข้อผิดพลาด');window.open('staffpetandowner.php?petid=' + $petid,'_self')</script>";
}
echo "<script>alert('ลบการเป็นเจ้าของสัตว์เลี้ยงสำเร็จ');window.open('staffpetandowner.php?petid=' + $petid,'_self')</script>";
require("../mysql/unconnect.php");
?>