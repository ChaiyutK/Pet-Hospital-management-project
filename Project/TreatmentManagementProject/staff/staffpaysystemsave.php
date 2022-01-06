<?php
session_start();
require("../mysql/config.php");
if($_SESSION['type'] != "staff")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}

$treatmentid = $_REQUEST['treatmentid'];
$totalprice = $_REQUEST['totalprice'];
$cashback = $_REQUEST['cashback'];
$cashget = $_REQUEST['cashget'];


$sql= "update treatment set BillNumber='$treatmentid',totalprice='$totalprice',status='4' where treatmentid='$treatmentid'";
require("../mysql/connect.php");

if(empty($result))
{
    echo "<script>alert('ผิดพลาดในการบันทึกการคิดเงิน');window.open('staffpaysystem.php','_self');</script>";
    exit();
}
else
{
    require("../mysql/unconnect.php");
    echo "<script>alert('บันทึกการคิดเงินสำเร็จ');window.open('staffpayprintbill.php?treatmentid=' + '$treatmentid' + '&cashback=' + '$cashback' + '&cashget=' + '$cashget','_self');</script>";
}



?>