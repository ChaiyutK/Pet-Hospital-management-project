<?php

session_start();
require("../mysql/config.php");

if($_SESSION['type'] != "veterinary")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$treatmentid = $_REQUEST['treatmentid'];

$sql = "select dtid,listid,TreatmentID from dispensetransection where TreatmentID = '$treatmentid'";
        require("../mysql/connect.php");
        $row = mysqli_fetch_array($result);
        if(empty($row['dtid']))
        {
            echo "<script>alert('กรุณาจ่ายยาก่อนส่งไปคิดเงิน');window.open('vetpaydrugmanage.php?treatmentid=' + '$treatmentid','_self');</script>";
        }
        else
        {
            require("../mysql/unconnect.php");
            $sql= "update treatment set status = 3 where treatmentid='$treatmentid'";
            require("../mysql/connect.php");
        }

if(empty($result))
{
   echo "<script>alert('ผิดพลาด');window.open('vetpaydrugmanage.php?treatmentid=' + '$treatmentid','_self');</script>";
   exit();
}
else
{
    require("../mysql/unconnect.php");
    echo "<script>alert('ส่งไปยังห้องคิดเงินสำเร็จ');window.open('vetpaydrug.php','_self');</script>";
}


?>