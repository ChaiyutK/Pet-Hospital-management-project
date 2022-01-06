<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
    session_start();
    $treatmentid = $_REQUEST['treatmentid'];
    $cashget = $_REQUEST['cashget'];
    $cashback = $_REQUEST['cashback'];
include_once '../vendor/autoload.php';
require("../mysql/config.php");
$sql = "SELECT pet.name AS petname,pet.petid AS petid,treatmentid,pettype.name AS pettype,gender,billnumber 
from treatment,pet,pettype where pet.pettypeid = pettype.pettypeid and treatment.petid = pet.petid and 
treatmentid = '$treatmentid'";
require("../mysql/connect.php");  
$row = mysqli_fetch_array($result);  
if($row['gender'] == 1)
{
    $gender = "เพศผู้";
}
else
{
    $gender = "เพศเมีย";
}
$mpdf = new \Mpdf\Mpdf();
$content = '
<style>
body{
    font-family: "Garuda";
    font-size: 12pt;
}
.head
{
    font-size: 18pt;
}
.headoption
{
    font-size: 10pt;
}
.downline
{
    font-size: 11pt;
}
</style>
<span class="head">หจก.โรงพยาบาลหมอสุรศักดิ์และเพื่อน</span>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span class="headoption">เลขที่รักษา : '.$row['treatmentid'].'</span>
<br>
<span class="headoption">ใบเสร็จรับเงิน</span>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span class="headoption">เลขที่ใบเสร็จ : '.$row['billnumber'].'</span>
<br>
<span class="headoption">รหัสสัตว์เลี้ยง : '.$row['petid'].'</span>
<br>
<span class="headoption">&nbsp;&nbsp;ชื่อสัตว์เลี้ยง : '.$row['petname'].'</span>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span class="headoption">&nbsp;&nbsp;ประเภทสัตว์เลี้ยง : '.$row['pettype'].'</span>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span class="headoption">&nbsp;&nbsp;เพศ : '.$gender.'</span>
<table border="1" width = "100%" align ="center">
<tr>
<th width="10%">ลำดับ</th>
<th width="20%">รหัสรายการ</th>
<th width="20%">ชื่อ</th>
<th width="10%">จำนวน</th>
<th width="10%">หน่วย</th>
<th width="15%">ราคาต่อหน่วย</th>
<th width="15%">เป็นเงิน</th>
</tr>
</table>
<table border=0 width = "100%" align ="center">';
$count = 0;  
$price = 0;
require("../mysql/unconnect.php");
$sql = "SELECT dtid, dispensetransection.ListID AS listid ,dispensetransection.TreatmentID AS treatmentid,drugserviceinfo.Name AS drugname ,drugservicelist.price AS price,manufacturer.CompanyName AS companyname,drugservicelist.unit AS unit,amount,treatment.status AS status FROM dispensetransection,drugservicelist,treatment,drugserviceinfo,manufacturer WHERE dispensetransection.ListID = drugservicelist.ListID and dispensetransection.TreatmentID = treatment.TreatmentID and drugservicelist.DrugID = drugserviceinfo.DrugID and manufacturer.ManufactID = drugserviceinfo.manufactid and dispensetransection.TreatmentID = '$treatmentid' and treatment.status = 4";
require("../mysql/connect.php");
while($row = mysqli_fetch_array($result)) {
    $count = $count + 1;
    $priceu = floatval($row['price'] * $row['amount']);
    $price = $price + ($row['price'] * $row['amount']);
$content .= '<tr>
<td width="10%">'.$count.'</td>
 <td width="20%">'.$row['listid'].'</td>
 <td width="20%">'.$row['drugname'].'</td>
 <td width="10%">'.$row['amount'].'</td>
 <td width="10%">'.$row['unit'].'</td>
 <td width="15%">'.$row['price'].'</td>
 <td width="15%">'.$priceu.'</td>
 </tr>

';
}
$content .= '</table><hr>
<table border="0" width="100%">
<tr>
<td width="20%">ราคารวม : </td>
<td width="10%"> </td>
<td width="20%"> </td>
<td width="10%"> </td>
<td width="10%"> </td>
<td width="15%"> </td>
<td width="15%">'.$price.'</th>
</tr>
<tr>
<td width="20%">รับเงินมา : </td>
<td width="10%"> </td>
<td width="20%"> </td>
<td width="10%"> </td>
<td width="10%"> </td>
<td width="15%"> </td>
<td width="15%">'.$cashget.'</th>
</tr>
<tr>
<td width="20%">ทอน : </td>
<td width="10%"> </td>
<td width="20%"> </td>
<td width="10%"> </td>
<td width="10%"> </td>
<td width="15%"> </td>
<td width="15%">'.$cashback.'</th>
</tr>     
</table><hr>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span class="headoption" align="center">เพื่อเป็นการประกันคุณภาพยาขอสงวนสิทธิ์ไม่รับเปลี่ยนยาคืน</span>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="headoption">...........................................</span>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span class="headoption">...........................................</span>
<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="downline">เจ้าของสัตว์เลี้ยง</span>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<span class="downline">พนักงานทั่วไป</span>
<br>
<span class="headoption">1578 ถนน กาญจนวณิชย์ ตำบล หาดใหญ่ อำเภอหาดใหญ่ จังหวัดสงขลา 90110 Tel 074241686-7 Fax 074-241688</span>
<br>
<span class="headoption">เวลาทำการ ทุกวัน 8.30 - 20.30 น.</span>
';
$mpdf->WriteHTML($content);

$mpdf->Output();
?>
</body>
</html>