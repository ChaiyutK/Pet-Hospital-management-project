<?php
session_start();
require("../config/config.php");
require("../mysql/config.php");
if($_SESSION['type'] != "member")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$userid = $_SESSION['userid'];

$sql = "select userid,name,surname,level,status,name,surname,hnumber,village,alley,road,district,canton,province,postnumber,hpnumber,phonenumber,email from user where userid = $userid";
//$sql = "select userid,username,name,surname,level,status from user where userid = $userid";
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
        <a class="nav-link" href="<?php echo $memberappointment; ?>">ระบบนัดหมาย <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo $membereditself; ?>">แก้ไขโปรไฟล์ส่วนตัว <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <span class = "badge badge-warning" style="font-family: 'TH SarabunPSK';font-weight: bold;"><h4><?php echo $_SESSION['name'] . "&nbsp;สมาชิก" ."&nbsp;
    <a href = '../logout.php'>logout</a>" ?></h4></span>
  </div>
</nav>
<center><div class="head1">ข้อมูลบุคคล</div></center>
   <center>
   <form action="memberedithistorysave.php" method="post">
    <table width = '50%' border = "0"  bgcolor = "#FFFFFF">
               <tr>
               <td align = "right">ชื่อ : </td><td><input type="text" name="Fname" size='30' maxlength='30' value="<?php echo $record['name']; ?>" required></td>
               <td align = "left">นามสกุล : </td><td><input type="text" name="Sname" size='30' maxlength='30' value="<?php echo $record['surname']; ?>" required ></td>
               </tr>
               <tr>
               <td align = "right">บ้านเลขที่ : </td><td><input type="text" name="Hnumber" size='30' maxlength='30' value="<?php echo $record['hnumber']; ?>" required></td>
               <td align = "left">หมู่บ้าน/อาคาร : </td><td><input type="text" name="Village" size='30' maxlength='30' value="<?php echo $record['village']; ?>"required ></td>
               </tr>
               <tr>
               <td align = "right">ตรอก/ซอย : </td><td><input type="text" name="Alley" size='30' maxlength='30' value="<?php echo $record['alley']; ?>" required></td>
               <td align = "left">ถนน : </td><td><input type="text" name="Road" size='30' maxlength='30' value="<?php echo $record['road']; ?>" required></td>
               </tr>
               <tr>
               <td align = "right">แขวง : </td><td><input type="text" name="District" size='30' maxlength='30' value="<?php echo $record['district']; ?>" required></td>
               <td align = "left">เขต/อำเภอ : </td><td><input type="text" name="Canton" size='30' maxlength='30' value="<?php echo $record['canton']; ?>" required></td>
               </tr>
               <tr>
               <td align = "right">จังหวัด : </td>
               <td>
               <select name="province" required>
                <option value="" selected>--------- เลือกจังหวัด ---------</option>
                <option value="กรุงเทพมหานคร" <?=$record['province'] == 'กรุงเทพมหานคร' ? ' selected="selected"' : '';?>>กรุงเทพมหานคร</option>
                <option value="กระบี่" <?=$record['province'] == 'กระบี่' ? ' selected="selected"' : '';?>>กระบี่ </option>
                <option value="กาญจนบุรี" <?=$record['province'] == 'กาญจนบุรี' ? ' selected="selected"' : '';?>>กาญจนบุรี </option>
                <option value="กาฬสินธุ์" <?=$record['province'] == 'กาฬสินธุ์' ? ' selected="selected"' : '';?>>กาฬสินธุ์ </option>
                <option value="กำแพงเพชร" <?=$record['province'] == 'กำแพงเพชร' ? ' selected="selected"' : '';?>>กำแพงเพชร </option>
                <option value="ขอนแก่น" <?=$record['province'] == 'ขอนแก่น' ? ' selected="selected"' : '';?>>ขอนแก่น</option>
                <option value="จันทบุรี" <?=$record['province'] == 'จันทบุรี' ? ' selected="selected"' : '';?>>จันทบุรี</option>
                <option value="ฉะเชิงเทรา" <?=$record['province'] == 'ฉะเชิงเทรา' ? ' selected="selected"' : '';?>>ฉะเชิงเทรา </option>
                <option value="ชัยนาท" <?=$record['province'] == 'ชัยนาท' ? ' selected="selected"' : '';?>>ชัยนาท </option>
                <option value="ชัยภูมิ" <?=$record['province'] == 'ชัยภูมิ' ? ' selected="selected"' : '';?>>ชัยภูมิ </option>
                <option value="ชุมพร" <?=$record['province'] == 'ชุมพร' ? ' selected="selected"' : '';?>>ชุมพร </option>
                <option value="ชลบุรี" <?=$record['province'] == 'ชลบุรี' ? ' selected="selected"' : '';?>>ชลบุรี </option>
                <option value="เชียงใหม่" <?=$record['province'] == 'เชียงใหม่' ? ' selected="selected"' : '';?>>เชียงใหม่ </option>
                <option value="เชียงราย" <?=$record['province'] == 'เชียงราย' ? ' selected="selected"' : '';?>>เชียงราย </option>
                <option value="ตรัง" <?=$record['province'] == 'ตรัง' ? ' selected="selected"' : '';?>>ตรัง </option>
                <option value="ตราด" <?=$record['province'] == 'ตราด' ? ' selected="selected"' : '';?>>ตราด </option>
                <option value="ตาก" <?=$record['province'] == 'ตาก' ? ' selected="selected"' : '';?>>ตาก </option>
                <option value="นครนายก" <?=$record['province'] == 'นครนายก' ? ' selected="selected"' : '';?>>นครนายก </option>
                <option value="นครปฐม" <?=$record['province'] == 'นครปฐม' ? ' selected="selected"' : '';?>>นครปฐม </option>
                <option value="นครพนม" <?=$record['province'] == 'นครพนม' ? ' selected="selected"' : '';?>>นครพนม </option>
                <option value="นครราชสีมา" <?=$record['province'] == 'นครราชสีมา' ? ' selected="selected"' : '';?>>นครราชสีมา </option>
                <option value="นครศรีธรรมราช" <?=$record['province'] == 'นครศรีธรรมราช' ? ' selected="selected"' : '';?>>นครศรีธรรมราช </option>
                <option value="นครสวรรค์" <?=$record['province'] == 'นครสวรรค์' ? ' selected="selected"' : '';?>>นครสวรรค์ </option>
                <option value="นราธิวาส" <?=$record['province'] == 'นราธิวาส' ? ' selected="selected"' : '';?>>นราธิวาส </option>
                <option value="น่าน" <?=$record['province'] == 'น่าน' ? ' selected="selected"' : '';?>>น่าน </option>
                <option value="นนทบุรี" <?=$record['province'] == 'นนทบุรี' ? ' selected="selected"' : '';?>>นนทบุรี </option>
                <option value="บึงกาฬ" <?=$record['province'] == 'บึงกาฬ' ? ' selected="selected"' : '';?>>บึงกาฬ</option>
                <option value="บุรีรัมย์" <?=$record['province'] == 'บุรีรัมย์' ? ' selected="selected"' : '';?>>บุรีรัมย์</option>
                <option value="ประจวบคีรีขันธ์" <?=$record['province'] == 'ประจวบคีรีขันธ์' ? ' selected="selected"' : '';?>>ประจวบคีรีขันธ์ </option>
                <option value="ปทุมธานี" <?=$record['province'] == 'ปทุมธานี' ? ' selected="selected"' : '';?>>ปทุมธานี </option>
                <option value="ปราจีนบุรี" <?=$record['province'] == 'ปราจีนบุรี' ? ' selected="selected"' : '';?>>ปราจีนบุรี </option>
                <option value="ปัตตานี" <?=$record['province'] == 'ปัตตานี' ? ' selected="selected"' : '';?>>ปัตตานี </option>
                <option value="พะเยา" <?=$record['province'] == 'พะเยา' ? ' selected="selected"' : '';?>>พะเยา </option>
                <option value="พระนครศรีอยุธยา" <?=$record['province'] == 'พระนครศรีอยุธยา' ? ' selected="selected"' : '';?>>พระนครศรีอยุธยา </option>
                <option value="พังงา" <?=$record['province'] == 'พังงา' ? ' selected="selected"' : '';?>>พังงา </option>
                <option value="พิจิตร" <?=$record['province'] == 'พิจิตร' ? ' selected="selected"' : '';?>>พิจิตร </option>
                <option value="พิษณุโลก" <?=$record['province'] == 'พิษณุโลก' ? ' selected="selected"' : '';?>>พิษณุโลก </option>
                <option value="เพชรบุรี" <?=$record['province'] == 'เพชรบุรี' ? ' selected="selected"' : '';?>>เพชรบุรี </option>
                <option value="เพชรบูรณ์" <?=$record['province'] == 'เพชรบูรณ์' ? ' selected="selected"' : '';?>>เพชรบูรณ์ </option>
                <option value="แพร่" <?=$record['province'] == 'แพร่' ? ' selected="selected"' : '';?>>แพร่ </option>
                <option value="พัทลุง" <?=$record['province'] == 'พัทลุง' ? ' selected="selected"' : '';?>>พัทลุง </option>
                <option value="ภูเก็ต" <?=$record['province'] == 'ภูเก็ต' ? ' selected="selected"' : '';?>>ภูเก็ต </option>
                <option value="มหาสารคาม" <?=$record['province'] == 'มหาสารคาม' ? ' selected="selected"' : '';?>>มหาสารคาม </option>
                <option value="มุกดาหาร" <?=$record['province'] == 'มุกดาหาร' ? ' selected="selected"' : '';?>>มุกดาหาร </option>
                <option value="แม่ฮ่องสอน" <?=$record['province'] == 'แม่ฮ่องสอน' ? ' selected="selected"' : '';?>>แม่ฮ่องสอน </option>
                <option value="ยโสธร" <?=$record['province'] == 'ยโสธร' ? ' selected="selected"' : '';?>>ยโสธร </option>
                <option value="ยะลา" <?=$record['province'] == 'ยะลา' ? ' selected="selected"' : '';?>>ยะลา </option>
                <option value="ร้อยเอ็ด" <?=$record['province'] == 'ร้อยเอ็ด' ? ' selected="selected"' : '';?>>ร้อยเอ็ด </option>
                <option value="ระนอง" <?=$record['province'] == 'ระนอง' ? ' selected="selected"' : '';?>>ระนอง </option>
                <option value="ระยอง" <?=$record['province'] == 'ระยอง' ? ' selected="selected"' : '';?>>ระยอง </option>
                <option value="ราชบุรี" <?=$record['province'] == 'ราชบุรี' ? ' selected="selected"' : '';?>>ราชบุรี</option>
                <option value="ลพบุรี" <?=$record['province'] == 'ลพบุรี' ? ' selected="selected"' : '';?>>ลพบุรี </option>
                <option value="ลำปาง" <?=$record['province'] == 'ลำปาง' ? ' selected="selected"' : '';?>>ลำปาง </option>
                <option value="ลำพูน" <?=$record['province'] == 'ลำพูน' ? ' selected="selected"' : '';?>>ลำพูน </option>
                <option value="เลย" <?=$record['province'] == 'เลย' ? ' selected="selected"' : '';?>>เลย </option>
                <option value="ศรีสะเกษ" <?=$record['province'] == 'ศรีสะเกษ' ? ' selected="selected"' : '';?>>ศรีสะเกษ</option>
                <option value="สกลนคร" <?=$record['province'] == 'สกลนคร' ? ' selected="selected"' : '';?>>สกลนคร</option>
                <option value="สงขลา" <?=$record['province'] == 'สงขลา' ? ' selected="selected"' : '';?>>สงขลา </option>
                <option value="สมุทรสาคร" <?=$record['province'] == 'สมุทรสาคร' ? ' selected="selected"' : '';?>>สมุทรสาคร </option>
                <option value="สมุทรปราการ" <?=$record['province'] == 'สมุทรปราการ' ? ' selected="selected"' : '';?>>สมุทรปราการ </option>
                <option value="สมุทรสงคราม" <?=$record['province'] == 'สมุทรสงคราม' ? ' selected="selected"' : '';?>>สมุทรสงคราม </option>
                <option value="สระแก้ว" <?=$record['province'] == 'สระแก้ว' ? ' selected="selected"' : '';?>>สระแก้ว </option>
                <option value="สระบุรี" <?=$record['province'] == 'สระบุรี' ? ' selected="selected"' : '';?>>สระบุรี </option>
                <option value="สิงห์บุรี" <?=$record['province'] == 'สิงห์บุรี' ? ' selected="selected"' : '';?>>สิงห์บุรี </option>
                <option value="สุโขทัย" <?=$record['province'] == 'สุโขทัย' ? ' selected="selected"' : '';?>>สุโขทัย </option>
                <option value="สุพรรณบุรี" <?=$record['province'] == 'สุพรรณบุรี' ? ' selected="selected"' : '';?>>สุพรรณบุรี </option>
                <option value="สุราษฎร์ธานี" <?=$record['province'] == 'สุราษฎร์ธานี' ? ' selected="selected"' : '';?>>สุราษฎร์ธานี </option>
                <option value="สุรินทร์" <?=$record['province'] == 'สุรินทร์' ? ' selected="selected"' : '';?>>สุรินทร์ </option>
                <option value="สตูล" <?=$record['province'] == 'สตูล' ? ' selected="selected"' : '';?>>สตูล </option>
                <option value="หนองคาย" <?=$record['province'] == 'หนองคาย' ? ' selected="selected"' : '';?>>หนองคาย </option>
                <option value="หนองบัวลำภู" <?=$record['province'] == 'หนองบัวลำภู' ? ' selected="selected"' : '';?>>หนองบัวลำภู </option>
                <option value="อำนาจเจริญ" <?=$record['province'] == 'อำนาจเจริญ' ? ' selected="selected"' : '';?>>อำนาจเจริญ </option>
                <option value="อุดรธานี" <?=$record['province'] == 'อุดรธานี' ? ' selected="selected"' : '';?>>อุดรธานี </option>
                <option value="อุตรดิตถ์" <?=$record['province'] == 'อุตรดิตถ์' ? ' selected="selected"' : '';?>>อุตรดิตถ์ </option>
                <option value="อุทัยธานี" <?=$record['province'] == 'อุทัยธานี' ? ' selected="selected"' : '';?>>อุทัยธานี </option>
                <option value="อุบลราชธานี" <?=$record['province'] == 'อุบลราชธานี' ? ' selected="selected"' : '';?>>อุบลราชธานี</option>
                <option value="อ่างทอง" <?=$record['province'] == 'อ่างทอง' ? ' selected="selected"' : '';?>>อ่างทอง </option>
</select>
               </td>
               <td align = "left">รหัสไปรษณีย์ :</td><td><input type="text" name="Postnumber" size='30' maxlength='5' value="<?php echo $record['postnumber']; ?>" onkeypress="return isNumber(event)" required></td>
               </tr>
                <tr><td colspan="2" align="right">เบอร์โทรศัพท์บ้าน :&nbsp;</td><td colspan="2" align="left"><input type="text" name="Hpnumber" maxlength='9' onkeypress="return isNumber(event)" value="<?php echo $record['hpnumber']; ?>" required></td></tr>
                <tr><td colspan="2" align="right">เบอร์โทรศัพท์มือถือ :&nbsp;</td><td colspan="2" align="left"><input type="text" name="Phonenumber" maxlength='10' onkeypress="return isNumber(event)" value="<?php echo $record['phonenumber']; ?>" required></td></tr>
                <tr><td colspan="2" align="right">อีเมล์ :&nbsp;</td><td colspan="2" align="left"><input type="email" name="Email" value="<?php echo $record['email']; ?>" required></td></tr>
                <tr><td colspan="4" align="center"><input type="submit" value="บันทึก"></td></tr>
        </form>
    </table>
    </center>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  

  </body>
  
</html>