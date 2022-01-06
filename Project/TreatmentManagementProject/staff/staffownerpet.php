<?php
session_start();
require("../config/config.php");
require("../mysql/config.php");

if($_SESSION['type'] != "staff")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$userid = $_REQUEST['userid'];
$sql = "SELECT pet.PetID AS petid,user.Name AS ownername,user.Surname AS ownersurname,pet.Name AS petname,pet.Species as species,user.userid AS userid FROM ownerpet,pet,user where pet.PetID = ownerpet.PetID and ownerpet.UserID  = user.UserID and Ownerpet.userID = $userid";
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
        function PetInfo(rec,rec2)
            {
                window.open("staffpetinfo.php?petid=" + rec + "&userid=" + rec2,"_self");
            }

        function OwnerEdit(rec)
            {
                window.open("staffowneredit.php?userid=" + rec,"_self");
            }

        function OwnerDel(rec)
            { 
                var r = confirm("ท่านต้องการลบข้อมูลเจ้าของสัตว์เลี้ยงใช่หรือไม่?");
                if (r == true) 
                {
                window.open("staffownerdel.php?userid=" + rec,"_self");
                } 
                else 
                {
            
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
        <a class="nav-link" href="<?php echo $staffregissystem; ?>">ระบบทะเบียน <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo $staffpaysystem; ?>">ระบบคิดเงิน <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo $staffappointment; ?>">ระบบนัดหมาย <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo $staffeditself; ?>">แก้ไขโปรไฟล์ส่วนตัว <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <span class = "badge badge-warning" style="font-family: 'TH SarabunPSK';font-weight: bold;"><h4><?php echo $_SESSION['name'] . "&nbsp;พนักงานทั่วไป" ."&nbsp;
    <a href = '../logout.php'>logout</a>" ?></h4></span>
  </div>
</nav>
<br><br>
<center><div class="head1">ข้อมูลเจ้าของสัตว์เลี้ยง</div></center>
   <center>
   <table width='50%' border="0">
   <tr>
   <td colspan="2" align="center" width="50%" bgcolor="#FFFFFF">
   <a href="staffownerinfo.php?userid=<?php echo $userid; ?>" class="btn btn-default" role="button" style="height:100%;width:100%;">ข้อมูลเจ้าของสัตว์เลี้ยง</a>
   </td>
   <td colspan="2" align="center" width="50%" bgcolor="#FFFFFF">
   <a href="#" class="btn btn-info" role="button" style="height:100%;width:100%;">สัตว์เลี้ยงที่มี</a>
   </td>
   </tr>
   <tr><td colspan="4">
   <table class="table table-hover" border="2" bgcolor="#FFFFFF">
<thead class="thead-dark">
    <tr align="center">
        <th>ลำดับ</th>
        <th>รหัสสัตว์เลี้ยง</th>
        <th>ชื่อเจ้าของสัตว์</th>
        <th>ชื่อสัตว์เลี้ยง</th>
        <th>สายพันธุ์</th>
        <th>ดำเนินการ</th>
    </tr>
    </thead>
    
        <?php
        
        $count = 0;
    
        require("../mysql/connect.php");
        
        while($row = mysqli_fetch_array($result))
        {
        $count++;
          echo "<tr align='center'>";
          echo "<td>$count</td>";
          echo "<td>$row[petid]</td>";
          echo "<td width='20%'>$row[ownername]&nbsp;$row[ownersurname]</td>";
          echo "<td>$row[petname]</td>";
          echo "<td>$row[species]</td>";

          
        ?>
        <td><button class="btn btn-info" onclick="PetInfo('<?php echo $row['petid']; ?>','<?php echo $row['userid']; ?>')">ดูข้อมูล</button>
        </td>
         <?php
          echo "</tr>";
        }
        ?>
</table>
    </td></tr>
</table>
    </center>
<center><button type="button" class="btn btn-primary" style="margin-top: 10px;" onclick="window.open('staffaddpetchoose.php?userid=<?php echo $userid; ?>','_self');">เพิ่มข้อมูลสัตว์เลี้ยง</button></center>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>