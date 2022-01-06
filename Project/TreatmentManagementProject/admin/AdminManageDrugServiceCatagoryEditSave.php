<?php
session_start();
if($_SESSION['type'] != "admin")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$dcid = $_REQUEST['dcid'];
$name = $_REQUEST['name'];
$type = $_REQUEST['type'];
require("../mysql/config.php");
$sql = "update drugservicecatagory set name='$name',type=$type where dcid='$dcid'";
require("../mysql/connect.php");
if(empty($result))
{
    echo "<script>alert('เกิดข้อผิดพลาด');window.open('AdminManageDrugServiceCatagory.php','_self')</script>";
}
else{
require("../mysql/unconnect.php");
echo "<script>alert('แก้ไขหมวดยาและบริการสำเร็จ');window.open('AdminManageDrugServiceCatagory.php','_self')</script>";
}

?>