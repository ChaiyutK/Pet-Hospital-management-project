<?php
session_start();
require("../mysql/config.php");
$vetid = $_SESSION['userid'];
if($_SESSION['type'] != "veterinary")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}


$treatmentroomid = $_REQUEST['treatmentroomid'];
$sql = "select treatmentid from treatment where vetid = '$vetid' and treatmentroomid = '$treatmentroomid' and status != 4";
    require("../mysql/connect.php");
    $record = mysqli_fetch_array($result);
    if(empty($record['treatmentid']))
    {
        require("../mysql/unconnect.php");
        $sql= "update treatmentroom set vetid=NULL where treatmentroomid=$treatmentroomid";
        require("../mysql/connect.php");
        if(empty($result))
        {
            echo $sql;
            echo "<script>alert('ผิดพลาดในการย้ายห้องตรวจ');window.open('vetchooseroom.php','_self');</script>";
            exit();
        }
        else
        {
            require("../mysql/unconnect.php");
           echo "<script>alert('ย้ายห้องตรวจสำเร็จ');window.open('vetchooseroom.php','_self');</script>";
        }
    }
    else
    {
        echo "<script>alert('ไม่สามารถย้ายห้องตรวจได้กรุณาตรวจรักษา จ่ายยา และรอคิดเงินให้เสร็จก่อน');window.open('vetchooseroom.php','_self');</script>";
          exit();
    }





?>