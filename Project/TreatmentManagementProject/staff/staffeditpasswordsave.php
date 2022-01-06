<?php
session_start();
if($_SESSION['type'] != "staff")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$userid = $_SESSION['userid'];
$pwd = $_REQUEST['NewPwd'];
require("../mysql/config.php");
$sql = "update user set pwd = Password('$pwd') where userid = $userid";
require("../mysql/connect.php");
if(empty($result))
{
    echo "<script>alert('เกิดข้อผิดพลาด');window.open('staff.php','_self')</script>";
}
echo "<script>alert('เปลี่ยนรหัสผ่านสำเร็จกรุณาล็อคอินใหม่อีกครั้ง');window.open('../logout.php','_self')</script>";
require("mysql/unconnect.php");
?>