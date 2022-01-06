<?php
session_start();
if($_SESSION['type'] != "admin")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$treatmentroomid = $_REQUEST['treatmentroomid'];
require("../mysql/config.php");
$sql = "delete from treatmentroom where treatmentroomid = '$treatmentroomid'";
require("../mysql/connect.php");
if(empty($result))
{
    echo "<script>alert('ไม่สามารถลบข้อมูลได้เนื่องจากมีการใช้งานข้อมูลห้องตรวจนี้อยู่');window.open('Managetreatmentroom.php','_self')</script>";
}
echo "<script>alert('ลบห้องตรวจสำเร็จ');window.open('Managetreatmentroom.php','_self')</script>";
require("../mysql/unconnect.php");
?>