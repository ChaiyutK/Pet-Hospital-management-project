<?php
session_start();
require("../mysql/config.php");
if($_SESSION['type'] != "staff")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$petid = $_REQUEST['petid'];
$treatmentroomid = $_REQUEST['treatmentroomid'];

$sql = "select status,petid from treatment where status != 4 and petid = '$petid'";
    require("../mysql/connect.php");
    $record = mysqli_fetch_array($result);
    if(empty($record['status']))
    {
        $vetid = $_REQUEST['vetid'];
        $chiefcom = $_REQUEST['chiefcom'];
        date_default_timezone_set('Asia/Bangkok');
        $datestr = substr(date("Y-m-d H:i:s"),0,10);
        require("../mysql/unconnect.php");
        $sql= "INSERT INTO `treatment` (`TreatmentID`, `DateTreatment`, `Status`, `chiefcom`, `weight1`, `vitalsign`, `temperature`, `RR`, `CRT`, `HR`, `dehydrate`, `BCS`, `urination`, `urdetail`, `defecation`, `dedetail`, `prexdisorder`, `prextreatment`, `appetite`, `thrist`, `weight2`, `behavior`, `adverseeffect`, `aedetail`, `newprob`, `newprobdetail`, `geappear`, `gedetail`, `eye`, `eyedetail`, `nose`, `nosedetail`, `mouth`, `mouthdetail`, `ear`, `eardetail`, `lymphnode`, `lymdetail`, `larynxandtrac`, `larydetail`, `oropharynx`, `ordetail`, `thorax`, `thodetail`, `abdominal`, `abddetail`, `skincoat`, `skdetail`, `pergen`, `perdetail`, `forelimb`, `foredetail`, `hindlimb`, `hindetail`, `gastroin`, `gasdetail`, `urinarytract`, `uridetail`, `reproduct`, `reprodetail`, `muscul`, `musdetail`, `nervous`, `nerdetail`, `mental`, `mentaldetail`, `differential`, `labequip`, `finaldiagnosis`, `treatmentplan`, `clienteducation`, `BillNumber`, `TotalPrice`, `VetID`, `PetID`, `TreatmentRoomID`) 
        VALUES (NULL, '$datestr', '1', '$chiefcom', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$vetid', '$petid', '$treatmentroomid');";
        require("../mysql/connect.php");
        if(empty($result))
    {
        echo $sql;
    echo "<script>alert('ผิดพลาดในการส่งตรวจ');window.open('staffregissystem.php','_self');</script>";
    exit();
    }
    else
    {
    require("../mysql/unconnect.php");
    echo "<script>alert('ส่งตรวจสำเร็จ');window.open('staffregissystem.php','_self');</script>";
    }
    }
    else
    {
        echo "<script>alert('ไม่สามารถส่งตรวจได้เนื่องจากสัตว์เลี้ยงตัวนี้กำลังอยู่ในขั้นตอนการตรวจรักษา');window.open('staffpetinfo.php?petid=' + $petid,'_self');</script>";
    exit();
    }



?>