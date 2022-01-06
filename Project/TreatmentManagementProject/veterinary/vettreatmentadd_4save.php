<?php
session_start();
require("../mysql/config.php");
$treatmentid = $_REQUEST['treatmentid'];
if($_SESSION['type'] != "veterinary")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$differential = $_REQUEST['differential'];
$labequip = $_REQUEST['labequip'];
$finaldiagnosis = $_REQUEST['finaldiagnosis'];
if(empty($_REQUEST['finaldiagnosis2']))
{
    $finaldiagnosis2 = "";
}
else
{
    $finaldiagnosis2 = $_REQUEST['finaldiagnosis2'];
}

if(empty($_REQUEST['finaldiagnosis3']))
{
    $finaldiagnosis3 = "";
}
else
{
    $finaldiagnosis3 = $_REQUEST['finaldiagnosis3'];
}
$treatmentplan = $_REQUEST['treatmentplan'];
$clienteducation = $_REQUEST['clienteducation'];

$sql= "update treatment set differential='$differential',labequip='$labequip', finaldiagnosis='$finaldiagnosis', finaldiagnosis2='$finaldiagnosis2',finaldiagnosis3='$finaldiagnosis3',treatmentplan='$treatmentplan',clienteducation='$clienteducation' where treatmentid='$treatmentid'";
require("../mysql/connect.php");
if(empty($result))
{
   echo "<script>alert('ผิดพลาดในการบันทึกการวินิจฉัย');window.open('vettreatmentadd_4.php?treatmentid=' + '$treatmentid','_self');</script>";
   exit();
}
else
{
    require("../mysql/unconnect.php");
    echo "<script>alert('บันทึกการวินิจฉัยสำเร็จ');window.open('vettreatmentadd_4.php?treatmentid=' + '$treatmentid','_self');</script>";
}



?>