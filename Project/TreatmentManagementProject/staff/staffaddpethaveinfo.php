<?php
session_start();
require("../config/config.php");
require("../mysql/config.php");
if($_SESSION['type'] != "staff")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$userid = $_REQUEST['userid'];
$sql = "select userid,name,surname from user where userid = $userid";
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
        function Petadd(rec,rec2)
            {
                window.open("staffaddpethaveinfosave.php?petid=" + rec +"&userid=" + rec2,"_self");
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
<center><div class="head1">เพิ่มข้อมูลสัตว์เลี้ยง</div></center>
   <center>
   <table width = '40%' border = "0"  bgcolor = "#FFFFFF">
    <input type="hidden" value="<?php echo $record['userid']; ?>" name="userid">
    <tr><td colspan="4" align="center">รหัสเจ้าของสัตว์เลี้ยง : <input type="text" size='30' maxlength='30' value="<?php echo $record['userid']; ?>" disabled></td></tr>
               <tr>
               <td align = "right">ชื่อ : </td><td><input type="text" name="Fname" size='30' maxlength='30' value="<?php echo $record['name']; ?>" disabled></td>
               <td align = "right">นามสกุล : </td><td><input type="text" name="Sname" size='30' maxlength='30' value="<?php echo $record['surname']; ?>" disabled></td>
               </tr>
    </table>
    <br>
   <form action="staffaddpethaveinfo.php" method="get">
<div style="width: 20%;">
<select class="browser-default custom-select" name="typesearch">
    <option value = -1>----ประเภทสิ่งที่จะค้นหา----</option>
    <option value = 1>ชื่อสัตว์เลี้ยง</option>
    </select>
    <table border="0">
    <tr>
    <input type="hidden" name="userid" value="<?php echo $userid; ?>">
<td><input class="form-control" type="text" name="wordsearch"></td><td><input class="btn btn-primary" type="submit" value="ค้นหา"></td>
</tr>
</table>
</div>
</form>
<br>
<div style="width: 80%;">
<table class="table table-hover" border="1" bgcolor="#FFFFFF">
<thead class="thead-dark">
   <tr bgcolor = "#d5f4e6" align="center">
    <th colspan="6">
    รายชื่อสัตว์เลี้ยงที่มี
    </th>
   </tr>
    <tr align="center">
        <th>ลำดับ</th>
        <th>รหัสสัตว์เลี้ยง</th>
        <th>ชื่อสัตว์เลี้ยง</th>
        <th>สายพันธุ์</th>
        <th>ดำเนินการ</th>
    </tr>
    </thead>
    
        <?php
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
                $sql2="SELECT petid,name AS petname,species from pet where name LIKE '%$wordsearch%'";
                $sql = "SELECT petid,name AS petname,species from pet where name LIKE '%$wordsearch%' limit $pageprocess,5";
            }
            else
            {
                $sql2="SELECT petid,name AS petname,species from pet";
                $sql = "SELECT petid,name AS petname,species from pet limit $pageprocess,5";
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
            $sql2="SELECT petid,name AS petname,species from pet";
            $sql = "SELECT petid,name AS petname,species from pet limit $pageprocess,5";
        }
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
          echo "<td>$row[petid]</td>";
          echo "<td>$row[petname]</td>";
          echo "<td>$row[species]</td>";

          
        ?>
        <td><button class="btn btn-info" onclick="Petadd('<?php echo $row['petid']; ?>','<?php echo $userid; ?>')">เลือก</button>
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
          if(!empty($_GET['wordsearch']) && !empty($_GET['typesearch']))
          {
           ?>
           <a href='staffaddpethaveinfo.php?count=<?php echo $count ?>&userid=<?php echo $userid ?>&page=<?php echo $i ?>&wordsearch=<?php echo $_GET['wordsearch'] ?>&typesearch=<?php echo $_GET['typesearch'] ?>'><?php echo $i; ?>&nbsp;</a>
           
           <?php
          }
          else
          {
            ?>
            <a href='staffaddpethaveinfo.php?count=<?php echo $count ?>&userid=<?php echo $userid ?>&page=<?php echo $i ?>'><?php echo $i; ?>&nbsp;</a>
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