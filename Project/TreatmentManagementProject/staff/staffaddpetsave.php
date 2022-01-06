<?php
session_start();
require("../mysql/config.php");
if($_SESSION['type'] != "staff")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}

$userid = $_REQUEST['userid'];
$petname = $_REQUEST['petname'];
$pettype = $_REQUEST['pettype'];
$gender = $_REQUEST['gender'];
$birthday = $_REQUEST['birthday'];
$species = $_REQUEST['species'];
$sterilization = $_REQUEST['sterilization'];


$sql= "INSERT INTO `pet` (`petid`, `name`, `pettypeid`, `gender`, `birthday`, `species`, `sterilization`) VALUES (NULL, '$petname',
'$pettype', '$gender', '$birthday', '$species', '$sterilization')";
require("../mysql/connect.php");

if(empty($result))
{
    echo "<script>alert('ผิดพลาดบันทึกข้อมูลสัตว์');window.open('staffregissystem.php','_self');</script>";
    exit();
}
else
{
    require("../mysql/unconnect.php");
    $sql = "SELECT MAX(petid) AS petid
FROM pet";
require("../mysql/connect.php");
$record = mysqli_fetch_array($result);
$maxpetid = $record['petid'];
require("../mysql/unconnect.php");
    $sql= "INSERT INTO `ownerpet` (`ownerpetid`, `userid`, `petid`) VALUES (NULL, '$userid','$maxpetid')";
    require("../mysql/connect.php");
    if(empty($result))
{
    require("../mysql/unconnect.php");
    echo "<script>alert('ผิดพลาดบันทึกข้อมูลสัตว์');window.open('staffregissystem.php','_self');</script>";
    exit();
}
else
{
    require("../mysql/unconnect.php");
    echo "<script>alert('บันทึกข้อมูลสำเร็จ');window.open('staffregissystem.php','_self');</script>";
}
}


?>