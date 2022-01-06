<?php
session_start();
require("../config/config.php");
if($_SESSION['type'] != "veterinary")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
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

   <center><div class="head1"><br>กรุณาเลือกระบบที่ต้องการ</div></center>
   <center>
   <table border="0">
   <tr>
   <td align="center" width="16%"><button type="button" class="btn btn-primary" style="height:150px;width:150px;" 
   onclick="window.open('<?php echo  $vetregissystem; ?>','_self');">ระบบทะเบียน</button></td>
   <td align="center" width="16%"><button type="button" class="btn btn-primary" style="height:150px;width:150px;" 
   onclick="window.open('<?php echo $vettreatment; ?>','_self');">ระบบตรวจรักษา</button></td>
   <td align="center" width="16%"><button type="button" class="btn btn-primary" style="height:150px;width:150px;" 
   onclick="window.open('<?php echo $vetpaydrug; ?>','_self');">ระบบจ่ายยา</button></td>
   <td align="center" width="16%"><button type="button" class="btn btn-primary" style="height:150px;width:150px;" 
   onclick="window.open('<?php echo $vetappointment; ?>','_self');">ระบบนัดหมาย</button></td>
   <td align="center" width="16%"><button type="button" class="btn btn-primary" style="height:150px;width:150px;" 
   onclick="window.open('<?php echo $vetdrugservice; ?>','_self');">ระบบคลังยาและบริการ</button></td>
   <td align="center" width="16%"><button type="button" class="btn btn-primary" style="height:150px;width:150px;" 
   onclick="window.open('<?php echo $veteditself; ?>','_self');">แก้ไขโปรไฟล์ส่วนตัว</button></td>
   </tr>
   </table>
   </center>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  

  </body>
  
</html>