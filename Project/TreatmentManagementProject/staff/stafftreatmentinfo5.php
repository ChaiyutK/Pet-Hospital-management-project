<?php
session_start();
require("../config/config.php");
require("../mysql/config.php");

if($_SESSION['type'] != "staff")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$userid = $_SESSION['userid'];
$petid = $_REQUEST['petid'];
$treatmentid = $_REQUEST['treatmentid'];

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
.modal-open {
    overflow: hidden;
    padding-right: 0 !important;
}
textarea {
  resize: none;
}         
      </style>
      <script>
        function TreatmentInfo(rec)
            {
                window.open("stafftreatmentinfo1.php?treatmentid=" + rec,"_self");
            }
            function Treatmentall(rec)
        {
          window.open("stafftreatmentpet.php?petid=" + rec,"_self");
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
        <a class="nav-link" href="<?php echo $staffregissystem; ?>">ระบบทะเบียน <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo $staffpaysystem; ?>">ระบบคิดเงิน <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo $staffappointment; ?>">ระบบนัดหมาย <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo $staffeditself; ?>">แก้ไขโปรไฟล์ส่วนตัว <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <span class = "badge badge-warning" style="font-family: 'TH SarabunPSK';font-weight: bold;"><h4><?php echo $_SESSION['name'] . "&nbsp;พนักงานทั่วไป" ."&nbsp;
    <a href = '../logout.php'>logout</a>" ?></h4></span>
  </div>
</nav>
<br>
<center><div class="head1">รายละเอียดการตรวจรักษา</div></center>
   <center>
   <table width='55%' border="0" bgcolor="#FFFFFF">
   <tr>
   <td align="center" width="20%">
   <a href="stafftreatmentinfo1.php?treatmentid=<?php echo $treatmentid; ?>&petid=<?php echo $petid; ?>" class="btn btn-light" role="button" style="height:100%;width:100%;">ข้อมูลทั่วไป</a>
   </td>
   <td align="center" width="20%">
   <a href="stafftreatmentinfo2.php?treatmentid=<?php echo $treatmentid; ?>&petid=<?php echo $petid; ?>" class="btn btn-light" role="button" style="height:100%;width:100%;">การตรวจสอบประวัติ</a>
   </td>
   <td align="center" width="20%">
   <a href="stafftreatmentinfo3.php?treatmentid=<?php echo $treatmentid; ?>&petid=<?php echo $petid; ?>" class="btn btn-light" role="button" style="height:100%;width:100%;">การตรวจร่างกาย</a>
   </td>
   <td align="center" width="20%">
   <a href="stafftreatmentinfo4.php?treatmentid=<?php echo $treatmentid; ?>&petid=<?php echo $petid; ?>" class="btn btn-light" role="button" style="height:100%;width:100%;">การวินิจฉัย</a>
   </td>
   <td align="center" width="20%">
   <a href="stafftreatmentinfo5.php?treatmentid=<?php echo $treatmentid; ?>&petid=<?php echo $petid; ?>" class="btn btn-info" role="button" style="height:100%;width:100%;">คำแนะนำและจ่ายยา</a>
   </td>
   </tr>
   <tr><td colspan="5">
   <input type="hidden" name="treatmentid" value="<?php echo $treatmentid; ?>">
   <table class="table table-hover" border="1" bgcolor="#FFFFFF">
<thead class="thead-dark">
   <tr bgcolor = "#d5f4e6" align="center">
    <th colspan="8">
    รายการจ่ายยา
    </th>
   </tr>
    <tr align="center">
        <th>ลำดับ</th>
        <th>รหัสรายการ</th>
        <th>ผู้ผลิต</th>
        <th>ชื่อยา</th>
        <th>จำนวน</th>
        <th>หน่วย</th>
        <th>ราคาต่อหน่วย</th>
        <th>เป็นเงิน</th>
    </tr>
    </thead>
    
        <?php
          $count = 0;  
        $price = 0;
        $sql = "SELECT dtid, dispensetransection.ListID AS listid ,dispensetransection.TreatmentID AS treatmentid,drugserviceinfo.Name AS drugname ,drugservicelist.price,manufacturer.CompanyName AS companyname,drugservicelist.unit AS unit,amount,treatment.status AS status FROM dispensetransection,drugservicelist,treatment,drugserviceinfo,manufacturer WHERE dispensetransection.ListID = drugservicelist.ListID and dispensetransection.TreatmentID = treatment.TreatmentID and drugservicelist.DrugID = drugserviceinfo.DrugID and manufacturer.ManufactID = drugserviceinfo.manufactid and dispensetransection.TreatmentID = '$treatmentid' and treatment.status = 4";
        require("../mysql/connect.php");
      
        while($row = mysqli_fetch_array($result))
        {
        
        $count++;
          echo "<tr align='center'>";
          echo "<td>$count</td>";
          echo "<td>$row[listid]</td>";
          echo "<td>$row[companyname]</td>";
          echo "<td>$row[drugname]</td>";
          echo "<td>$row[amount]</td>";
          echo "<td>$row[unit]</td>";
          echo "<td>$row[price]</td>";
          $priceu = floatval($row['price'] * $row['amount']);
          echo "<td>$priceu</td>";

          $price = $price + ($row['price'] * $row['amount']);
        ?>
        </td>
         <?php
          echo "</tr>";
        }
        ?>
        <tr><td colspan="8">ราคารวม : <?php echo $price; ?> บาท</td></tr>
</table>
<?php 
require("../mysql/unconnect.php");
    $sql="SELECT `treatmentid`, treatment.petid AS petid ,`DateTreatment`, pet.name AS petname ,treatment.Status AS Status, `differential`, `labequip`, `finaldiagnosis`, finaldiagnosis2,finaldiagnosis3 ,`treatmentplan`, `clienteducation` FROM treatment,pet,pettype,user WHERE treatment.VetID = user.UserID and treatment.PetID = pet.PetID and pet.PetTypeID = pettype.PetTypeID and treatment.Status = 4 and treatmentid = '$treatmentid'";
    require("../mysql/connect.php");
$record = mysqli_fetch_array($result); ?>
    </td></tr>
    <tr><td colspan="8">คำแนะนำเจ้าของสัตว์เลี้ยง : <?php echo $record['clienteducation']; ?></td></tr>
</table>
<button class="btn btn-info" onclick="Treatmentall('<?php echo $petid; ?>')">กลับ</button>
   </center>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            
    

  
  </body>
    
</html>
