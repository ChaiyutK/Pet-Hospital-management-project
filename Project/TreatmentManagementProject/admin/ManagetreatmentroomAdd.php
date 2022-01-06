<?php
session_start();
require("../mysql/config.php");
if($_SESSION['type'] != "admin")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$userid = $_SESSION['userid'];
if(!empty($_GET['wordsearch']) && !empty($_GET['typesearch']))
{
  if(!empty($_REQUEST['page']))
  {
    $page=$_REQUEST['page'];
  }
  else
  {
    $page=1;
  }
    $pageprocess=($page*5)-5;
    $wordsearch = $_REQUEST['wordsearch'];
    $typesearch = $_REQUEST['typesearch'];
    if($typesearch=='1')
    {
        $sql2 ="SELECT `TreatmentRoomID`, `Name`, `VetID` FROM `treatmentroom` where Name LIKE '%" . $wordsearch . "%'";
        $sql = "SELECT `TreatmentRoomID`, `Name`, `VetID` FROM `treatmentroom` where Name LIKE '%" . $wordsearch . "%' limit $pageprocess,5";
    }
    else
    {
      
        $sql2 ="SELECT `TreatmentRoomID`, `Name`, `VetID` FROM `treatmentroom`";
        $sql = "SELECT `TreatmentRoomID`, `Name`, `VetID` FROM `treatmentroom` limit $pageprocess,5";
    }
}
else
{
  if(!empty($_REQUEST['page']))
  {
    $page=$_REQUEST['page'];
  }
  else
  {
    $page=1;
  }
  $pageprocess=($page*5)-5;
  if(isset($_GET['wordsearch']))
  {
    $wordsearch = $_REQUEST['wordsearch'];
    $typesearch = $_REQUEST['typesearch'];
    if($typesearch=='1')
    {
        $sql2 ="SELECT `TreatmentRoomID`, `Name`, `VetID` FROM `treatmentroom` where Name LIKE '%" . $wordsearch . "%'";
        $sql = "SELECT `TreatmentRoomID`, `Name`, `VetID` FROM `treatmentroom` where Name LIKE '%" . $wordsearch . "%' limit $pageprocess,5";
      }
  }
  else
  {
    $sql2 ="SELECT `TreatmentRoomID`, `Name`, `VetID` FROM `treatmentroom`";
    $sql = "SELECT `TreatmentRoomID`, `Name`, `VetID` FROM `treatmentroom` limit $pageprocess,5";
  }
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
    function TreatmentroomDel(rec)
  {
    var r = confirm("ท่านต้องการลบห้องตรวจนี้ใช่หรือไม่?");
      if (r == true) 
      {
        window.open("ManagetreatmentroomDel.php?treatmentroomid=" + rec,"_self");
      } 
      else 
      {
        
      }
  }
function TreatmentroomEdit(rec)
{
        window.open("ManagetreatmentroomEdit.php?treatmentroomid=" + rec,"_self");
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
<br><br>
<h1 align="center" class="head1 ">เพิ่มห้องตรวจ</h1>
<center>
    <br>
    <div style="width: 80%;">
    <form action="ManagetreatmentroomAddSave.php" method="post">
    <table width = '50%' border = "1"  bgcolor = "#FFFFFF">
            <tr><td colspan="2" align="right">
            รหัสห้องตรวจ :&nbsp;
            <td colspan="2" align="left">
            <input type="text" size='30' name="roomid" maxlength='2' onkeypress="return isNumber(event)" required>
                </td></tr>
                <tr><td colspan="2" align="right">
            ชื่อห้องตรวจ :&nbsp;
            <td colspan="2" align="left">
            <input type="text" name="roomname" size='30' maxlength='50' required>
                </td></tr>
                <tr><td colspan="4" align="center"><input type="submit" value="บันทึก"></td></tr>
        </form>
    </table>
    </div>
    </center>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>