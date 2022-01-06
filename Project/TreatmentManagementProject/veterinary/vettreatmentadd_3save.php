<?php
session_start();
require("../mysql/config.php");
$treatmentid = $_REQUEST['treatmentid'];
if($_SESSION['type'] != "veterinary")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$geappear = $_REQUEST['geappear'];
$eye = $_REQUEST['eye'];
$nose = $_REQUEST['nose'];
$mouth = $_REQUEST['mouth'];
$ear = $_REQUEST['ear'];
$lymphnode = $_REQUEST['lymphnode'];
$larynxandtrac = $_REQUEST['larynxandtrac'];
$oropharynx = $_REQUEST['oropharynx'];
$thorax = $_REQUEST['thorax'];
$abdominal = $_REQUEST['abdominal'];
$skincoat = $_REQUEST['skincoat'];
$pergen = $_REQUEST['pergen'];
$forelimb = $_REQUEST['forelimb'];
$hindlimb = $_REQUEST['hindlimb'];
$gastroin = $_REQUEST['gastroin'];
$urinarytract = $_REQUEST['urinarytract'];
$reproduct = $_REQUEST['reproduct'];
$muscul = $_REQUEST['muscul'];
$nervous = $_REQUEST['nervous'];
$mental = $_REQUEST['mental'];

if(empty($_REQUEST['gedetail']))
{
    $gedetail = "";
}
else
{
    $gedetail = $_REQUEST['gedetail'];
}

if(empty($_REQUEST['eyedetail']))
{
    $eyedetail = "";
}
else
{
    $eyedetail = $_REQUEST['eyedetail'];
}

if(empty($_REQUEST['nosedetail']))
{
    $nosedetail = "";
}
else
{
    $nosedetail = $_REQUEST['nosedetail'];
}

if(empty($_REQUEST['mouthdetail']))
{
    $mouthdetail = "";
}
else
{
    $mouthdetail = $_REQUEST['mouthdetail'];
}

if(empty($_REQUEST['eardetail']))
{
    $eardetail = "";
}
else
{
    $eardetail = $_REQUEST['eardetail'];
}

if(empty($_REQUEST['lymdetail']))
{
    $lymdetail = "";
}
else
{
    $lymdetail = $_REQUEST['lymdetail'];
}

if(empty($_REQUEST['larydetail']))
{
    $larydetail = "";
}
else
{
    $larydetail = $_REQUEST['larydetail'];
}

if(empty($_REQUEST['ordetail']))
{
    $ordetail = "";
}
else
{
    $ordetail = $_REQUEST['ordetail'];
}

if(empty($_REQUEST['thodetail']))
{
    $thodetail = "";
}
else
{
    $thodetail = $_REQUEST['thodetail'];
}

if(empty($_REQUEST['abddetail']))
{
    $abddetail = "";
}
else
{
    $abddetail = $_REQUEST['abddetail'];
}

if(empty($_REQUEST['skdetail']))
{
    $skdetail = "";
}
else
{
    $skdetail = $_REQUEST['skdetail'];
}

if(empty($_REQUEST['perdetail']))
{
    $perdetail = "";
}
else
{
    $perdetail = $_REQUEST['perdetail'];
}

if(empty($_REQUEST['foredetail']))
{
    $foredetail = "";
}
else
{
    $foredetail = $_REQUEST['foredetail'];
}

if(empty($_REQUEST['hindetail']))
{
    $hindetail = "";
}
else
{
    $hindetail = $_REQUEST['hindetail'];
}

if(empty($_REQUEST['gasdetail']))
{
    $gasdetail = "";
}
else
{
    $gasdetail = $_REQUEST['gasdetail'];
}

if(empty($_REQUEST['uridetail']))
{
    $uridetail = "";
}
else
{
    $uridetail = $_REQUEST['uridetail'];
}

if(empty($_REQUEST['reprodetail']))
{
    $reprodetail = "";
}
else
{
    $reprodetail = $_REQUEST['reprodetail'];
}

if(empty($_REQUEST['musdetail']))
{
    $musdetail = "";
}
else
{
    $musdetail = $_REQUEST['musdetail'];
}

if(empty($_REQUEST['nerdetail']))
{
    $nerdetail = "";
}
else
{
    $nerdetail = $_REQUEST['nerdetail'];
}

if(empty($_REQUEST['mentaldetail']))
{
    $mentaldetail = "";
}
else
{
    $mentaldetail = $_REQUEST['mentaldetail'];
}

$sql= "UPDATE `treatment` SET `geappear` = '$geappear', `gedetail` = '$gedetail', `eye` = '$eye', `eyedetail` = '$eyedetail', `nose` = '$nose', 
`nosedetail` = '$nosedetail', `mouth` = '$mouth', `mouthdetail` = '$mouthdetail', `ear` = '$ear', `eardetail` = '$eardetail', `lymphnode` = '$lymphnode', `lymdetail` = '$lymdetail', 
`larynxandtrac` = '$larynxandtrac', `larydetail` = '$larydetail', `oropharynx` = '$oropharynx', `ordetail` = '$ordetail', `thorax` = '$thorax', `thorax` = '$thorax', 
`abdominal` = '$abdominal', `abddetail` = '$abddetail', `skincoat` = '$skincoat', `skdetail` = '$skdetail', `pergen` = '$pergen', `perdetail` = '$perdetail', `forelimb` = '$forelimb', 
`foredetail` = '$foredetail', `hindlimb` = '$hindlimb', `hindetail` = '$hindetail', `gastroin` = '$gastroin', `gasdetail` = '$gasdetail', `urinarytract` = '$urinarytract', 
`uridetail` = '$uridetail', `reproduct` = '$reproduct', `reprodetail` = '$reprodetail', `muscul` = '$muscul', `musdetail` = '$musdetail', `nervous` = '$nervous', `nerdetail` = '$nerdetail', 
`mental` = '$mental', `mentaldetail` = '$mentaldetail' where treatmentid='$treatmentid'";
require("../mysql/connect.php");

if(empty($result))
{
    echo "<script>alert('ผิดพลาดในการบันทึกการตรวจร่างกาย');window.open('vettreatmentadd_3.php?treatmentid=' + '$treatmentid','_self');</script>";
   exit();
}
else
{
    require("../mysql/unconnect.php");
    echo "<script>alert('บันทึกการตรวจร่างกายสำเร็จ');window.open('vettreatmentadd_3.php?treatmentid=' + '$treatmentid','_self');</script>";
}



?>