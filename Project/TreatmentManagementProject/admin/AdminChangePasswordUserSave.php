<?php
session_start();
$userid = $_REQUEST['userid'];
$pwd = $_REQUEST['NewPwd'];
require("../mysql/config.php");
$sql = "update user set pwd = Password('$pwd') where userid = $userid";
require("../mysql/connect.php");
if(empty($result))
{
    echo "<script>alert('เกิดข้อผิดพลาด');window.open('admin.php','_self')</script>";
}
echo "<script>alert('เปลี่ยนรหัสผ่านสำเร็จ');window.open('ManageUser.php','_self')</script>";
require("mysql/unconnect.php");
?>