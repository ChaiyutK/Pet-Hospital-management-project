<?php
session_start();
require("../config/config.php");
require("../mysql/config.php");
if($_SESSION['type'] != "member")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$userid = $_SESSION['userid'];
date_default_timezone_set('Asia/Bangkok');
$datestr = substr(date("Y-m-d H:i:s"),0,10);
if(!empty($_GET['wordsearch']))
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
        $sql2="SELECT `appointmentid`, `dateappoint`, `timeappoint`, `reason`, appointment.status AS status, pet.name AS petname ,appointment.PetID AS petid, `VetID`,user.Name AS vetname,user.Surname AS vetsurname FROM `appointment`,pet,ownerpet,user WHERE pet.PetID = ownerpet.PetID and pet.PetID = appointment.PetID and appointment.PetID = ownerpet.PetID and user.UserID = appointment.VetID and ownerpet.UserID = '$userid' and dateappoint LIKE '%$wordsearch%'";
        $sql = "SELECT `appointmentid`, `dateappoint`, `timeappoint`, `reason`, appointment.status AS status, pet.name AS petname ,appointment.PetID AS petid, `VetID`,user.Name AS vetname,user.Surname AS vetsurname FROM `appointment`,pet,ownerpet,user WHERE pet.PetID = ownerpet.PetID and pet.PetID = appointment.PetID and appointment.PetID = ownerpet.PetID and user.UserID = appointment.VetID and ownerpet.UserID = '$userid' and dateappoint LIKE '%$wordsearch%' limit $pageprocess,5";
    
    
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
    
    $sql2="SELECT `appointmentid`, `dateappoint`, `timeappoint`, `reason`, appointment.status AS status, pet.name AS petname ,appointment.PetID AS petid, `VetID`,user.Name AS vetname,user.Surname AS vetsurname FROM `appointment`,pet,ownerpet,user WHERE pet.PetID = ownerpet.PetID and pet.PetID = appointment.PetID and appointment.PetID = ownerpet.PetID and user.UserID = appointment.VetID and ownerpet.UserID = '$userid' and dateappoint LIKE '%$wordsearch%'";
    $sql = "SELECT `appointmentid`, `dateappoint`, `timeappoint`, `reason`, appointment.status AS status, pet.name AS petname ,appointment.PetID AS petid, `VetID`,user.Name AS vetname,user.Surname AS vetsurname FROM `appointment`,pet,ownerpet,user WHERE pet.PetID = ownerpet.PetID and pet.PetID = appointment.PetID and appointment.PetID = ownerpet.PetID and user.UserID = appointment.VetID and ownerpet.UserID = '$userid' and dateappoint LIKE '%$wordsearch%' limit $pageprocess,5";
  
  }
  else 
  {
  $sql2="SELECT `appointmentid`, `dateappoint`, `timeappoint`, `reason`, appointment.status AS status, pet.name AS petname ,appointment.PetID AS petid, `VetID`,user.Name AS vetname,user.Surname AS vetsurname FROM `appointment`,pet,ownerpet,user WHERE pet.PetID = ownerpet.PetID and pet.PetID = appointment.PetID and appointment.PetID = ownerpet.PetID and user.UserID = appointment.VetID and ownerpet.UserID = '$userid'";
  $sql = "SELECT `appointmentid`, `dateappoint`, `timeappoint`, `reason`, appointment.status AS status, pet.name AS petname ,appointment.PetID AS petid, `VetID`,user.Name AS vetname,user.Surname AS vetsurname FROM `appointment`,pet,ownerpet,user WHERE pet.PetID = ownerpet.PetID and pet.PetID = appointment.PetID and appointment.PetID = ownerpet.PetID and user.UserID = appointment.VetID and ownerpet.UserID = '$userid' limit $pageprocess,5";
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
<br><br>
<center>
<h2>ระบบนัดหมาย</h2>
<form action="memberappointment.php" method="get">
<div style="width: 20%;">
<input name="wordsearch" class="form-control" type="date" id="example-date-input" required>
    <table border="0">
    <tr>
<td><input class="btn btn-primary" type="submit" value="ค้นหา"></td>
</tr>
</table>
</div>
</form>
<br>
<div style="width: 80%;">
<table class="table table-hover" border="1" bgcolor="#FFFFFF">
<thead class="thead-dark">
   <tr bgcolor = "#d5f4e6" align="center">
    <th colspan="7">
    รายการนัดหมาย
    </th>
   </tr>
    <tr align="center">
        <th>ลำดับ</th>
        <th>เวลานัด</th>
        <th>วันที่นัด</th>
        <th>ชื่อสัตว์เลี้ยง</th>
        <th>สัตวแพทย์ที่นัด</th>
        <th>เหตุผล</th>
        <th>สถานะ</th>
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
          echo "<td>$row[timeappoint]</td>";
          $y=substr($row['dateappoint'],0,4);
          $m=substr($row['dateappoint'],5,2);
          $d=substr($row['dateappoint'],8,2);
          echo "<td>$d/$m/$y</td>";
          echo "<td>$row[petname]</td>";
          echo "<td>$row[vetname]&nbsp;$row[vetsurname]</td>";
          echo "<td>$row[reason]</td>";
          if($row['status'] == 1)
            {
                echo "<td>มาตามนัด</td>";
            }
            else if($row['status'] == 2)
            {
                echo "<td>รอการยืนยัน</td>";
            }
            else
            {
                echo "<td>ไม่มาตามที่นัดหมายไว้</td>";
            }

          
        ?>
        <?php
         
          echo "</tr>";
        }
        ?>
        <tfoot>
        <tr><td colspan=7 align="center"><?php
        //require("../mysql/unconnect.php");
        $sql=$sql2;
        require("../mysql/connect.php");
        $x=mysqli_num_rows($result);
         $count2=ceil($x/5);
         $count=0;
         for($i=1;$i<=$count2;$i++)
         {
          if(!empty($_GET['wordsearch']))
          {
           ?>
           <a href='memberappointment.php?count=<?php echo $count ?>&page=<?php echo $i ?>&wordsearch=<?php echo $_GET['wordsearch'] ?>'><?php echo $i; ?>&nbsp;</a>
           
           <?php
          }
          else
          {
            ?>
            <a href='memberappointment.php?count=<?php echo $count ?>&page=<?php echo $i ?>'><?php echo $i; ?>&nbsp;</a>
            <?php
          }
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