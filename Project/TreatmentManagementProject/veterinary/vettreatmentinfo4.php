<?php
session_start();
require("../config/config.php");
require("../mysql/config.php");
if($_SESSION['type'] != "veterinary")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$userid = $_SESSION['userid'];
$petid = $_REQUEST['petid'];
$treatmentid = $_REQUEST['treatmentid'];
$sql="SELECT `treatmentid`, treatment.petid AS petid ,`DateTreatment`, pet.name AS petname ,treatment.Status AS Status, `differential`, `labequip`, `finaldiagnosis`,finaldiagnosis2,finaldiagnosis3, `treatmentplan`, `clienteducation` FROM treatment,pet,pettype,user WHERE treatment.VetID = user.UserID and treatment.PetID = pet.PetID and pet.PetTypeID = pettype.PetTypeID and treatment.Status = 4 and treatmentid = '$treatmentid'";
require("../mysql/connect.php");
$record = mysqli_fetch_array($result);
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
      function TreatmentInfo(rec)
            {
                window.open("vettreatmentinfo1.php?treatmentid=" + rec ,"_self");
            }
            function Treatmentall(rec)
        {
          window.open("vettreatmentpet.php?petid=" + rec,"_self");
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
<center><div class="head1">รายละเอียดการตรวจรักษา</div></center>
   <center>
   <table width='55%' border="0" bgcolor="#FFFFFF">
   <tr>
   <td align="center" width="20%">
   <a href="vettreatmentinfo1.php?treatmentid=<?php echo $treatmentid; ?>&petid=<?php echo $petid; ?>" class="btn btn-light" role="button" style="height:100%;width:100%;">ข้อมูลทั่วไป</a>
   </td>
   <td align="center" width="20%">
   <a href="vettreatmentinfo2.php?treatmentid=<?php echo $treatmentid; ?>&petid=<?php echo $petid; ?>" class="btn btn-light" role="button" style="height:100%;width:100%;">การตรวจสอบประวัติ</a>
   </td>
   <td align="center" width="20%">
   <a href="vettreatmentinfo3.php?treatmentid=<?php echo $treatmentid; ?>&petid=<?php echo $petid; ?>" class="btn btn-light" role="button" style="height:100%;width:100%;">การตรวจร่างกาย</a>
   </td>
   <td align="center" width="20%">
   <a href="vettreatmentinfo4.php?treatmentid=<?php echo $treatmentid; ?>&petid=<?php echo $petid; ?>" class="btn btn-info" role="button" style="height:100%;width:100%;">การวินิจฉัย</a>
   </td>
   <td align="center" width="20%">
   <a href="vettreatmentinfo5.php?treatmentid=<?php echo $treatmentid; ?>&petid=<?php echo $petid; ?>" class="btn btn-light" role="button" style="height:100%;width:100%;">คำแนะนำและจ่ายยา</a>
   </td>
   </tr>
   <tr><td colspan="5">
   <input type="hidden" name="treatmentid" value="<?php echo $treatmentid; ?>">
   <table width = '100%' border = "0"  bgcolor = "#FFFFFF">
                <tr><td colspan="4" align="center" width="50%">ชื่อสัตว์เลี้ยง : <input type="text" size='30' maxlength='30' value="<?php echo $record['petname']; ?>" disabled><br></td></tr>
                <tr>
               <td align = "right" valign="top" colspan="2">การวินิจฉัยแยกโรค : </td>
               <td>
                <textarea id="differential" name="differential" rows="3" cols="30"  maxlength="255" required disabled><?php echo $record['differential']; ?></textarea>
               </td>
               </tr>
               <tr>
               <td align = "right" valign="top" colspan="2">อุปกรณ์และแลป : </td>
               <td>
                <textarea id="labequip" name="labequip" rows="3" cols="30"  maxlength="255" required disabled><?php echo $record['labequip']; ?></textarea>
               </td>
               </tr>
               <tr>
               <td align = "right" valign="top" colspan="2">การวินัจฉัยโรคขั้นสุดท้าย : </td>
               <td>1 :&nbsp;
               <select id="finaldiagnosis" name="finaldiagnosis" required disabled>
               <option value="">กรุณาเลือกโรค</option>
               <?php 
               $sql2="select diseaseid,name from disease";
               $disease = mysqli_query($connect, $sql2);
               while($row=mysqli_fetch_array($disease)){
                 ?>
               <option value='<?php echo $row['diseaseid']; ?>'<?=$row['diseaseid'] == $record['finaldiagnosis'] ? ' selected="selected"' : '';?>><?php echo $row['name']; ?></option>
               <?php
            }
               ?>
               </select>
               </td>
               </tr>
               <tr>
               <td align = "right" valign="top" colspan="2"></td>
               <td>2 :&nbsp;
               <select id="finaldiagnosis2" name="finaldiagnosis2" disabled>
               <option value="">กรุณาเลือกโรค</option>
               <?php 
               $sql2="select diseaseid,name from disease";
               $disease = mysqli_query($connect, $sql2);
               while($row=mysqli_fetch_array($disease)){
                ?>
              <option value='<?php echo $row['diseaseid']; ?>'<?=$row['diseaseid'] == $record['finaldiagnosis2'] ? ' selected="selected"' : '';?>><?php echo $row['name']; ?></option>
              <?php
           }
              ?>
               </select>
               </td>
               </tr>
               <tr>
               <td align = "right" valign="top" colspan="2"></td>
               <td>3 :&nbsp;
               <select id="finaldiagnosis3" name="finaldiagnosis3" disabled>
               <option value="">กรุณาเลือกโรค</option>
               <?php 
               $sql2="select diseaseid,name from disease";
               $disease = mysqli_query($connect, $sql2);
               while($row=mysqli_fetch_array($disease)){
                ?>
              <option value='<?php echo $row['diseaseid']; ?>'<?=$row['diseaseid'] == $record['finaldiagnosis3'] ? ' selected="selected"' : '';?>><?php echo $row['name']; ?></option>
              <?php
           }
              ?>
               </select>
               </td>
               </tr>
               <tr>
               <td align = "right" valign="top" colspan="2">แผนการรักษา : </td>
               <td>
                <textarea id="treatmentplan" name="treatmentplan" rows="3" cols="30"  maxlength="255" required disabled><?php echo $record['treatmentplan']; ?></textarea>
               </td>
               </tr>
               <tr>
               <tr>
               <td align = "right" valign="top" colspan="2">คำแนะนำลูกค้า : </td>
               <td>
                <textarea id="clienteducation" name="clienteducation" rows="3" cols="30"  maxlength="255" required disabled><?php echo $record['clienteducation']; ?></textarea>
               </td>
               </tr>
    </table>
    </td></tr>
</table>
<button class="btn btn-info" onclick="Treatmentall('<?php echo $petid; ?>')">กลับ</button>
   </center>
<br>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  

  </body>
  
</html>