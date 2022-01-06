<?php
session_start();
require("../mysql/config.php");
if($_SESSION['type'] != "admin")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$dshid = $_REQUEST['dshid'];
$sql ="select dshid,name,address,connumber from drugservicestorehouse where dshid=$dshid";
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
        <a class="nav-link" href="ManageDrugService.php">ระบบคลังยาและบริการ <span class="sr-only">(current)</span></a>
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
   <center><div class="head1">ข้อมูลคลังยาและบริการ</div></center>
   <center>
   <form action="AdminManageDrugServiceHouseEditSave.php" method="post">
    <table width = '50%' border = "1"  bgcolor = "#FFFFFF">
            <tr><td colspan="4" align="center">
            <input type="hidden" name="dshid" value="<?php echo $dshid ?>">
            รหัสคลังยาและบริการ :&nbsp;
            <input type="text" size='30' maxlength='1' onkeypress="return isNumber(event)" value="<?php echo $record['dshid']; ?>" disabled>
                </td></tr>
                <tr><td colspan="2" align="right">
            ชื่อคลังยาและบริการ :&nbsp;
            <td colspan="2" align="left">
            <input type="text" name="name" size='30' maxlength='30' value="<?php echo $record['name']; ?>" required>
                </td></tr>
                <tr><td colspan="2" align="right">
            ที่อยู่คลังยาและบริการ :&nbsp;
            <td colspan="2" align="left">
            <input type="text" name="address" size='30' maxlength='1' value="<?php echo $record['address']; ?>" required>
                </td></tr>
                <tr><td colspan="2" align="right">
            เบอร์ติดต่อ :&nbsp;
            <td colspan="2" align="left">
            <input type="text" name="connumber" size='30' maxlength='10' onkeypress="return isNumber(event)" value="<?php echo $record['connumber']; ?>" >
                </td></tr>
                <tr><td colspan="4" align="center"><input type="submit" value="บันทึกการแก้ไข"></td></tr>
        </form>
    </table>
    </center>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>