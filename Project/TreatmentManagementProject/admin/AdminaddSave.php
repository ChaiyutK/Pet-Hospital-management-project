<?php
require("../mysql/config.php");

session_start();
$username = $_REQUEST['Username'];
$sql = "select username from user where username='$username'";
require("../mysql/connect.php");
$record = mysqli_fetch_array($result);
if(!empty($record['username']))
{
  echo "<script>alert('มีชื่อผู้ใช้งานนี้แล้วกรุณาเปลี่ยนชื่อผู้ใช้งานด้วย');window.open('AdminAddUser.php','_self');</script>";
  exit();
}
else
{
$password = $_REQUEST['Pwd'];
$level = $_REQUEST['level'];
$Hnumber = $_REQUEST['Hnumber'];
$Fname = $_REQUEST['Fname'];
$Sname = $_REQUEST['Sname'];
$Village = $_REQUEST['Village'];
$Alley = $_REQUEST['Alley'];
$Road = $_REQUEST['Road'];
$District = $_REQUEST['District'];
$Canton = $_REQUEST['Canton'];
$province = $_REQUEST['province'];
$Postnumber = $_REQUEST['Postnumber'];
$Hpnumber = $_REQUEST['Hpnumber'];
$Phonenumber = $_REQUEST['Phonenumber'];
$Email = $_REQUEST['Email'];
$sql= "INSERT INTO `user` (`UserID`, `Username`, `Pwd`, `level`, `Status`, `Name`, `Surname`, `Hnumber`, `Village`, `Alley`, `Road`, `District`, 
`Canton`, `Province`, `Postnumber`, `Hpnumber`, `Phonenumber`, `Email`) VALUES (NULL, '$username', PASSWORD('$password'), $level, '1', '$Fname', 
'$Sname', '$Hnumber', '$Village', '$Alley', '$Road', '$District', '$Canton', '$province', '$Postnumber', '$Hpnumber', '$Phonenumber', '$Email')";

  //$sql="insert into user values('$username',PASSWORD('$password'),$level)";
require("../mysql/connect.php");
}
if(empty($result))
{
    echo "<script>alert('ผิดพลาด');window.open('AdminAddUser.php','_self');</script>";
    exit();
}
require("../mysql/unconnect.php");

    echo "<script>alert('บันทึกข้อมูลสำเร็จ');window.open('admin.php','_self');</script>";
require("../mysql/unconnect.php");


?>