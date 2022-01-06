<?php
session_start();
require("../config/config.php");
require("../mysql/config.php");

if($_SESSION['type'] != "staff")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$petid = $_REQUEST['petid'];
$sql = "SELECT pet.PetID AS petid,pet.gender AS gender,pet.birthday AS birthday,pet.sterilization AS sterilization,pet.Name AS petname,pet.Species AS species,pettype.name AS pettype FROM pet,pettype where pet.pettypeid = pettype.pettypeid and pet.petid = $petid";
    require("../mysql/connect.php");
    $record = mysqli_fetch_array($result);
    $y=substr($record['birthday'],0,4);
    $m=substr($record['birthday'],5,2);
    $d=substr($record['birthday'],8,2);
    $birthday = $d . '/' . $m . '/' . $y;
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
        function PetinfoDel(rec,rec2)
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
        function selectchange()
        {
            var str = document.getElementById("treatmentroomid").value;
            var vet = str.split(',');
            var vetname = vet[1];
            document.getElementById("vetid").value = vet[2];
            //document.getElementById("treatmentroomid").value = vet[0];
            if(vet[2])
            {
              document.getElementById("vetname").innerHTML = vetname;  
            }
            else
            {
            document.getElementById("vetname").innerHTML = '';
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
   <form action="staffpetedit.php" method="post">
   <input type="hidden" name="petid" value="<?php echo $petid; ?>">
    <table width = '100%' border = "1"  bgcolor = "#FFFFFF">
                <tr><td colspan="5" align="center">รหัสสัตว์เลี้ยง : <input type="text" name="petname" size='30' maxlength='30' value="<?php echo $record['petid'] ?>" disabled></td></tr>
                <tr>
               <td align = "right" width="10%">ชื่อ : </td>
               <td width="10%"><input type="text" size='30' maxlength='30' value="<?php echo $record['petname'] ?>" disabled></td>
               <td align = "right" width="13%">ประเภท : </td>
               <td align = "left"><input type="text" size='30' maxlength='30' value="<?php echo $record['pettype'] ?>" disabled></td>
               </tr><tr>
               <td align = "right" width="6%">เพศ : </td>
               <td>
               <label>
                <input type="radio" name="gender" value="1"<?=$record['gender'] == '1' ? ' checked="checked"' : '';?> disabled>&nbsp;ผู้
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="radio" name="gender" value="2"<?=$record['gender'] == '2' ? ' checked="checked"' : '';?> disabled>&nbsp;เมีย
                </label>
               </td>
               <td align = "right" width="13%">วันเกิด : </td>
               <td align = "left"><input type="text" size='30' maxlength='30' value="<?php echo $birthday; ?>" disabled></td>
               </tr>
               <tr>
               <td align = "right">สายพันธุ์ : </td><td><input type="text" size='30' maxlength='30' value="<?php echo $record['species']; ?>" disabled></td>
               <td align = "right" width="13%">ทำหมัน : </td>
               <td>
               <label>
                <input type="radio" name="sterilization" value="1"<?=$record['sterilization'] == '1' ? ' checked="checked"' : '';?> disabled>&nbsp;ทำแล้ว
                </label>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <label>
                  <input type="radio" name="sterilization" value="2"<?=$record['sterilization'] == '2' ? ' checked="checked"' : '';?> disabled>&nbsp;ยังไม่ทำ
                </label>
               </td>
               </tr>
                <tr><td colspan="4" align="center"><input type="submit" value="แก้ไขข้อมูล"></td></tr>
        </form>
    </table>
    </td></tr>
</table>
<br>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-success" data-toggle="modal" data-target="#treatment">ส่งตรวจ</button>
  <button type="button" class="btn btn-danger" onclick="PetinfoDel('<?php echo $record['petid']; ?>')">ลบข้อมูลสัตว์เลี้ยง</button>
  <!-- Modal -->
  <div class="modal fade" id="treatment" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">ส่งตรวจ</h4>
        </div>
        <div class="modal-body">
        <form action="staffpetsendtreatment.php" method="post">
          <table border='0'>
          <tr>
          <td>ชื่อสัตว์เลี้ยง : <?php echo $record['petname']; ?></td>
          </tr>
          <tr>
          <td>ห้องตรวจ : <select name="treatmentroomid" id="treatmentroomid" onchange="selectchange()" required>
               <option value="">กรุณาเลือกห้องตรวจ</option>
               <?php
               
                
               require("../mysql/unconnect.php");
               
               $sql="select treatmentroomid,treatmentroom.name as roomname,vetid,user.name AS vetname,user.surname AS vetsurname from treatmentroom,user where vetid=user.userid and vetid IS NOT NULL";
               require("../mysql/connect.php");
               while($row=mysqli_fetch_array($result)){
    
                $i = $i+1;
               echo "<option value='$row[treatmentroomid],$row[vetname] $row[vetsurname],$row[vetid]'>$row[roomname]</option>";
               
            }
            $sql = "SELECT pet.PetID AS petid,pet.gender AS gender,pet.birthday AS birthday,pet.sterilization AS sterilization,user.userid AS userid,user.Name AS ownername,user.Surname AS ownersurname,pet.Name AS petname,pet.Species AS species,pettype.name AS pettype FROM ownerpet,pet,user,pettype where pet.PetID = ownerpet.PetID and ownerpet.UserID  = user.UserID and pet.pettypeid = pettype.pettypeid and user.userid = $userid and pet.petid = $petid";
    require("../mysql/connect.php");
    $record = mysqli_fetch_array($result);
               ?>
               </select></td>
          </tr>
          <input type="hidden" name="vetid" id="vetid" value="">
          <input type="hidden" name="petid" value="<?php echo $petid; ?>">
          <tr><td>สัตวแพทย์ : <span id="vetname"></span></td></tr>
          <tr><td>มาด้วยอาการอะไร : <textarea id="chiefcom" name="chiefcom" rows="4" cols="60" maxlength="255" required>
</textarea></td></tr>
          </table>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
        <input type="submit" class="btn btn-primary" value="ส่งตรวจ">
        </form>
        </div>
      </div>
      
    </div>
  </div>

    </center>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
            
    

  
  </body>
    
</html>
