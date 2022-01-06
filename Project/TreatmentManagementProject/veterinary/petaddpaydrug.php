<?php
session_start();
require("../mysql/config.php");
$treatmentid = $_REQUEST['treatmentid'];
if($_SESSION['type'] != "veterinary")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$listid = $_REQUEST['listid'];
$numdrug = $_REQUEST['numdrug'];


        $sql = "select dtid,listid,TreatmentID from dispensetransection where listid='$listid' and TreatmentID = '$treatmentid'";
        require("../mysql/connect.php");
        $row = mysqli_fetch_array($result);
        if(empty($row['dtid']))
        {
            echo $sql;
            require("../mysql/unconnect.php");
            $sql= "update drugservicelist set balance=balance - $numdrug where listid='$listid'";
            require("../mysql/connect.php");
            require("../mysql/unconnect.php");
            $sql= "INSERT INTO `dispensetransection`(`DtID`, `ListID`, `TreatmentID`, `amount`) VALUES (NULL,'$listid','$treatmentid',$numdrug)";
            require("../mysql/connect.php");
        }
        else
        {
            $dtid=$row['dtid'];
            require("../mysql/unconnect.php");
            $sql= "update drugservicelist set balance=balance - $numdrug where listid='$listid'";
            require("../mysql/connect.php");
            require("../mysql/unconnect.php");
            $sql= "update `dispensetransection` set amount=amount + $numdrug where dtid='$dtid'";
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
    echo "<script>window.open('vetpaydrugmanage.php?treatmentid=' + '$treatmentid','_self');</script>";
}



?>