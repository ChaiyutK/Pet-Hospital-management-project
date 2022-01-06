<?php
session_start();
require("../mysql/config.php");
$vetid = $_SESSION['userid'];
if($_SESSION['type'] != "veterinary")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}

$treatmentroomid = $_REQUEST['treatmentroomid'];


$sql= "update treatmentroom set vetid='$vetid' where treatmentroomid=$treatmentroomid";
require("../mysql/connect.php");

if(empty($result))
{
    echo "<script>alert('ผิดพลาดในการเลือกห้องตรวจ');window.open('vetchooseroom.php','_self');</script>";
    exit();
}
else
{
    require("../mysql/unconnect.php");
    echo "<script>alert('เลือกห้องตรวจสำเร็จ');window.open('vetchooseroom.php','_self');</script>";
}



?>