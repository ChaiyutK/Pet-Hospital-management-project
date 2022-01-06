<?php
session_start();
require("../mysql/config.php");
if($_SESSION['type'] != "admin")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$userid = $_REQUEST['userid'];

    $sql = "select userid,username,name,surname,level,status from user where userid = $userid";
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
  font-size: 60px;
}
.btmenu {
 margin: 5%;
}
         
      </style>
<script>
function chkdata()
    {
        
        var pwd1 = document.getElementById("NewPwd").value;
        var pwd2 = document.getElementById("NewPwd2").value;
        if(pwd1 == pwd2)
        {
            return true;
        }
        else
        {
            alert("รหัสผ่านไม่ตรงกัน");
            return false;
        }
    }
</script>
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
        <a class="nav-link" href="#">ระบบฝ่ายบุคคล <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">ระบบคลังยาและบริการ <span class="sr-only">(current)</span></a>
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
<center><div class="head1">เปลี่ยนรหัสผ่าน</div></center>
   <center>
   <form action="AdminChangePasswordUserSave.php?userid='<?php echo $userid ?>'" method="post" onsubmit='Javascript:return chkdata()'>
    <table width = '50%' border = "0"  bgcolor = "#FFFFFF">               
               <tr>
               <td align = "right">ชื่อ : </td><td><input type="text" name="Fname" size='30' maxlength='30' value="<?php echo $record['name']; ?>" disabled></td>
               <td align = "left">นามสกุล : </td><td><input type="text" name="Sname" size='30' maxlength='30' value="<?php echo $record['surname']; ?>" disabled></td>
               </tr>
               <tr>
                <tr><td colspan="2" align="right">ตำแหน่ง :&nbsp;</td><td colspan="2" align="left">
                <?php 
                if($record['level'] == 1) 
               {
                   echo "<input type='text' value='ผู้ดูแลระบบ' disabled>";
               }
               else if($record['level'] == 2)
               {
                echo "<input type='text' value='สัตวแพทย์' disabled>";
               }
               else if($record['level'] == 3)
               {
                echo "<input type='text' value='พนักงานทั่วไป' disabled>";
               }
               else if($record['level'] == 4)
               {
                echo "<input type='text' value='สมาชิก' disabled>";
               } ?>
                <tr><td colspan="2" align="right">รหัสผ่านใหม่ :&nbsp;</td><td colspan="2" align="left">
                <input type="password" id="NewPwd" name="NewPwd" required></td></tr>
                <tr><td colspan="2" align="right">ยืนยันรหัสผ่านใหม่ :&nbsp;</td><td colspan="2" align="left">
                <input type="password" id="NewPwd2" name="NewPwd2" required></td></tr>
                <tr><td colspan="4" align="center"><input type="submit" value="บันทึก"></td></tr>

        </form>
    </table>
    </center>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>