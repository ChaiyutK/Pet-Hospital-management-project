<?php
session_start();
$userid = $_REQUEST['userid'];
require("../mysql/config.php");
$sql = "delete from user where userid = $userid";
require("../mysql/connect.php");
if(empty($result))
{
    echo "<script>alert('เกิดข้อผิดพลาด');window.open('admin.php','_self')</script>";
}
echo "<script>alert('ลบผู้ใช้งานสำเร็จ');window.open('ManageUser.php','_self')</script>";
require("../mysql/unconnect.php");
?>