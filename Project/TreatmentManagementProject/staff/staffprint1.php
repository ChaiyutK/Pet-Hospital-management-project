<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    
</head>
<body>
<?php
session_start();
date_default_timezone_set('Asia/Bangkok');
$datestr = substr(date("Y-m-d H:i:s"),0,10);
include_once '../vendor/autoload.php';
require("../mysql/config.php");
$mpdf = new \Mpdf\Mpdf();
$yearstr = $_REQUEST['year'];
$year = $yearstr+543;
$content = '
<style>
body{
    font-family: "Garuda";
    font-size: 12pt;
}
.vrt-header th {
    writing-mode: vertical-lr;
    min-width: 50px; /* for firefox */
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

<table border="1" width="100%" class="vrt-header">
<tr><td colspan="15" align="center">รายงานจำนวนสัตว์ป่วยที่เข้ารับการรักษาในสถานพยาบาลสัตว์</td></tr>
<tr><td colspan="15" align="center">ระหว่างวันที่ ๑ มกราคม - ๓๑ ธันวาคม พ.ศ. '. $year .'</td></tr>
<tr><th rowspan="2" colspan="2" width="5%" align="center">ชนิดสัตว์ (ระบุ)</th><th colspan="13">จำนวนตัว</th></tr>
<tr><th>มกราคม</th><th>กุมภาพันธ์</th><th>มีนาคม</th><th>เมษายน</th><th>พฤษภาคม</th>
<th>มิถุนายน</th><th>กรกฎาคม</th><th>สิงหาคม</th><th>กันยายน</th><th>ตุลาคม</th>
<th>พฤศจิกายน</th><th>ธันวาคม</th><th>รวม</th></tr>
';

$count = 1;
$counttype = 0;
$pettype = [];
$sql = "select name from pettype";
require("../mysql/connect.php");
while($row = mysqli_fetch_array($result)) {
    
    $pettype[$counttype] = $row['name'];
    $counttype = $counttype + 1;
}
$i = 0;
//$year = $_REQUEST['year'];


//$yearstr=substr($datestr,0,4);
$countnum=0;
$countnumsum=0;
for($i = 0;$i<$counttype;$i++)
{
$content .= '<tr><td>'.$count.'</td>
<td width="10%">'.$pettype[$i].'</td>
';

for($j=1;$j<=13;$j++)
{
    require("../mysql/unconnect.php");
$sql = "select datetreatment,pet.petid AS petid,pettype.name as typename from treatment,pet,pettype where treatment.petid = pet.petid and pet.pettypeid = pettype.pettypeid GROUP BY pet.petid";
require("../mysql/connect.php");
while($row = mysqli_fetch_array($result)) {
    if($pettype[$i] == $row['typename'])
    {
        $y=substr($row['datetreatment'],0,4);
        $m=substr($row['datetreatment'],5,2);
        if($yearstr == $y)
        {
            if($j==1)
            {
                if($m == '01')
                {
                    $countnum = $countnum +1;
                    $countnumsum = $countnumsum +1;
                }
            }
            if($j==2)
            {
                if($m == '02')
                {
                    $countnum = $countnum +1;
                    $countnumsum = $countnumsum +1;
                }
            }
            if($j==3)
            {
                if($m == '03')
                {
                    $countnum = $countnum +1;
                    $countnumsum = $countnumsum +1;
                }
            }
            if($j==4)
            {
                if($m == '04')
                {
                    $countnum = $countnum +1;
                    $countnumsum = $countnumsum +1;
                }
            }
            if($j==5)
            {
                if($m == '05')
                {
                    $countnum = $countnum +1;
                    $countnumsum = $countnumsum +1;
                }
            }
            if($j==6)
            {
                if($m == '06')
                {
                    $countnum = $countnum +1;
                    $countnumsum = $countnumsum +1;
                }
            }
            if($j==7)
            {
                if($m == '07')
                {
                    $countnum = $countnum +1;
                    $countnumsum = $countnumsum +1;
                }
            }
            if($j==8)
            {
                if($m == '08')
                {
                    $countnum = $countnum +1;
                    $countnumsum = $countnumsum +1;
                }
            }
            if($j==9)
            {
                if($m == '09')
                {
                    $countnum = $countnum +1;
                    $countnumsum = $countnumsum +1;
                }
            }
            if($j==10)
            {
                if($m == '10')
                {
                    $countnum = $countnum +1;
                    $countnumsum = $countnumsum +1;
                }
            }
            if($j==11)
            {
                if($m == '11')
                {
                    $countnum = $countnum +1;
                    $countnumsum = $countnumsum +1;
                }
            }
            if($j==12)
            {
                if($m == '12')
                {
                    $countnum = $countnum +1;
                    $countnumsum = $countnumsum +1;
                }
            }
            
        }  
    }

}
if($j != 13)
{
    $content .= '<td>'.$countnum.'</td>';
}
else if($j == 13)
{
    $content .= '<td>'.$countnumsum.'</td>';
}

$countnum = 0;

}
$countnumsum =0;
$count = $count+1;
$content .= '</tr>';
}
$content .= '</table>';


$mpdf->WriteHTML($content);

$mpdf->Output();
?>
</body>
</html>