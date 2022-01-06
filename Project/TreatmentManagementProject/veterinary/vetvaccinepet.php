<?php
session_start();
require("../config/config.php");
require("../mysql/config.php");
if($_SESSION['type'] != "veterinary")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
if(!empty($_REQUEST['page']))
  {
    $page=$_REQUEST['page'];
  }
  else
  {
    $page=1;
  }
  $pageprocess=($page*5)-5;
  $petid = $_REQUEST['petid'];
$sql2 = "SELECT dtid, datetreatment ,dispensetransection.ListID AS listid ,dispensetransection.TreatmentID AS treatmentid,
drugserviceinfo.Name AS drugname ,drugservicelist.price AS price,manufacturer.CompanyName AS companyname,
drugservicelist.unit AS unit,amount,treatment.status AS status,datetreatment,user.name AS vetname,drugserviceinfo.drugid AS drugid 
FROM dispensetransection,drugservicelist,treatment,drugserviceinfo,manufacturer,user,drugservicecatagory WHERE user.userid = treatment.vetid and dispensetransection.ListID = drugservicelist.ListID and dispensetransection.TreatmentID = treatment.TreatmentID 
and drugservicelist.DrugID = drugserviceinfo.DrugID and manufacturer.ManufactID = drugserviceinfo.manufactid and treatment.status = 4 and treatment.petid = '$petid' and drugserviceinfo.DcID = drugservicecatagory.DcID and drugservicecatagory.type = 3 order by dtid";
$sql = "SELECT dtid, datetreatment ,dispensetransection.ListID AS listid ,dispensetransection.TreatmentID AS treatmentid,
drugserviceinfo.Name AS drugname ,drugservicelist.price AS price,manufacturer.CompanyName AS companyname,
drugservicelist.unit AS unit,amount,treatment.status AS status,datetreatment,user.name AS vetname,drugserviceinfo.drugid AS drugid 
FROM dispensetransection,drugservicelist,treatment,drugserviceinfo,manufacturer,user,drugservicecatagory WHERE user.userid = treatment.vetid and dispensetransection.ListID = drugservicelist.ListID and dispensetransection.TreatmentID = treatment.TreatmentID 
and drugservicelist.DrugID = drugserviceinfo.DrugID and manufacturer.ManufactID = drugserviceinfo.manufactid and treatment.status = 4 and treatment.petid = '$petid' and drugserviceinfo.DcID = drugservicecatagory.DcID and drugservicecatagory.type = 3 order by dtid limit $pageprocess,5";

    $i=0;
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ระบบจัดการการตรวจรักษา</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <style>
body {
  background-image: url("<?php echo $bgimage; ?>");
  background-repeat: no-repeat;
    background-size: 120% auto;
}
h3 {
    font-family: "TH SarabunPSK";
}
.head1 {
  font-family: "TH SarabunPSK";
  font-size: 60px;
}
.btmenu {
 margin: 5%;
}    
      </style>
        <script>
      function PetInfo(rec)
            {
                window.open("vetpetinfo.php?petid=" + rec ,"_self");
            }
      </script>
  </head>
  <body>
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?php echo $home; ?>">ระบบจัดการการตรวจรักษา</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo $vetregissystem; ?>">ระบบทะเบียน <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo $vettreatment; ?>">ระบบตรวจรักษา <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo $vetpaydrug; ?>">ระบบจ่ายยา <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo $vetappointment; ?>">ระบบนัดหมาย <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo $vetdrugservice; ?>">ระบบคลังยาและบริการ <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo $veteditself; ?>">แก้ไขโปรไฟล์ส่วนตัว <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <span class = "badge badge-warning" style="font-family: 'TH SarabunPSK';font-weight: bold;"><h4><?php echo $_SESSION['name'] . "&nbsp;สัตวแพทย์" ."&nbsp;
    <a href = '../logout.php'>logout</a>" ?></h4></span>
  </div>
</nav>
<br><br>
<center><div class="head1">ข้อมูลสัตว์เลี้ยง</div></center>
   <center>
   <table width='55%' border="0" bgcolor="#FFFFFF">
   <tr>
   <td align="center" width="20%">
   <a href="vetpetinfo.php?petid=<?php echo $petid; ?>" class="btn btn-light" role="button" style="height:100%;width:100%;">ข้อมูลสัตว์เลี้ยง</a>
   </td>
   <td align="center" width="20%">
   <a href="vettreatmentpet.php?petid=<?php echo $petid; ?>" class="btn btn-light" role="button" style="height:100%;width:100%;">ประวัติการรักษา</a>
   </td>
   <td align="center" width="20%">
   <a href="vetvaccinepet.php?petid=<?php echo $petid; ?>" class="btn btn-info" role="button" style="height:100%;width:100%;">ประวัติการฉีดวัคซีน</a>
   </td>
   <td align="center" width="20%">
   <a href="vetpetandowner.php?petid=<?php echo $petid; ?>" class="btn btn-light" role="button" style="height:100%;width:100%;">ข้อมูลเจ้าของสัตว์เลี้ยง</a>
   </td>
   <td align="center" width="20%">
   <a href="vetpetappointmentsearch.php?petid=<?php echo $petid; ?>" class="btn btn-light" role="button" style="height:100%;width:100%;">นัดหมาย</a>
   </td>
   </tr>
   <tr><td colspan="5">
   <input type="hidden" name="petid" value="<?php echo $petid; ?>">
   <table class="table table-hover" border="2" bgcolor="#FFFFFF">
<thead class="thead-dark">
    <tr align="center">
        <th>ลำดับ</th>
        <th>รหัสยาและบริการ</th>
        <th>ชื่อยาและบริการ</th>
        <th>วันที่ฉีด</th>
        <th>สัตวแพทย์</th>
    </tr>
    </thead>
    
        <?php
        
        $count = 0;
    
        require("../mysql/connect.php");
        
        while($row = mysqli_fetch_array($result))
        {
        $count++;
          echo "<tr align='center'>";
          echo "<td>$count</td>";
          echo "<td>$row[drugid]</td>";
          echo "<td>$row[drugname]</td>";
          $y=substr($row['datetreatment'],0,4);
          $m=substr($row['datetreatment'],5,2);
          $d=substr($row['datetreatment'],8,2);
          echo "<td>$d/$m/$y</td>";
          echo "<td>$row[vetname]</td>";

          
        ?>
        </td>
         <?php
          echo "</tr>";
        }
        ?>
        <tfoot>
        <tr><td colspan=6 align="center"><?php
        require("../mysql/unconnect.php");
        $sql=$sql2;
        require("../mysql/connect.php");
        $x=mysqli_num_rows($result);
         $count2=ceil($x/5);
         $count=0;
         for($i=1;$i<=$count2;$i++)
         {
          
           ?>
            <a href='vetvaccinepet.php?count=<?php echo $count; ?>&page=<?php echo $i; ?>&petid=<?php echo $petid; ?>'><?php echo $i; ?>&nbsp;</a>
            <?php
          
            $count+=5;
         }
        ?></td></tr>
        </tfoot>
</table>
    </td></tr>
</table>
<br>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  

  </body>
  
</html>