<?php
session_start();
require("../mysql/config.php");
$treatmentid = $_REQUEST['treatmentid'];
if($_SESSION['type'] != "veterinary")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$dtid = $_REQUEST['dtid'];

$sql= "select amount,listid from dispensetransection where dtid = '$dtid'";
require("../mysql/connect.php");
$record = mysqli_fetch_array($result);
$amount = $record['amount'];
$listid = $record['listid'];
require("../mysql/unconnect.php");
$sql= "update drugservicelist set balance=balance + $amount where listid='$listid'";
require("../mysql/connect.php");
require("../mysql/unconnect.php");
$sql= "delete from dispensetransection where dtid = $dtid";
require("../mysql/connect.php");
if(empty($result))
{
   echo "<script>alert('ผิดพลาด');window.open('vetpaydrugmanage.php?treatmentid=' + '$treatmentid','_self');</script>";
   exit();
}
else
{
    require("../mysql/unconnect.php");
    echo "<script>window.open('vetpaydrugmanage.php?treatmentid=' + '$treatmentid','_self');</script>";
}



?>