<?php
session_start();
require("../config/config.php");
require("../mysql/config.php");
if($_SESSION['type'] != "veterinary")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$userid = $_SESSION['userid'];
$sql="select treatmentroomid,treatmentroom.name as roomname,vetid from treatmentroom where vetid = $userid";
require("../mysql/connect.php");
$record = mysqli_fetch_array($result);

if(empty($record['vetid']))
{
    echo "<script>alert('กรุณาเลือกห้องตรวจก่อน');window.open('vetchooseroom.php','_self');</script>";
}
if(!empty($_REQUEST['page']))
  {
    $page=$_REQUEST['page'];
  }
  else
  {
    $page=1;
  }
  $pageprocess=($page*5)-5;
$roomid = $record['treatmentroomid'];
$sql2="SELECT `treatmentid`, `DateTreatment`, treatment.Status AS Status, `VetID`,treatment.PetID AS petid, `TreatmentRoomID`,pet.Name AS petname,user.Name AS vetname,pettype.Name AS pettype FROM treatment,pet,pettype,user WHERE treatment.VetID = user.UserID and treatment.PetID = pet.PetID and pet.PetTypeID = pettype.PetTypeID and treatment.Status = 1 and vetid = $userid and treatmentroomid = '$roomid'";
$sql="SELECT `treatmentid`, `DateTreatment`, treatment.Status AS Status, `VetID`,treatment.PetID AS petid, `TreatmentRoomID`,pet.Name AS petname,user.Name AS vetname,pettype.Name AS pettype FROM treatment,pet,pettype,user WHERE treatment.VetID = user.UserID and treatment.PetID = pet.PetID and pet.PetTypeID = pettype.PetTypeID and treatment.Status = 1 and vetid = $userid and treatmentroomid = '$roomid' limit $pageprocess,5";

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
        window.open("vettreatmentadd_1.php?petid=" + rec + "&treatmentid=" + rec2 ,"_self");
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

   <center><div class="head1"><br><?php echo $record['roomname']; ?></div></center>
   <center>
   <div style="width: 80%;">
<table class="table table-hover" border="1" bgcolor="#FFFFFF">
<thead class="thead-dark">
   <tr bgcolor = "#d5f4e6" align="center">
    <th colspan="6">
    รายการตรวจรักษา
    </th>
   </tr>
    <tr align="center">
        <th>ลำดับ</th>
        <th>รหัสการรักษา</th>
        <th>รหัสสัตว์เลี้ยง</th>
        <th>ชื่อสัตว์เลี้ยง</th>
        <th>สายพันธุ์</th>
        <th>ดำเนินการ</th>
    </tr>
    </thead>
    
        <?php
        if(empty($_REQUEST['count']))
        {
          $count = 0;  
        }
        else
        {
          $count = $_REQUEST['count'];
        }
        
    
        require("../mysql/connect.php");
        
        while($row = mysqli_fetch_array($result))
        {
        $count++;
          echo "<tr align='center'>";
          echo "<td>$count</td>";
          echo "<td>$row[treatmentid]</td>";
          echo "<td>$row[petid]</td>";
          echo "<td>$row[petname]</td>";
          echo "<td>$row[pettype]</td>";

          
        ?>
        <td><button class="btn btn-info" onclick="pettreatment('<?php echo $row['petid']; ?>','<?php echo $row['treatmentid']; ?>')">ตรวจ</button>
        </td>
         <?php
          echo "</tr>";
        }
        ?>
        <tfoot>
        <tr><td colspan=6 align="center"><?php
        //require("../mysql/unconnect.php");
        $sql=$sql2;
        require("../mysql/connect.php");
        $x=mysqli_num_rows($result);
         $count2=ceil($x/5);
         $count=0;
         for($i=1;$i<=$count2;$i++)
         {
          
           ?>
            <a href='vetshowtreatment.php?count=<?php echo $count ?>&page=<?php echo $i ?>'><?php echo $i; ?>&nbsp;</a>
            <?php
          
            $count+=5;
         }
        ?></td></tr>
        </tfoot>
</table>
</div>
   </center>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  

  </body>
  
</html>