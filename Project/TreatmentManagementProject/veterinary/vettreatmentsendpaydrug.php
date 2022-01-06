<?php
session_start();
require("../mysql/config.php");
$treatmentid = $_REQUEST['treatmentid'];
if($_SESSION['type'] != "veterinary")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}

$sql= "update treatment set status='2' where treatmentid='$treatmentid'";
require("../mysql/connect.php");
if(empty($result))
{
   echo "<script>alert('ผิดพลาดในส่งไปห้องจ่ายยา);window.open('vettreatmentadd4.php?treatmentid=' + '$treatmentid','_self');</script>";
   exit();
}
else
{
    require("../mysql/unconnect.php");
    echo "<script>alert('ส่งไปยังห้องจ่ายยาสำเร็จ');window.open('vetshowtreatment.php','_self');</script>";
}



?>