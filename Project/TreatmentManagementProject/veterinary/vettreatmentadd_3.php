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
$sql="SELECT `treatmentid`, treatment.petid AS petid ,`DateTreatment`, pet.name AS petname ,treatment.Status AS Status,`geappear`, 
`gedetail`, `eye`, `eyedetail`, `nose`, `nosedetail`, `mouth`, `mouthdetail`, `ear`, `eardetail`, `lymphnode`, 
`lymdetail`, `larynxandtrac`, `larydetail`, `oropharynx`, `ordetail`, `thorax`, `thodetail`, `abdominal`, `abddetail`, 
`skincoat`, `skdetail`, `pergen`, `perdetail`, `forelimb`, `foredetail`, `hindlimb`, `hindetail`, `gastroin`, 
`gasdetail`, `urinarytract`, `uridetail`, `reproduct`, `reprodetail`, `muscul`, `musdetail`, `nervous`, `nerdetail`, 
`mental`, `mentaldetail` FROM treatment,pet,pettype,user 
WHERE treatment.VetID = user.UserID and treatment.PetID = pet.PetID and pet.PetTypeID = pettype.PetTypeID 
and treatment.Status = 1 and treatmentid = '$treatmentid'";
require("../mysql/connect.php");
$record = mysqli_fetch_array($result);
$petid = $record['petid'];

//select DateTreatment,TreatmentID from treatment where petid=6 order by TreatmentID desc limit 1,1
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
          if(rec == '1')
          {
            document.getElementById("gedetail").disabled = false;
          }
          else if(rec == '2')
          {
            document.getElementById("eyedetail").disabled = false;
          }
          else if(rec == '3')
          {
            document.getElementById("nosedetail").disabled = false;
          }
          else if(rec == '4')
          {
            document.getElementById("mouthdetail").disabled = false;
          }
          else if(rec == '5')
          {
            document.getElementById("eardetail").disabled = false;
          }
          else if(rec == '6')
          {
            document.getElementById("lymdetail").disabled = false;
          }
          else if(rec == '7')
          {
            document.getElementById("larydetail").disabled = false;
          }
          else if(rec == '8')
          {
            document.getElementById("ordetail").disabled = false;
          }
          else if(rec == '9')
          {
            document.getElementById("thodetail").disabled = false;
          }
          else if(rec == '10')
          {
            document.getElementById("abddetail").disabled = false;
          }
          else if(rec == '11')
          {
            document.getElementById("skdetail").disabled = false;
          }
          else if(rec == '12')
          {
            document.getElementById("perdetail").disabled = false;
          }
          else if(rec == '13')
          {
            document.getElementById("foredetail").disabled = false;
          }
          else if(rec == '14')
          {
            document.getElementById("hindetail").disabled = false;
          }
          else if(rec == '15')
          {
            document.getElementById("gasdetail").disabled = false;
          }
          else if(rec == '16')
          {
            document.getElementById("uridetail").disabled = false;
          }
          else if(rec == '17')
          {
            document.getElementById("reprodetail").disabled = false;
          }
          else if(rec == '18')
          {
            document.getElementById("musdetail").disabled = false;
          }
          else if(rec == '19')
          {
            document.getElementById("nerdetail").disabled = false;
          }
          else if(rec == '20')
          {
            document.getElementById("mentaldetail").disabled = false;
          }
      }
      function closetxtarea(rec)
      {
        if(rec == '1')
          {
            document.getElementById("gedetail").disabled = true;
          }
          else if(rec == '2')
          {
            document.getElementById("eyedetail").disabled = true;
          }
          else if(rec == '3')
          {
            document.getElementById("nosedetail").disabled = true;
          }
          else if(rec == '4')
          {
            document.getElementById("mouthdetail").disabled = true;
          }
          else if(rec == '5')
          {
            document.getElementById("eardetail").disabled = true;
          }
          else if(rec == '6')
          {
            document.getElementById("lymdetail").disabled = true;
          }
          else if(rec == '7')
          {
            document.getElementById("larydetail").disabled = true;
          }
          else if(rec == '8')
          {
            document.getElementById("ordetail").disabled = true;
          }
          else if(rec == '9')
          {
            document.getElementById("thodetail").disabled = true;
          }
          else if(rec == '10')
          {
            document.getElementById("abddetail").disabled = true;
          }
          else if(rec == '11')
          {
            document.getElementById("skdetail").disabled = true;
          }
          else if(rec == '12')
          {
            document.getElementById("perdetail").disabled = true;
          }
          else if(rec == '13')
          {
            document.getElementById("foredetail").disabled = true;
          }
          else if(rec == '14')
          {
            document.getElementById("hindetail").disabled = true;
          }
          else if(rec == '15')
          {
            document.getElementById("gasdetail").disabled = true;
          }
          else if(rec == '16')
          {
            document.getElementById("uridetail").disabled = true;
          }
          else if(rec == '17')
          {
            document.getElementById("reprodetail").disabled = true;
          }
          else if(rec == '18')
          {
            document.getElementById("musdetail").disabled = true;
          }
          else if(rec == '19')
          {
            document.getElementById("nerdetail").disabled = true;
          }
          else if(rec == '20')
          {
            document.getElementById("mentaldetail").disabled = true;
          }
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
   <a href="vettreatmentadd_1.php?treatmentid=<?php echo $treatmentid; ?>" class="btn btn-light" role="button" style="height:100%;width:100%;">ข้อมูลทั่วไป</a>
   </td>
   <td align="center" width="20%">
   <a href="vettreatmentadd_2.php?treatmentid=<?php echo $treatmentid; ?>" class="btn btn-light" role="button" style="height:100%;width:100%;">การตรวจสอบประวัติ</a>
   </td>
   <td align="center" width="20%">
   <a href="#" class="btn btn-info" role="button" style="height:100%;width:100%;">การตรวจร่างกาย</a>
   </td>
   <td align="center" width="20%">
   <a href="vettreatmentadd_4.php?treatmentid=<?php echo $treatmentid; ?>" class="btn btn-light" role="button" style="height:100%;width:100%;">การวินิจฉัย</a>
   </td>
   </tr>
   <tr><td colspan="4">
   <form action="vettreatmentadd_3save.php" method="post">
   <input type="hidden" name="treatmentid" value="<?php echo $treatmentid; ?>">
    <table width = '100%' border = "0"  bgcolor = "#FFFFFF">
                <tr><td colspan="4" align="center" width="50%">ชื่อสัตว์เลี้ยง : <input type="text" size='30' maxlength='30' value="<?php echo $record['petname']; ?>" disabled><br></td></tr>
                <tr>
               <td align = "right" valign="top" colspan="2">ลักษณะทั่วไป : </td>
               <td>
               <label>
                <input type="radio" id="geappear" name="geappear" onclick="closetxtarea('1')"  value="1"<?=$record['geappear'] == '1' ? ' checked="checked"' : '';?>  required>&nbsp;normal
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="radio" id="geappear" name="geappear" onclick="opentxtarea('1')" value="2"<?=$record['geappear'] == '2' ? ' checked="checked"' : '';?>  required>&nbsp;abnormal
                </label>
                <br>
                <textarea id="gedetail" name="gedetail" rows="3" cols="30"  maxlength="255" <?=$record['geappear'] == '1' ? 'disabled="disabled"' : '';?> required><?php echo $record['gedetail']; ?></textarea>
               </td>
               </tr>
                <tr>
               <td align = "right" valign="top" colspan="2">ตา : </td>
               <td>
               <label>
                <input type="radio" id="eye" name="eye" onclick="closetxtarea('2')"  value="1"<?=$record['eye'] == '1' ? ' checked="checked"' : '';?>  required>&nbsp;normal
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="radio" id="eye" name="eye" onclick="opentxtarea('2')" value="2"<?=$record['eye'] == '2' ? ' checked="checked"' : '';?>  required>&nbsp;abnormal
                </label>
                <br>
                <textarea id="eyedetail" name="eyedetail" rows="3" cols="30"  maxlength="255" <?=$record['eye'] == '1' ? 'disabled="disabled"' : '';?> required><?php echo $record['eyedetail']; ?></textarea>
               </td>
               </tr>
               <tr>
               <td align = "right" valign="top" colspan="2">จมูก : </td>
               <td>
               <label>
                <input type="radio" id="nose" name="nose" onclick="closetxtarea('3')"  value="1"<?=$record['nose'] == '1' ? ' checked="checked"' : '';?>  required>&nbsp;normal
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="radio" id="nose" name="nose" onclick="opentxtarea('3')" value="2"<?=$record['nose'] == '2' ? ' checked="checked"' : '';?>  required>&nbsp;abnormal
                </label>
                <br>
                <textarea id="nosedetail" name="nosedetail" rows="3" cols="30"  maxlength="255" <?=$record['nose'] == '1' ? 'disabled="disabled"' : '';?> required><?php echo $record['nosedetail']; ?></textarea>
               </td>
               </tr>
               <tr>
               <td align = "right" valign="top" colspan="2">ผลข้างเคียงจากการรักษา : </td>
               <td>
               <label>
                <input type="radio" id="mouth" name="mouth" onclick="closetxtarea('4')"  value="1"<?=$record['mouth'] == '1' ? ' checked="checked"' : '';?>  required>&nbsp;normal
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="radio" id="mouth" name="mouth" onclick="opentxtarea('4')" value="2"<?=$record['mouth'] == '2' ? ' checked="checked"' : '';?>  required>&nbsp;abnormal
                </label>
                <br>
                <textarea id="mouthdetail" name="mouthdetail" rows="3" cols="30"  maxlength="255" <?=$record['mouth'] == '1' ? 'disabled="disabled"' : '';?> required><?php echo $record['mouthdetail']; ?></textarea>
               </td>
               </tr>
               <tr>
               <td align = "right" valign="top" colspan="2">หู : </td>
               <td>
               <label>
                <input type="radio" id="ear" name="ear" onclick="closetxtarea('5')"  value="1"<?=$record['ear'] == '1' ? ' checked="checked"' : '';?>  required>&nbsp;normal
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="radio" id="ear" name="ear" onclick="opentxtarea('5')" value="2"<?=$record['ear'] == '2' ? ' checked="checked"' : '';?>  required>&nbsp;abnormal
                </label>
                <br>
                <textarea id="eardetail" name="eardetail" rows="3" cols="30"  maxlength="255" <?=$record['ear'] == '1' ? 'disabled="disabled"' : '';?> required><?php echo $record['eardetail']; ?></textarea>
               </td>
               </tr>
               <tr>
               <td align = "right" valign="top" colspan="2">ต่อมน้ำเหลือง : </td>
               <td>
               <label>
                <input type="radio" id="lymphnode" name="lymphnode" onclick="closetxtarea('6')"  value="1"<?=$record['lymphnode'] == '1' ? ' checked="checked"' : '';?>  required>&nbsp;normal
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="radio" id="lymphnode" name="lymphnode" onclick="opentxtarea('6')" value="2"<?=$record['lymphnode'] == '2' ? ' checked="checked"' : '';?>  required>&nbsp;abnormal
                </label>
                <br>
                <textarea id="lymdetail" name="lymdetail" rows="3" cols="30"  maxlength="255" <?=$record['lymphnode'] == '1' ? 'disabled="disabled"' : '';?> required><?php echo $record['lymdetail']; ?></textarea>
               </td>
               </tr>
               <tr>
               <td align = "right" valign="top" colspan="2">กล่องเสียงและหลอดลม : </td>
               <td>
               <label>
                <input type="radio" id="larynxandtrac" name="larynxandtrac" onclick="closetxtarea('7')"  value="1"<?=$record['larynxandtrac'] == '1' ? ' checked="checked"' : '';?>  required>&nbsp;normal
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="radio" id="larynxandtrac" name="larynxandtrac" onclick="opentxtarea('7')" value="2"<?=$record['larynxandtrac'] == '2' ? ' checked="checked"' : '';?>  required>&nbsp;abnormal
                </label>
                <br>
                <textarea id="larydetail" name="larydetail" rows="3" cols="30"  maxlength="255" <?=$record['larynxandtrac'] == '1' ? 'disabled="disabled"' : '';?> required><?php echo $record['larydetail']; ?></textarea>
               </td>
               </tr>
               <tr>
               <td align = "right" valign="top" colspan="2">ช่องปากต่อช่องคอ : </td>
               <td>
               <label>
                <input type="radio" id="oropharynx" name="oropharynx" onclick="closetxtarea('8')"  value="1"<?=$record['oropharynx'] == '1' ? ' checked="checked"' : '';?>  required>&nbsp;normal
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="radio" id="oropharynx" name="oropharynx" onclick="opentxtarea('8')" value="2"<?=$record['oropharynx'] == '2' ? ' checked="checked"' : '';?>  required>&nbsp;abnormal
                </label>
                <br>
                <textarea id="ordetail" name="ordetail" rows="3" cols="30"  maxlength="255" <?=$record['oropharynx'] == '1' ? 'disabled="disabled"' : '';?> required><?php echo $record['ordetail']; ?></textarea>
               </td>
               </tr>
               <tr>
               <td align = "right" valign="top" colspan="2">ช่องอก (ใช้หูฟัง）: </td>
               <td>
               <label>
                <input type="radio" id="thorax" name="thorax" onclick="closetxtarea('9')"  value="1"<?=$record['thorax'] == '1' ? ' checked="checked"' : '';?>  required>&nbsp;normal
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="radio" id="thorax" name="thorax" onclick="opentxtarea('9')" value="2"<?=$record['thorax'] == '2' ? ' checked="checked"' : '';?>  required>&nbsp;abnormal
                </label>
                <br>
                <textarea id="thodetail" name="thodetail" rows="3" cols="30"  maxlength="255" <?=$record['thorax'] == '1' ? 'disabled="disabled"' : '';?> required><?php echo $record['thodetail']; ?></textarea>
               </td>
               </tr>
               <tr>
               <td align = "right" valign="top" colspan="2">ช่องท้อง (ตรวจโดยการคลำช่องท้อง) : </td>
               <td>
               <label>
                <input type="radio" id="abdominal" name="abdominal" onclick="closetxtarea('10')"  value="1"<?=$record['abdominal'] == '1' ? ' checked="checked"' : '';?>  required>&nbsp;normal
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="radio" id="abdominal" name="abdominal" onclick="opentxtarea('10')" value="2"<?=$record['abdominal'] == '2' ? ' checked="checked"' : '';?>  required>&nbsp;abnormal
                </label>
                <br>
                <textarea id="abddetail" name="abddetail" rows="3" cols="30"  maxlength="255" <?=$record['abdominal'] == '1' ? 'disabled="disabled"' : '';?> required><?php echo $record['abddetail']; ?></textarea>
               </td>
               </tr>
               <tr>
               <td align = "right" valign="top" colspan="2">ผิวหนังและขน : </td>
               <td>
               <label>
                <input type="radio" id="skincoat" name="skincoat" onclick="closetxtarea('11')"  value="1"<?=$record['skincoat'] == '1' ? ' checked="checked"' : '';?>  required>&nbsp;normal
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="radio" id="skincoat" name="skincoat" onclick="opentxtarea('11')" value="2"<?=$record['skincoat'] == '2' ? ' checked="checked"' : '';?>  required>&nbsp;abnormal
                </label>
                <br>
                <textarea id="skdetail" name="skdetail" rows="3" cols="30"  maxlength="255" <?=$record['skincoat'] == '1' ? 'disabled="disabled"' : '';?> required><?php echo $record['skdetail']; ?></textarea>
               </td>
               </tr>
               <tr>
               <td align = "right" valign="top" colspan="2">ช่องเปิดอวัยวะเพศและอวัยวะเกี่ยวกับระบบสืบพันธ์ : </td>
               <td>
               <label>
                <input type="radio" id="pergen" name="pergen" onclick="closetxtarea('12')"  value="1"<?=$record['pergen'] == '1' ? ' checked="checked"' : '';?>  required>&nbsp;normal
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="radio" id="pergen" name="pergen" onclick="opentxtarea('12')" value="2"<?=$record['pergen'] == '2' ? ' checked="checked"' : '';?>  required>&nbsp;abnormal
                </label>
                <br>
                <textarea id="perdetail" name="perdetail" rows="3" cols="30"  maxlength="255" <?=$record['pergen'] == '1' ? 'disabled="disabled"' : '';?> required><?php echo $record['perdetail']; ?></textarea>
               </td>
               </tr>
               <tr>
               <td align = "right" valign="top" colspan="2">ขาหน้า : </td>
               <td>
               <label>
                <input type="radio" id="forelimb" name="forelimb" onclick="closetxtarea('13')"  value="1"<?=$record['forelimb'] == '1' ? ' checked="checked"' : '';?>  required>&nbsp;normal
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="radio" id="forelimb" name="forelimb" onclick="opentxtarea('13')" value="2"<?=$record['forelimb'] == '2' ? ' checked="checked"' : '';?>  required>&nbsp;abnormal
                </label>
                <br>
                <textarea id="foredetail" name="foredetail" rows="3" cols="30"  maxlength="255" <?=$record['forelimb'] == '1' ? 'disabled="disabled"' : '';?> required><?php echo $record['foredetail']; ?></textarea>
               </td>
               </tr>
               <tr>
               <td align = "right" valign="top" colspan="2">ขาหลัง : </td>
               <td>
               <label>
                <input type="radio" id="hindlimb" name="hindlimb" onclick="closetxtarea('14')"  value="1"<?=$record['hindlimb'] == '1' ? ' checked="checked"' : '';?>  required>&nbsp;normal
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="radio" id="hindlimb" name="hindlimb" onclick="opentxtarea('14')" value="2"<?=$record['hindlimb'] == '2' ? ' checked="checked"' : '';?>  required>&nbsp;abnormal
                </label>
                <br>
                <textarea id="hindetail" name="hindetail" rows="3" cols="30"  maxlength="255" <?=$record['hindlimb'] == '1' ? 'disabled="disabled"' : '';?> required><?php echo $record['hindetail']; ?></textarea>
               </td>
               </tr>
               <tr>
               <td align = "right" valign="top" colspan="2">ระบบทางเดินอาหาร : </td>
               <td>
               <label>
                <input type="radio" id="gastroin" name="gastroin" onclick="closetxtarea('15')"  value="1"<?=$record['gastroin'] == '1' ? ' checked="checked"' : '';?>  required>&nbsp;normal
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="radio" id="gastroin" name="gastroin" onclick="opentxtarea('15')" value="2"<?=$record['gastroin'] == '2' ? ' checked="checked"' : '';?>  required>&nbsp;abnormal
                </label>
                <br>
                <textarea id="gasdetail" name="gasdetail" rows="3" cols="30"  maxlength="255" <?=$record['gastroin'] == '1' ? 'disabled="disabled"' : '';?> required><?php echo $record['gasdetail']; ?></textarea>
               </td>
               </tr>
               <tr>
               <td align = "right" valign="top" colspan="2">ทางเดินระบบปัสสาวะ : </td>
               <td>
               <label>
                <input type="radio" id="urinarytract" name="urinarytract" onclick="closetxtarea('16')"  value="1"<?=$record['urinarytract'] == '1' ? ' checked="checked"' : '';?>  required>&nbsp;normal
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="radio" id="urinarytract" name="urinarytract" onclick="opentxtarea('16')" value="2"<?=$record['urinarytract'] == '2' ? ' checked="checked"' : '';?>  required>&nbsp;abnormal
                </label>
                <br>
                <textarea id="uridetail" name="uridetail" rows="3" cols="30"  maxlength="255" <?=$record['urinarytract'] == '1' ? 'disabled="disabled"' : '';?> required><?php echo $record['uridetail']; ?></textarea>
               </td>
               </tr>
               <tr>
               <td align = "right" valign="top" colspan="2">ระบบสืบพันธ์ : </td>
               <td>
               <label>
                <input type="radio" id="reproduct" name="reproduct" onclick="closetxtarea('17')"  value="1"<?=$record['reproduct'] == '1' ? ' checked="checked"' : '';?>  required>&nbsp;normal
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="radio" id="reproduct" name="reproduct" onclick="opentxtarea('17')" value="2"<?=$record['reproduct'] == '2' ? ' checked="checked"' : '';?>  required>&nbsp;abnormal
                </label>
                <br>
                <textarea id="reprodetail" name="reprodetail" rows="3" cols="30"  maxlength="255" <?=$record['reproduct'] == '1' ? 'disabled="disabled"' : '';?> required><?php echo $record['reprodetail']; ?></textarea>
               </td>
               </tr>
               <tr>
               <td align = "right" valign="top" colspan="2">ระบบกล้ามเนื้อ : </td>
               <td>
               <label>
                <input type="radio" id="muscul" name="muscul" onclick="closetxtarea('18')"  value="1"<?=$record['muscul'] == '1' ? ' checked="checked"' : '';?>  required>&nbsp;normal
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="radio" id="muscul" name="muscul" onclick="opentxtarea('18')" value="2"<?=$record['muscul'] == '2' ? ' checked="checked"' : '';?>  required>&nbsp;abnormal
                </label>
                <br>
                <textarea id="musdetail" name="musdetail" rows="3" cols="30"  maxlength="255" <?=$record['muscul'] == '1' ? 'disabled="disabled"' : '';?> required><?php echo $record['musdetail']; ?></textarea>
               </td>
               </tr>
               <tr>
               <td align = "right" valign="top" colspan="2">ระบบประสาท : </td>
               <td>
               <label>
                <input type="radio" id="nervous" name="nervous" onclick="closetxtarea('19')"  value="1"<?=$record['nervous'] == '1' ? ' checked="checked"' : '';?>  required>&nbsp;normal
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="radio" id="nervous" name="nervous" onclick="opentxtarea('19')" value="2"<?=$record['nervous'] == '2' ? ' checked="checked"' : '';?>  required>&nbsp;abnormal
                </label>
                <br>
                <textarea id="nerdetail" name="nerdetail" rows="3" cols="30"  maxlength="255" <?=$record['nervous'] == '1' ? 'disabled="disabled"' : '';?> required><?php echo $record['nerdetail']; ?></textarea>
               </td>
               </tr>
               <tr>
               <td align = "right" valign="top" colspan="2">สถานะอารมณ์ : </td>
               <td>
               <label>
                <input type="radio" id="mental" name="mental" onclick="closetxtarea('20')"  value="1"<?=$record['mental'] == '1' ? ' checked="checked"' : '';?>  required>&nbsp;normal
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="radio" id="mental" name="mental" onclick="opentxtarea('20')" value="2"<?=$record['mental'] == '2' ? ' checked="checked"' : '';?>  required>&nbsp;abnormal
                </label>
                <br>
                <textarea id="mentaldetail" name="mentaldetail" rows="3" cols="30"  maxlength="255" <?=$record['mental'] == '1' ? 'disabled="disabled"' : '';?> required><?php echo $record['mentaldetail']; ?></textarea>
               </td>
               </tr>
                <tr><td colspan="4" align="center"><input type="submit" value="บันทึกการตรวจร่างกาย"></td></tr>
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