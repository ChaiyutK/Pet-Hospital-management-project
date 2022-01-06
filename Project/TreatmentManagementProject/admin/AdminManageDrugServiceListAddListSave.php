<?php
session_start();
if($_SESSION['type'] != "admin")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}

$drugid = $_REQUEST['drugid'];
$listid = $_REQUEST['listid'];
$dshid = $_REQUEST['dshid'];
$balance = $_REQUEST['balance'];
$unit = $_REQUEST['unit'];
$price = $_REQUEST['price'];
require("../mysql/config.php");
$sql = "INSERT INTO `drugservicelist` (`ListID`, `DshID`, `DrugID`, `Balance`, `unit`, `price`) VALUES ('$listid', '$dshid', '$drugid', '$balance', '$unit', '$price');";
echo $sql;
require("../mysql/connect.php");
if(empty($result))
{
 echo "<script>alert('เกิดข้อผิดพลาด');window.open('AdminManageDrugServiceList.php','_self')</script>";
}
require("../mysql/unconnect.php");
echo "<script>alert('เพิ่มรายการยาและบริการสำเร็จ');window.open('AdminManageDrugServiceList.php','_self')</script>";

//INSERT INTO `drugservicelist` (`ListID`, `DshID`, `DrugID`, `Balance`, `unit`, `price`) VALUES ('000001', '1', '001', '100', 'เม็ด', '50.00');
?>