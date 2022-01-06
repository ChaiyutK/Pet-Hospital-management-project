<?php
session_start();
if($_SESSION['type'] != "admin")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$userid = $_REQUEST['userid'];
require("../mysql/config.php");
$sql = "update user set status = 2 where userid = '$userid'";
require("../mysql/connect.php");
if(empty($result))
{
    echo "<script>alert('เกิดข้อผิดพลาด');window.open('ManageUser.php','_self')</script>";
}
echo "<script>alert('ระงับการใช้งานสำเร็จ');window.open('ManageUser.php','_self')</script>";
require("mysql/unconnect.php");
?>