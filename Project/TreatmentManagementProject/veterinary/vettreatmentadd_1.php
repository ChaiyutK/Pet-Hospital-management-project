<?php
session_start();
require("../config/config.php");
require("../mysql/config.php");
if($_SESSION['type'] != "veterinary")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$userid = $_SESSION['userid'];
$treatmentid = $_REQUEST['treatmentid'];
$sql="SELECT `treatmentid`, `DateTreatment`, pet.name AS petname ,treatment.Status AS Status, `chiefcom`, `weight1`, `vitalsign`, `temperature`, `RR`, `CRT`, `HR`, `dehydrate`, `BCS`, `urination`, `urdetail`, `defecation`, `dedetail` FROM treatment,pet,pettype,user WHERE treatment.VetID = user.UserID and treatment.PetID = pet.PetID and pet.PetTypeID = pettype.PetTypeID and treatment.Status = 1 and treatmentid = '$treatmentid'";
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
      function pettreatment(rec,rec2)
      {
        window.open("vettreatmentadd.php?petid=" + rec + "&treatmentid=" + rec2 ,"_self");
      }
      function opentxtarea(rec)
      {
          if(rec == 'u')
          {
            document.getElementById("urdetail").disabled = false;
          }
          else if(rec == 'd')
          {
            document.getElementById("dedetail").disabled = false;
          }
      }
      function closetxtarea(rec)
      {
          if(rec == 'u')
          {
            document.getElementById("urdetail").disabled = true;
          }
          else if(rec == 'd')
          {
            document.getElementById("dedetail").disabled = true;
          }
      }
      function isNumber(evt) 
      {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) 
            {
                return false;
            }
        return true;
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
   <center><div class="head1">ตรวจรักษา</div></center>
   <center>
   <table width='55%' border="0" bgcolor="#FFFFFF">
   <tr>
   <td align="center" width="20%">
   <a href="#" class="btn btn-info" role="button" style="height:100%;width:100%;">ข้อมูลทั่วไป</a>
   </td>
   <td align="center" width="20%">
   <a href="vettreatmentadd_2.php?treatmentid=<?php echo $treatmentid; ?>" class="btn btn-light" role="button" style="height:100%;width:100%;">การตรวจสอบประวัติ</a>
   </td>
   <td align="center" width="20%">
   <a href="vettreatmentadd_3.php?treatmentid=<?php echo $treatmentid; ?>" class="btn btn-light" role="button" style="height:100%;width:100%;">การตรวจร่างกาย</a>
   </td>
   <td align="center" width="20%">
   <a href="vettreatmentadd_4.php?treatmentid=<?php echo $treatmentid; ?>" class="btn btn-light" role="button" style="height:100%;width:100%;">การวินิจฉัย</a>
   </td>
   </tr>
   <tr><td colspan="4">
   <form action="vettreatmentadd_1save.php" method="post">
   <input type="hidden" name="treatmentid" value="<?php echo $treatmentid; ?>">
    <table width = '100%' border = "0"  bgcolor = "#FFFFFF">
                <tr><td colspan="5" align="center">ชื่อสัตว์เลี้ยง : <input type="text" size='30' maxlength='30' value="<?php echo $record['petname'] ?>" disabled></td></tr>
                <tr>
               <td align = "right" width="20%">มาด้วยอาการอะไร : </td>
               <td width="10%"><textarea id="chiefcom" name="chiefcom" rows="3" cols="30" maxlength="255" required><?php echo $record['chiefcom']; ?></textarea></td>
               <td align = "right" width="13%">น้ำหนัก : </td>
               <td align = "left"><input type="text" size='30' maxlength='3' id="weight1" name='weight1' value="<?php echo $record['weight1'] ?>" maxlength='3' onkeypress="return isNumber(event)" required></td>
               </tr>
               <tr>
               <td align = "right" width="20%">สัญญาณชีพ : </td>
               <td width="10%"><input type="text" size='30' maxlength='30' id="vitalsign" name='vitalsign' value="<?php echo $record['vitalsign'] ?>" maxlength='3' onkeypress="return isNumber(event)" required></td>
               <td align = "right" width="13%">อัตราการหายใจ : </td>
               <td align = "left"><input type="text" size='30' maxlength='30' id="rr" name='rr' value="<?php echo $record['RR'] ?>" required></td>
               </tr>
               <tr>
               <td align = "right" width="20%">อุณหภูมิร่างกาย : </td>
               <td width="10%"><input type="text" size='30' maxlength='30' id="temperature" name='temperature' value="<?php echo $record['temperature'] ?>" maxlength='9' onkeypress="return isNumber(event)" required></td>
               <td align = "right" width="13%">อัตราการเต้นหัวใจ : </td>
               <td align = "left"><input type="text" size='30' maxlength='30' id="hr" name='hr' value="<?php echo $record['HR'] ?>" required></td>
               </tr>
               <tr>
               <td align = "right" width="20%">เวลาการคืนกลับของเลือดในหลอดเลือดฝอย (%) : </td>
               <td width="10%"><input type="text" size='30' maxlength='30' id="crt" name='crt' value="<?php echo $record['CRT'] ?>" required></td>
               <td align = "right" width="20%">ภาวะร่างกายแห้งน้ำ : </td>
               <td width="10%"><input type="text" size='30' maxlength='30' id="dehydrate" name='dehydrate' value="<?php echo $record['dehydrate'] ?>" required></td>
               </tr>
               <tr>
               <td align = "right" width="6%">BCS : </td>
               <td>
               <label>
                <input type="radio" id="bcs" name="bcs" value="1"<?=$record['BCS'] == '1' ? ' checked="checked"' : '';?> required>&nbsp;1/5
                </label>
                <label>
                  <input type="radio" id="bcs" name="bcs" value="2"<?=$record['BCS'] == '2' ? ' checked="checked"' : '';?> required>&nbsp;2/5
                </label>
                <label>
                <input type="radio" id="bcs" name="bcs" value="3"<?=$record['BCS'] == '3' ? ' checked="checked"' : '';?> required>&nbsp;3/5
                </label>
                <label>
                  <input type="radio" id="bcs" name="bcs" value="4"<?=$record['BCS'] == '4' ? ' checked="checked"' : '';?> required>&nbsp;4/5
                </label>
                <label>
                  <input type="radio" id="bcs" name="bcs" value="5"<?=$record['BCS'] == '5' ? ' checked="checked"' : '';?> required>&nbsp;5/5
                </label>
               </td>
               </tr>
               <tr>
               <td align = "right" width="6%">การถ่ายปัสสาวะ : </td>
               <td>
               <label>
                <input type="radio" id="urination" name="urination" onclick="closetxtarea('u')" value="1"<?=$record['urination'] == '1' ? ' checked="checked"' : '';?> required>&nbsp;normal
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="radio" id="urination" name="urination" onclick="opentxtarea('u')" value="2"<?=$record['urination'] == '2' ? ' checked="checked"' : '';?> required>&nbsp;abnormal
                </label>
                <br>
                <textarea id="urdetail" name="urdetail" rows="3" cols="30" maxlength="255" <?=$record['urination'] == '1' ? 'disabled="disabled"' : '';?> required><?php echo $record['urdetail']; ?></textarea>
               </td>
               </tr>
               <tr>
               <td align = "right" width="6%">การถ่ายอุจจาระ : </td>
               <td>
               <label>
                <input type="radio" id="defecation" name="defecation" onclick="closetxtarea('d')"  value="1"<?=$record['defecation'] == '1' ? ' checked="checked"' : '';?> required>&nbsp;normal
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="radio" id="defecation" name="defecation" onclick="opentxtarea('d')" value="2"<?=$record['defecation'] == '2' ? ' checked="checked"' : '';?> required>&nbsp;abnormal
                </label>
                <br>
                <textarea id="dedetail" name="dedetail" rows="3" cols="30"  maxlength="255" <?=$record['defecation'] == '1' ? 'disabled="disabled"' : '';?> required><?php echo $record['dedetail']; ?></textarea>
               </td>
               </tr>
                <tr><td colspan="4" align="center"><input type="submit" value="บันทึกข้อมูลทั่วไป"></td></tr>
        </form>
    </table>
    </td></tr>
</table>
   </center>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  

  </body>
  
</html>