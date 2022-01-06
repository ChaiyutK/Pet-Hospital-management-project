<?php
session_start();
require("../mysql/config.php");
if($_SESSION['type'] != "staff")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}

$userid = $_REQUEST['userid'];
$petid = $_REQUEST['petid'];
$sql = "select `userid`, `petid` from ownerpet where userid = '$userid' and petid = '$petid'";
    require("../mysql/connect.php");
    $record = mysqli_fetch_array($result);
    if(empty($record['userid']))
    {
        require("../mysql/unconnect.php");
        $sql= "INSERT INTO `ownerpet` (`ownerpetid`, `userid`, `petid`) VALUES (NULL, '$userid','$petid')";
        require("../mysql/connect.php");
        if(empty($result))
        {
            require("../mysql/unconnect.php");
            echo "<script>alert('ผิดพลาดบันทึกข้อมูลสัตว์');window.open('staffaddpethaveinfo.php?userid=' + $userid,'_self');</script>";
            exit();
        }
        else
        {
            require("../mysql/unconnect.php");
            echo "<script>alert('บันทึกข้อมูลสำเร็จ');window.open('staffmanageowner.php','_self');</script>";
        }
    }
    else
    {
        echo "<script>alert('สมาชิกคนนี้เป็นเจ้าของสัตว์เลี้ยงตัวนี้แล้วไม่สามารถดำเนินการได้');window.open('staffaddpethaveinfo.php?userid=' + $userid,'_self');</script>";
            exit();
    }





?>