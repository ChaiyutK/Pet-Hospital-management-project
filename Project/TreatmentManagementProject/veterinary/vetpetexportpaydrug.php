<?php
session_start();
require("../mysql/config.php");
$listid = $_REQUEST['listid'];
$numdrug = $_REQUEST['numdrug'];
if($_SESSION['type'] != "veterinary")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}

$sql= "update drugservicelist set balance=balance - $numdrug where listid='$listid'";
require("../mysql/connect.php");
if(empty($result))
{
   echo "<script>alert('ผิดพลาดในการเบิกยา');window.open('vetdrugservice.php','_self');</script>";
   exit();
}
else
{
    require("../mysql/unconnect.php");
    echo "<script>alert('เบิกยาสำเร็จ');window.open('vetdrugservice.php','_self');</script>";
}



?>