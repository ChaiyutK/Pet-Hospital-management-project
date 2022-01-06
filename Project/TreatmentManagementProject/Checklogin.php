<?php
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

require("mysql/config.php");

$sql = "select * from user where user.username = '" . $username ."' and Pwd = PASSWORD('" . $password ."') and level = 1";
require("mysql/connect.php");
$record = mysqli_fetch_array($result);

if(!empty($record[1])) {
    if($record[4] == 2)
{
	session_destroy();
	echo "<script>alert('บัญชีถูกระงับการใช้งานกรุณาติดต่อผู้ดูแลระบบ');window.open('Main.php','_self')</script>";
}
	$_SESSION['name'] = $record[5].' '.$record[6];
	$_SESSION['type'] = 'admin';
	$_SESSION['userid'] = $record[0];
    
	echo "<script>alert('ยินดีต้อนรับผู้ดูแลระบบ ".$_SESSION['name']."');window.open('Main.php','_self')</script>";
	exit();
}
require("mysql/unconnect.php");

$sql = "select * from user where user.username = '" . $username ."' and Pwd = PASSWORD('" . $password ."') and level = 2";
require("mysql/connect.php");
$record = mysqli_fetch_array($result);
if(!empty($record[1])) {
	if($record[4] == 2)
	{
		session_destroy();
		echo "<script>alert('บัญชีถูกระงับการใช้งานกรุณาติดต่อผู้ดูแลระบบ');window.open('Main.php','_self')</script>";
		exit();
	}
	$_SESSION['name'] = $record[5].' '.$record[6];
	$_SESSION['type'] = 'veterinary';
	$_SESSION['userid'] = $record[0];
    
	echo "<script>alert('ยินดีต้อนรับสัตวแพทย์ ".$_SESSION['name']."');window.open('Main.php','_self')</script>";
	exit();
}
require("mysql/unconnect.php");

$sql = "select * from user where user.username = '" . $username ."' and Pwd = PASSWORD('" . $password ."') and level = 3";
require("mysql/connect.php");
$record = mysqli_fetch_array($result);
if(!empty($record[1])) {
	if($record[4] == 2)
	{
		session_destroy();
		echo "<script>alert('บัญชีถูกระงับการใช้งานกรุณาติดต่อผู้ดูแลระบบ');window.open('Main.php','_self')</script>";
	}
	$_SESSION['name'] = $record[5].' '.$record[6];
	$_SESSION['type'] = 'staff';
	$_SESSION['userid'] = $record[0];
    
	echo "<script>alert('ยินดีต้อนรับพนักงานทั่วไป ".$_SESSION['name']."');window.open('Main.php','_self')</script>";
	exit();
}
require("mysql/unconnect.php");

$sql = "select * from user where user.username = '" . $username ."' and Pwd = PASSWORD('" . $password ."') and level = 4";
require("mysql/connect.php");
$record = mysqli_fetch_array($result);
if(!empty($record[1])) {
	if($record[4] == 2)
	{
		session_destroy();
		echo "<script>alert('บัญชีถูกระงับการใช้งานกรุณาติดต่อผู้ดูแลระบบ');window.open('Main.php','_self')</script>";
	}
	$_SESSION['name'] = $record[5].' '.$record[6];
	$_SESSION['type'] = 'member';
	$_SESSION['userid'] = $record[0];
    
	echo "<script>alert('ยินดีต้อนรับสมาชิก ".$_SESSION['name']."');window.open('Main.php','_self')</script>";
	exit();
}
require("mysql/unconnect.php");

echo "<script>alert('ชื่อผู้ใช้งานหรือรหัสผ่านไม่ถูกต้อง');window.open('Main.php','_self')</script>";


?>