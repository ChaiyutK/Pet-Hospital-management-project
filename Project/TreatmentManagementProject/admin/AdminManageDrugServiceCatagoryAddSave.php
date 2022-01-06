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
$sql = "insert into drugservicecatagory (`dcid`, `name`, `type`) VALUES ('$dcid','$name',$type)";

require("../mysql/connect.php");
if(empty($result))
{
    echo "<script>alert('เกิดข้อผิดพลาด');window.open('AdminManageDrugServiceCatagory.php','_self')</script>";
}
require("../mysql/unconnect.php");
echo "<script>alert('เพิ่มหมวดยาและบริการสำเร็จ');window.open('AdminManageDrugServiceCatagory.php','_self')</script>";


?>