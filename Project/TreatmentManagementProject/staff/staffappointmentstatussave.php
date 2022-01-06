<?php
session_start();
require("../mysql/config.php");
if($_SESSION['type'] != "staff")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}

$appointmentid = $_REQUEST['appointmentid'];
$status = $_REQUEST['status'];
if(empty($_REQUEST['petid']))
{
   
}
else
{
    $petid = $_REQUEST['petid'];
}

$sql= "update appointment set status='$status' where appointmentid='$appointmentid'";
require("../mysql/connect.php");


if(empty($result))
{
    if(empty($_REQUEST['petid']))
{
    echo "<script>alert('ผิดพลาดในการเปลี่ยนสถานะการนัดหมาย');window.open('staffappointment.php','_self');</script>";
    exit();
}
else
{
    echo "<script>alert('ผิดพลาดในการเปลี่ยนสถานะการนัดหมาย');window.open('staffpetappointmentsearch.php?petid=$petid','_self');</script>";
    exit();
}
    
}
else
{
    if(empty($_REQUEST['petid']))
    {
        echo "<script>alert('เปลี่ยนสถานะการนัดสำเร็จ');window.open('staffappointment.php','_self');</script>";
        exit();
    }
    else
    {
        echo "<script>alert('เปลี่ยนสถานะการนัดสำเร็จ');window.open('staffpetappointmentsearch.php?petid=$petid','_self');</script>";
        exit();
    }
}



?>