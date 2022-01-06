<?php
session_start();
require("../config/config.php");
require("../mysql/config.php");

if($_SESSION['type'] != "staff")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$petid = $_REQUEST['petid'];
$sql = "SELECT pet.PetID AS petid,pet.gender AS gender,pet.birthday AS birthday,pet.sterilization AS sterilization,pet.Name AS petname,pet.Species AS species,pettype.name AS pettype,pettype.pettypeid AS pettypeid FROM pet,pettype where pet.pettypeid = pettype.pettypeid and pet.petid = $petid";
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
                  window.open("staffpetdel.php?petid=" + rec + "&userid=" + rec2,"_self");
                } 
                else 
                {
            
                }
               
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
<center><div class="head1">ข้อมูลสัตว์เลี้ยง</div></center>
   <center>
   <table width='55%' border="0" bgcolor="#FFFFFF">
   <tr>
   <td align="center" width="20%">
   <a href="#" class="btn btn-info" role="button" style="height:100%;width:100%;">ข้อมูลสัตว์เลี้ยง</a>
   </td>
   <td align="center" width="20%">
   <a href="stafftreatmentpet.php?petid=<?php echo $petid; ?>" class="btn btn-light" role="button" style="height:100%;width:100%;">ประวัติการรักษา</a>
   </td>
   <td align="center" width="20%">
   <a href="staffvaccinepet.php?petid=<?php echo $petid; ?>" class="btn btn-light" role="button" style="height:100%;width:100%;">ประวัติการฉีดวัคซีน</a>
   </td>
   <td align="center" width="20%">
   <a href="staffpetandowner.php?petid=<?php echo $petid; ?>" class="btn btn-light" role="button" style="height:100%;width:100%;">ข้อมูลเจ้าของสัตว์เลี้ยง</a>
   </td>
   <td align="center" width="20%">
   <a href="staffpetappointmentsearch.php?petid=<?php echo $petid; ?>" class="btn btn-light" role="button" style="height:100%;width:100%;">นัดหมาย</a>
   </td>
   </tr>
   <tr><td colspan="5">
   <form action="staffpeteditsave.php" method="post">
    <table width = '100%' border = "1"  bgcolor = "#FFFFFF">
                <tr><td colspan="5" align="center">รหัสสัตว์เลี้ยง : <input type="text" size='30' maxlength='30' value="<?php echo $record['petid'] ?>" disabled>
                <input type="hidden" name="petid" value="<?php echo $petid; ?>">
                </td></tr>
                <tr>
               <td align = "right" width="10%">ชื่อ : </td>
               <td width="10%"><input type="text" name="petname" size='30' maxlength='30' value="<?php echo $record['petname'] ?>"></td>
               <?php 
               $sql2="select pettypeid,name from pettype";
               $pettype = mysqli_query($connect, $sql2); 
               
               ?>
               <td align = "right" width="13%">ประเภท : </td>
               <td align = "left">
               <select name="pettype" required>
               <option value="">กรุณาเลือกประเภทสัตว์เลี้ยง</option>
               <?php 
               
               while($row=mysqli_fetch_array($pettype)){
                 ?>
               <option value='<?php echo $row['pettypeid']; ?>' <?=$row['pettypeid'] == $record['pettypeid'] ? ' selected="selected"' : '';?>><?php echo $row['name']?></option>
               <?php
            }
            
               ?>
               </select>
               </td>
               </tr><tr>
               <td align = "right" width="6%">เพศ : </td>
               <td>
               <label>
                <input type="radio" name="gender" value="1"<?=$record['gender'] == '1' ? ' checked="checked"' : '';?> required>&nbsp;ผู้
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="radio" name="gender" value="2"<?=$record['gender'] == '2' ? ' checked="checked"' : '';?> required>&nbsp;เมีย
                </label>
               </td>
               <td align = "right" width="13%">วันเกิด : </td>
               <td align = "left"><input name="birthday" class="form-control" type="date" id="example-date-input" value="<?php echo $record['birthday'] ?>" required>
               </tr>
               <tr>
               <td align = "right">สายพันธุ์ : </td><td><input type="text" name="species" size='30' maxlength='30' value="<?php echo $record['species']; ?>" required></td>
               <td align = "right" width="13%">ทำหมัน : </td>
               <td>
               <label>
                <input type="radio" name="sterilization" value="1"<?=$record['sterilization'] == '1' ? ' checked="checked"' : '';?> required>&nbsp;ทำแล้ว
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="radio" name="sterilization" value="2"<?=$record['sterilization'] == '2' ? ' checked="checked"' : '';?> required>&nbsp;ยังไม่ทำ
                </label>
               </td>
               </tr>
                <tr><td colspan="4" align="center"><input type="submit" value="บันทึก"></td></tr>
        </form>
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
