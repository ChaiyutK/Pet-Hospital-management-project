<?php
session_start();
if($_SESSION['type'] != "admin")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$manufactid = $_REQUEST['manufactid'];
$companyname = $_REQUEST['companyname'];
$contractname = $_REQUEST['contractname'];
$companyaddress = $_REQUEST['companyaddress'];
$contractnumber = $_REQUEST['contractnumber'];
require("../mysql/config.php");
$sql = "update manufacturer set companyname='$companyname',contractname='$contractname',companyaddress='$companyaddress',contractnumber='$contractnumber' where manufactid = '$manufactid'";

require("../mysql/connect.php");
if(empty($result))
{
    echo "<script>alert('เกิดข้อผิดพลาด');window.open('AdminManageManuFacturer.php','_self')</script>";
}
require("../mysql/unconnect.php");
//echo "<script>window.open('officerregissection-detail.php?subid=' + '$subid' + '&year=' + $year +'&semester=' + $semester,'_self');</script>";
echo "<script>alert('แก้ไขข้อมูลผู้ผลิตสำเร็จ');window.open('AdminManageManuFacturer.php','_self')</script>";


?>