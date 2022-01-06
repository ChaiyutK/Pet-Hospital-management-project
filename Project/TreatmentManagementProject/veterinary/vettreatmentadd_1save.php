<?php
session_start();
require("../mysql/config.php");
$treatmentid = $_REQUEST['treatmentid'];
if($_SESSION['type'] != "veterinary")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$chiefcom = $_REQUEST['chiefcom'];
$weight1 = $_REQUEST['weight1'];
$vitalsign = $_REQUEST['vitalsign'];
$temperature = $_REQUEST['temperature'];
$rr = $_REQUEST['rr'];
$crt = $_REQUEST['crt'];
$hr = $_REQUEST['hr'];
$dehydrate = $_REQUEST['dehydrate'];
$bcs= $_REQUEST['bcs'];
$urination= $_REQUEST['urination'];
if(empty($_REQUEST['urdetail']))
{
    $urdetail = "";
}
else
{
    $urdetail = $_REQUEST['urdetail'];
}
$defecation = $_REQUEST['defecation'];
if(empty($_REQUEST['dedetail']))
{
    $dedetail = "";
}
else
{
    $dedetail = $_REQUEST['dedetail'];
}


$sql= "update treatment set chiefcom='$chiefcom',weight1='$weight1', vitalsign='$vitalsign'
,temperature='$temperature',rr='$rr',crt='$crt',hr='$hr',dehydrate='$dehydrate',bcs='$bcs',urination='$urination'
,urdetail='$urdetail',defecation='$defecation',dedetail='$dedetail' where treatmentid=$treatmentid";
require("../mysql/connect.php");

if(empty($result))
{
    echo "<script>alert('ผิดพลาดในการบันทึกข้อมูลทั่วไป');window.open('vettreatmentadd_1.php?treatmentid=' + '$treatmentid','_self');</script>";
    exit();
}
else
{
    require("../mysql/unconnect.php");
    echo "<script>alert('บันทึกข้อมูลทั่วไปสำเร็จ');window.open('vettreatmentadd_1.php?treatmentid=' + '$treatmentid','_self');</script>";
}



?>