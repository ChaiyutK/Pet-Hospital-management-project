<?php
session_start();
if($_SESSION['type'] != "staff")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$userid = $_SESSION['userid'];
$Hnumber = $_REQUEST['Hnumber'];
$Fname = $_REQUEST['Fname'];
$Sname = $_REQUEST['Sname'];
$Village = $_REQUEST['Village'];
$Alley = $_REQUEST['Alley'];
$Road = $_REQUEST['Road'];
$District = $_REQUEST['District'];
$Canton = $_REQUEST['Canton'];
$province = $_REQUEST['province'];
$Postnumber = $_REQUEST['Postnumber'];
$Hpnumber = $_REQUEST['Hpnumber'];
$Phonenumber = $_REQUEST['Phonenumber'];
$Email = $_REQUEST['Email'];
require("../mysql/config.php");
$sql = "update user set hnumber='$Hnumber',name='$Fname',surname='$Sname',village='$Village',alley='$Alley',road='$Road',district='$District',
canton='$Canton',province='$province',postnumber='$Postnumber',hpnumber='$Hpnumber',phonenumber='$Phonenumber',email='$Email' where userid = $userid";

require("../mysql/connect.php");
if(empty($result))
{
    echo "<script>alert('เกิดข้อผิดพลาด');window.open('staffedithistory.php','_self')</script>";
}
$_SESSION['name'] = $Fname.' '.$Sname;
require("../mysql/unconnect.php");
echo "<script>alert('แก้ไขข้อมูลสำเร็จ');window.open('staffedithistory.php','_self')</script>";


?>