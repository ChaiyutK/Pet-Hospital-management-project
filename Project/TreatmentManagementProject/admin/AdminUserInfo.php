<?php
session_start();
require("../mysql/config.php");
if($_SESSION['type'] != "admin")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$userid = $_REQUEST['userid'];
$sql = "select userid,name,surname,username,level,status,name,surname,hnumber,village,alley,road,district,canton,province,postnumber,hpnumber,phonenumber,email from user where userid = $userid";
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
  background-image: url("../background/bg.jpg");
  background-repeat: no-repeat;
    background-size: 120% auto;
}
h3 {
    font-family: "TH SarabunPSK";
}
.head1 {
  font-family: "TH SarabunPSK";
  font-size: 50px;
  padding-top: 10px;
}
.btmenu {
 margin: 5%;
}
         
      </style>
  </head>
  <body>
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="../Main.php">ระบบจัดการการตรวจรักษา</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="ManageUser.php">ระบบฝ่ายบุคคล <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">ระบบคลังยา <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="Managetreatmentroom.php">จัดการห้องตรวจ <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="Managedisease.php">จัดการโรค <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <span class = "badge badge-warning" style="font-family: 'TH SarabunPSK';font-weight: bold;"><h4><?php echo $_SESSION['name'] . "&nbsp;ตำแหน่งผู้ดูแลระบบ" ."&nbsp;
    <a href = '../logout.php'>logout</a>" ?></h4></span>
  </div>
</nav>
   <center><div class="head1">ข้อมูลบุคคล</div></center>
   <center>
   <form action="AdminEditUser.php?userid='<?php echo $userid ?>'" method="post">
    <table width = '50%' border = "0"  bgcolor = "#FFFFFF">
            <tr><td colspan="4" align="center">
            <select name="level" disabled>
                   <?php   
                   
                   if($record['level'] == 1)
                   {
                       echo "<option value='$record[level]'>ผู้ดูแลระบบ</option>";
                   }
                   else if($record['level'] == 2)
                   {
                       echo "<option value='$record[level]'>สัตวแพทย์</option>";
                   }
                  else if($record['level'] == 3)
                   {
                       echo "<option value='$record[level]'>พนักงานทั่วไป</option>";
                   }
                   else if($record['level'] == 4)
                   {
                       echo "<option value='$record[level]'>สมาชิก</option>";
                   }
                    echo "<option value='1'>ผู้ดูแลระบบ</option>";
                    echo "<option value='2'>สัตวแพทย์</option>";
                    echo "<option value='3'>พนักงานทั่วไป</option>";
                    echo "<option value='4'>สมาชิก</option>";
                    echo "</select>";
                    
                ?>

                </td></tr>
            
               
               <tr>
               <td align = "right">ชื่อ : </td><td><input type="text" name="Fname" size='30' maxlength='30' value="<?php echo $record['name']; ?>" disabled></td>
               <td align = "left">นามสกุล : </td><td><input type="text" name="Sname" size='30' maxlength='30' value="<?php echo $record['surname']; ?>" disabled></td>
               </tr>
               <tr>
               <td align = "right">บ้านเลขที่ : </td><td><input type="text" name="Hnumber" size='30' maxlength='30' value="<?php echo $record['hnumber']; ?>" disabled></td>
               <td align = "left">หมู่บ้าน/อาคาร : </td><td><input type="text" name="Village" size='30' maxlength='30' value="<?php echo $record['village']; ?>" disabled></td>
               </tr>
               <tr>
               <td align = "right">ตรอก/ซอย : </td><td><input type="text" name="Alley" size='30' maxlength='30' value="<?php echo $record['alley']; ?>" disabled></td>
               <td align = "left">ถนน : </td><td><input type="text" name="Road" size='30' maxlength='30' value="<?php echo $record['road']; ?>" disabled></td>
               </tr>
               <tr>
               <td align = "right">แขวง : </td><td><input type="text" name="District" size='30' maxlength='30' value="<?php echo $record['district']; ?>" disabled></td>
               <td align = "left">เขต/อำเภอ : </td><td><input type="text" name="Canton" size='30' maxlength='30' value="<?php echo $record['canton']; ?>" disabled></td>
               </tr>
               <tr>
               <td align = "right">จังหวัด : </td>
               <td>
               <select name="province" disabled>
                <option value="<?php echo $record['province']; ?>" selected><?php echo $record['province']; ?></option>
                <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
                <option value="กระบี่">กระบี่ </option>
                <option value="กาญจนบุรี">กาญจนบุรี </option>
                <option value="กาฬสินธุ์">กาฬสินธุ์ </option>
                <option value="กำแพงเพชร">กำแพงเพชร </option>
                <option value="ขอนแก่น">ขอนแก่น</option>
                <option value="จันทบุรี">จันทบุรี</option>
                <option value="ฉะเชิงเทรา">ฉะเชิงเทรา </option>
                <option value="ชัยนาท">ชัยนาท </option>
                <option value="ชัยภูมิ">ชัยภูมิ </option>
                <option value="ชุมพร">ชุมพร </option>
                <option value="ชลบุรี">ชลบุรี </option>
                <option value="เชียงใหม่">เชียงใหม่ </option>
                <option value="เชียงราย">เชียงราย </option>
                <option value="ตรัง">ตรัง </option>
                <option value="ตราด">ตราด </option>
                <option value="ตาก">ตาก </option>
                <option value="นครนายก">นครนายก </option>
                <option value="นครปฐม">นครปฐม </option>
                <option value="นครพนม">นครพนม </option>
                <option value="นครราชสีมา">นครราชสีมา </option>
                <option value="นครศรีธรรมราช">นครศรีธรรมราช </option>
                <option value="นครสวรรค์">นครสวรรค์ </option>
                <option value="นราธิวาส">นราธิวาส </option>
                <option value="น่าน">น่าน </option>
                <option value="นนทบุรี">นนทบุรี </option>
                <option value="บึงกาฬ">บึงกาฬ</option>
                <option value="บุรีรัมย์">บุรีรัมย์</option>
                <option value="ประจวบคีรีขันธ์">ประจวบคีรีขันธ์ </option>
                <option value="ปทุมธานี">ปทุมธานี </option>
                <option value="ปราจีนบุรี">ปราจีนบุรี </option>
                <option value="ปัตตานี">ปัตตานี </option>
                <option value="พะเยา">พะเยา </option>
                <option value="พระนครศรีอยุธยา">พระนครศรีอยุธยา </option>
                <option value="พังงา">พังงา </option>
                <option value="พิจิตร">พิจิตร </option>
                <option value="พิษณุโลก">พิษณุโลก </option>
                <option value="เพชรบุรี">เพชรบุรี </option>
                <option value="เพชรบูรณ์">เพชรบูรณ์ </option>
                <option value="แพร่">แพร่ </option>
                <option value="พัทลุง">พัทลุง </option>
                <option value="ภูเก็ต">ภูเก็ต </option>
                <option value="มหาสารคาม">มหาสารคาม </option>
                <option value="มุกดาหาร">มุกดาหาร </option>
                <option value="แม่ฮ่องสอน">แม่ฮ่องสอน </option>
                <option value="ยโสธร">ยโสธร </option>
                <option value="ยะลา">ยะลา </option>
                <option value="ร้อยเอ็ด">ร้อยเอ็ด </option>
                <option value="ระนอง">ระนอง </option>
                <option value="ระยอง">ระยอง </option>
                <option value="ราชบุรี">ราชบุรี</option>
                <option value="ลพบุรี">ลพบุรี </option>
                <option value="ลำปาง">ลำปาง </option>
                <option value="ลำพูน">ลำพูน </option>
                <option value="เลย">เลย </option>
                <option value="ศรีสะเกษ">ศรีสะเกษ</option>
                <option value="สกลนคร">สกลนคร</option>
                <option value="สงขลา">สงขลา </option>
                <option value="สมุทรสาคร">สมุทรสาคร </option>
                <option value="สมุทรปราการ">สมุทรปราการ </option>
                <option value="สมุทรสงคราม">สมุทรสงคราม </option>
                <option value="สระแก้ว">สระแก้ว </option>
                <option value="สระบุรี">สระบุรี </option>
                <option value="สิงห์บุรี">สิงห์บุรี </option>
                <option value="สุโขทัย">สุโขทัย </option>
                <option value="สุพรรณบุรี">สุพรรณบุรี </option>
                <option value="สุราษฎร์ธานี">สุราษฎร์ธานี </option>
                <option value="สุรินทร์">สุรินทร์ </option>
                <option value="สตูล">สตูล </option>
                <option value="หนองคาย">หนองคาย </option>
                <option value="หนองบัวลำภู">หนองบัวลำภู </option>
                <option value="อำนาจเจริญ">อำนาจเจริญ </option>
                <option value="อุดรธานี">อุดรธานี </option>
                <option value="อุตรดิตถ์">อุตรดิตถ์ </option>
                <option value="อุทัยธานี">อุทัยธานี </option>
                <option value="อุบลราชธานี">อุบลราชธานี</option>
                <option value="อ่างทอง">อ่างทอง </option>
</select>
               </td>
               <td align = "left">รหัสไปรษณีย์ :</td><td><input type="text" name="Postnumber" size='30' maxlength='30' value="<?php echo $record['postnumber']; ?>" disabled></td>
               </tr>
                <tr><td colspan="2" align="right">เบอร์โทรศัพท์บ้าน :&nbsp;</td><td colspan="2" align="left"><input type="text" name="Hpnumber" value="<?php echo $record['hpnumber']; ?>" disabled></td></tr>
                <tr><td colspan="2" align="right">เบอร์โทรศัพท์มือถือ :&nbsp;</td><td colspan="2" align="left"><input type="text" name="Phonenumber" value="<?php echo $record['phonenumber']; ?>" disabled></td></tr>
                <tr><td colspan="2" align="right">อีเมล์ :&nbsp;</td><td colspan="2" align="left"><input type="text" name="Email" value="<?php echo $record['email']; ?>" disabled></td></tr>
                <tr><td colspan="2" align="right">ชื่อผู้ใช้งาน :&nbsp;</td><td colspan="2" align="left"><input type="text" name="Email" value="<?php echo $record['username']; ?>" disabled></td></tr>
                <tr><td colspan="4" align="center"><input type="submit" value="แก้ไขข้อมูล"></td></tr>
        </form>
    </table>
    </center>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>