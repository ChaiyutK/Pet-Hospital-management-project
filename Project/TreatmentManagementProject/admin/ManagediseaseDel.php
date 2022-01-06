<?php
session_start();
if($_SESSION['type'] != "admin")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$diseaseid = $_REQUEST['diseaseid'];
require("../mysql/config.php");
$sql = "delete from disease where diseaseid = '$diseaseid'";
require("../mysql/connect.php");
if(empty($result))
{
    echo "<script>alert('ไม่สามารถลบข้อมูลได้เนื่องจากมีการใช้งานข้อมูลโรคอยู่');window.open('Managedisease.php','_self')</script>";
}
echo "<script>alert('ลบข้อมูลโรคสำเร็จ');window.open('Managedisease.php','_self')</script>";
require("../mysql/unconnect.php");
?>