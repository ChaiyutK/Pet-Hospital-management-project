<?php
session_start();
require("../config/config.php");
require("../mysql/config.php");
if($_SESSION['type'] != "veterinary")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$treatmentid = $_REQUEST['treatmentid'];
$petid = $_REQUEST['petid'];
$sql="SELECT `treatmentid`,  treatment.petid AS petid  ,`DateTreatment`, pet.name AS petname ,treatment.Status AS Status, `prexdisorder`, `weight2`, `prextreatment`,
 appetite,thrist,`behavior`, `adverseeffect`, `aedetail`, `newprob`, `newprobdetail` FROM treatment,pet,pettype,user WHERE treatment.VetID = user.UserID and treatment.PetID = pet.PetID and pet.PetTypeID = pettype.PetTypeID and treatment.Status = 4 and treatmentid = '$treatmentid'";
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
   <a href="vettreatmentinfo2.php?treatmentid=<?php echo $treatmentid; ?>&petid=<?php echo $petid; ?>" class="btn btn-info" role="button" style="height:100%;width:100%;">การตรวจสอบประวัติ</a>
   </td>
   <td align="center" width="20%">
   <a href="vettreatmentinfo3.php?treatmentid=<?php echo $treatmentid; ?>&petid=<?php echo $petid; ?>" class="btn btn-light" role="button" style="height:100%;width:100%;">การตรวจร่างกาย</a>
   </td>
   <td align="center" width="20%">
   <a href="vettreatmentinfo4.php?treatmentid=<?php echo $treatmentid; ?>&petid=<?php echo $petid; ?>" class="btn btn-light" role="button" style="height:100%;width:100%;">การวินิจฉัย</a>
   </td>
   <td align="center" width="20%">
   <a href="vettreatmentinfo5.php?treatmentid=<?php echo $treatmentid; ?>&petid=<?php echo $petid; ?>" class="btn btn-light" role="button" style="height:100%;width:100%;">คำแนะนำและจ่ายยา</a>
   </td>
   </tr>
   <tr><td colspan="5">
   <input type="hidden" name="treatmentid" value="<?php echo $treatmentid; ?>">
   <table width = '100%' border = "0"  bgcolor = "#FFFFFF">
                <tr><td colspan="5" align="center">ชื่อสัตว์เลี้ยง : <input type="text" size='30' maxlength='30' value="<?php echo $record['petname']; ?>" disabled></td></tr>
                <tr>
               <td align = "right" width="20%">ความผิดปกติก่อนหน้า : </td>
               <td width="10%"><textarea id="prexdisorder" name="prexdisorder" rows="3" cols="30" maxlength="255" disabled><?php echo $record['prexdisorder']; ?></textarea></td>
               <td align = "right" width="13%">การรักษาก่อนหน้า : </td>
               <td align = "left"><textarea id="prextreatment" name="prextreatment" rows="3" cols="30" maxlength="255" disabled><?php echo $record['prextreatment']; ?></textarea></td>
               </tr>
               <tr>
               <td align = "right" width="6%">ความอยากอาหาร : </td>
               <td>
               <label>
                <input type="radio" id="appetite" name="appetite" value="1"<?=$record['appetite'] == '1' ? ' checked="checked"' : '';?> disabled>&nbsp;normal
                </label>
                <label>
                  <input type="radio" id="appetite" name="appetite" value="2"<?=$record['appetite'] == '2' ? ' checked="checked"' : '';?> disabled>&nbsp;In appetite
                </label>
                <label>
                  <input type="radio" id="appetite" name="appetite" value="3"<?=$record['appetite'] == '3' ? ' checked="checked"' : '';?> disabled>&nbsp;Anorexia
                </label>
               </td>
               </tr>
               <tr>
               <td align = "right" width="6%">ความกระหาย : </td>
               <td>
               <label>
                <input type="radio" id="thrist" name="thrist" onclick="closetxtarea('u')" value="1"<?=$record['thrist'] == '1' ? ' checked="checked"' : '';?> disabled>&nbsp;normal
                </label>
                <label>
                  <input type="radio" id="thrist" name="thrist" onclick="opentxtarea('u')" value="2"<?=$record['thrist'] == '2' ? ' checked="checked"' : '';?> disabled>&nbsp;increase
                </label>
                <label>
                  <input type="radio" id="thrist" name="thrist" onclick="opentxtarea('u')" value="3"<?=$record['thrist'] == '3' ? ' checked="checked"' : '';?> disabled>&nbsp;decrease
                </label>
               </td>
               </tr>
               <tr>
               <td align = "right" width="6%">น้ำหนัก : </td>
               <td>
               <label>
                <input type="radio" id="weight2" name="weight2" onclick="closetxtarea('d')"  value="1"<?=$record['weight2'] == '1' ? ' checked="checked"' : '';?> disabled>&nbsp;unchanged
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="radio" id="weight2" name="weight2" onclick="opentxtarea('d')" value="2"<?=$record['weight2'] == '2' ? ' checked="checked"' : '';?> disabled>&nbsp;increase
                </label>
                <label>
                  <input type="radio" id="weight2" name="weight2" onclick="opentxtarea('u')" value="3"<?=$record['weight2'] == '3' ? ' checked="checked"' : '';?> disabled>&nbsp;decrease
                </label>
               </td>
               </tr>
               <tr>
               <td align = "right" width="6%">พฤติกรรม : </td>
               <td>
               <label>
                <input type="radio" id="behavior" name="behavior" onclick="closetxtarea('d')"  value="1"<?=$record['weight2'] == '1' ? ' checked="checked"' : '';?> disabled>&nbsp;unchanged
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="radio" id="behavior" name="behavior" onclick="opentxtarea('d')" value="2"<?=$record['weight2'] == '2' ? ' checked="checked"' : '';?> disabled>&nbsp;increase
                </label>
                <label>
                  <input type="radio" id="behavior" name="behavior" onclick="opentxtarea('u')" value="3"<?=$record['weight2'] == '3' ? ' checked="checked"' : '';?> disabled>&nbsp;decrease
                </label>
               </td>
               </tr>
               <tr>
               <td align = "right" width="6%">ผลข้างเคียงจากการรักษา : </td>
               <td>
               <label>
                <input type="radio" id="adverseeffect" name="adverseeffect" onclick="closetxtarea('ad')"  value="1"<?=$record['adverseeffect'] == '1' ? ' checked="checked"' : '';?> disabled>&nbsp;no
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="radio" id="adverseeffect" name="adverseeffect" onclick="opentxtarea('ad')" value="2"<?=$record['adverseeffect'] == '2' ? ' checked="checked"' : '';?> disabled>&nbsp;yes
                </label>
                <br>
                <textarea id="aedetail" name="aedetail" rows="3" cols="30"  maxlength="255" <?=$record['adverseeffect'] == '1' ? 'disabled="disabled"' : '';?> required disabled><?php echo $record['aedetail']; ?></textarea>
               </td>
               </tr>
               <tr>
               <td align = "right" width="6%">มีปัญหาใหม่หรือไม่ : </td>
               <td>
               <label>
                <input type="radio" id="newprob" name="newprob" onclick="closetxtarea('np')"  value="1"<?=$record['newprob'] == '1' ? ' checked="checked"' : '';?> disabled>&nbsp;no
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="radio" id="newprob" name="newprob" onclick="opentxtarea('np')" value="2"<?=$record['newprob'] == '2' ? ' checked="checked"' : '';?> disabled>&nbsp;yes
                </label>
                <br>
                <textarea id="newprobdetail" name="newprobdetail" rows="3" cols="30"  maxlength="255" <?=$record['newprob'] == '1' ? 'disabled="disabled"' : '';?> required disabled><?php echo $record['newprobdetail']; ?></textarea>
               </td>
               </tr>
        </form>
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