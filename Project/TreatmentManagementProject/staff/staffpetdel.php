<?php
session_start();
require("../mysql/config.php");
if($_SESSION['type'] != "staff")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}

$petid = $_REQUEST['petid'];


$sql= "delete from pet where petid=$petid";
require("../mysql/connect.php");

if(empty($result))
{
    echo "<script>alert('ท่านต้องลบเจ้าของทั้งหมดออกก่อนถึงจะสามารถลบข้อมูลสัตว์เลี้ยงได้');window.open('staffpetinfo.php?petid=' + $petid,'_self');</script>";
    exit();
}
else
{
    require("../mysql/unconnect.php");
    echo "<script>alert('ลบข้อมลสัตว์เลี้ยงสำเร็จ');window.open('staffsearchpet.php','_self');</script>";
}



?>