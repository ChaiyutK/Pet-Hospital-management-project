<?php
session_start();
require("../config/config.php");
require("../mysql/config.php");

if($_SESSION['type'] != "staff")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$petid = $_REQUEST['petid'];
$sql = "SELECT user.userid AS userid,pet.petid AS petid,pet.name AS petname,user.Name AS ownername,user.Surname AS ownersurname FROM user,ownerpet,pet where pet.PetID = ownerpet.PetID and user.userid = ownerpet.userid and pet.petid = $petid";
    require("../mysql/connect.php");
    $record = mysqli_fetch_array($result);
    $i=0;
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
.modal-open {
    overflow: hidden;
    padding-right: 0 !important;
}
textarea {
  resize: none;
}         
      </style>
      <script>
        function PetinfoDel(rec)
            {
              var r = confirm("ท่านต้องการลบข้อมูลสัตว์เลี้ยงใช่หรือไม่?");
                if (r == true) 
                {
                  window.open("staffpetdel.php?petid=" + rec ,"_self");
                } 
                else 
                {
            
                }
               
            }

        function OwnerEdit(rec)
            {
                window.open("staffowneredit.php?userid=" + rec,"_self");
            }

        function PetOwnerDel(rec,rec2)
            { 
                var r = confirm("ท่านต้องเจ้าของสัตว์เลี้ยงคนนี้ออกจากการเป็นเจ้าของใช่หรือไม่?");
                if (r == true) 
                {
                window.open("staffpetandownerdel.php?petid=" + rec + "&userid=" + rec2,"_self");
                } 
                else 
                {
            
                }
            }
            function OwnerInfo(rec,rec2)
            {
                window.open("staffpetandownerinfo.php?userid=" + rec2 + "&petid=" + rec,"_self");
            }
        function selectchange()
        {
            var str = document.getElementById("treatmentroomid").value;
            var vetname = str.substring(3);
            document.getElementById("vetname").innerHTML = vetname;
            
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
   <form action="AdminEditUser.php?userid='<?php echo $userid ?>'" method="post">
   <table width='55%' border="0" bgcolor="#FFFFFF">
   <tr>
   <td align="center" width="20%">
   <a href="staffpetinfo.php?petid=<?php echo $petid; ?>" class="btn btn-light" role="button" style="height:100%;width:100%;">ข้อมูลสัตว์เลี้ยง</a>
   </td>
   <td align="center" width="20%">
   <a href="stafftreatmentpet.php?petid=<?php echo $petid; ?>" class="btn btn-light" role="button" style="height:100%;width:100%;">ประวัติการรักษา</a>
   </td>
   <td align="center" width="20%">
   <a href="staffvaccinepet.php?petid=<?php echo $petid; ?>" class="btn btn-light" role="button" style="height:100%;width:100%;">ประวัติการฉีดวัคซีน</a>
   </td>
   <td align="center" width="20%">
   <a href="#" class="btn btn-info" role="button" style="height:100%;width:100%;">ข้อมูลเจ้าของสัตว์เลี้ยง</a>
   </td>
   <td align="center" width="20%">
   <a href="staffpetappointmentsearch.php?petid=<?php echo $petid; ?>" class="btn btn-light" role="button" style="height:100%;width:100%;">นัดหมาย</a>
   </td>
   </tr>
   <tr><td colspan="5">

    <table class="table table-hover" border="2" bgcolor="#FFFFFF">
<thead class="thead-dark">
    <tr align="center">
        <th>ลำดับ</th>
        <th>รหัสเจ้าของสัตว์เลี้ยง</th>
        <th>ชื่อ-นามสกุล</th>
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
          echo "<td>$row[userid]</td>";
          echo "<td width='20%'>$row[ownername]&nbsp;$row[ownersurname]</td>";
        ?>
        <td>
        <button class="btn btn-info" onclick="OwnerInfo('<?php echo $row['petid']; ?>','<?php echo $row['userid']; ?>')">ดูข้อมูล</button>
        <button class="btn btn-danger" onclick="PetOwnerDel('<?php echo $row['petid']; ?>','<?php echo $row['userid']; ?>')">ลบเจ้าของสัตว์เลี้ยง</button>
        </td>
         <?php
          echo "</tr>";
        }
        ?>
</table>
    </td></tr>
</table>
<br>

    </center>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            
    

  
  </body>
    
</html>
