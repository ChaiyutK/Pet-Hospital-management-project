<?php
session_start();
require("../mysql/config.php");
if($_SESSION['type'] != "staff")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$selectreport = $_REQUEST['selectreport'];
$year=$_REQUEST['year'];
if($selectreport == 1)
{
    echo "<script>window.open('staffprint1.php?year=' + $year,'_self');</script>";
    exit();
}
else if($selectreport == 2)
{
    
    echo "<script>window.open('staffprint2.php?year=' + $year,'_self');</script>";
}
else if($selectreport == 3)
{
    
    echo "<script>window.open('staffprint3.php?year=' + $year,'_self');</script>";
}
else if($selectreport == 4)
{
    
    echo "<script>window.open('staffprint4.php?year=' + $year,'_self');</script>";
}
else if($selectreport == 5)
{
    
    echo "<script>window.open(staffprint5.php?year=' + $year,'_self');</script>";
}
else if($selectreport == 6)
{
    
    echo "<script>window.open('staffprint6.php?year=' + $year,'_self');</script>";
}


?>