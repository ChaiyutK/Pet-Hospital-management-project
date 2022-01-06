<?php
session_start();
require("../mysql/config.php");
$treatmentid = $_REQUEST['treatmentid'];
if($_SESSION['type'] != "veterinary")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$prexdisorder = $_REQUEST['prexdisorder'];
$weight2 = $_REQUEST['weight2'];
$prextreatment = $_REQUEST['prextreatment'];
$appetite = $_REQUEST['appetite'];
$thrist = $_REQUEST['thrist'];
$behavior = $_REQUEST['behavior'];
$adverseeffect = $_REQUEST['adverseeffect'];
$newprob = $_REQUEST['newprob'];

if(empty($_REQUEST['aedetail']))
{
    $aedetail = "";
}
else
{
    $aedetail = $_REQUEST['aedetail'];
}

if(empty($_REQUEST['newprobdetail']))
{
    $newprobdetail = "";
}
else
{
    $newprobdetail = $_REQUEST['newprobdetail'];
}

$sql= "update treatment set prexdisorder='$prexdisorder',weight2='$weight2', prextreatment='$prextreatment'
,appetite='$appetite',thrist='$thrist',behavior='$behavior',adverseeffect='$adverseeffect',aedetail='$aedetail',
newprob='$newprob',newprobdetail='$newprobdetail' where treatmentid=$treatmentid";
require("../mysql/connect.php");

if(empty($result))
{
    echo "<script>alert('ผิดพลาดในการบันทึกการตรวจสอบประวัติ');window.open('vettreatmentadd_2.php?treatmentid=' + '$treatmentid','_self');</script>";
   exit();
}
else
{
    require("../mysql/unconnect.php");
    echo "<script>alert('บันทึกการตรวจสอบประวัติสำเร็จ');window.open('vettreatmentadd_2.php?treatmentid=' + '$treatmentid','_self');</script>";
}



?>