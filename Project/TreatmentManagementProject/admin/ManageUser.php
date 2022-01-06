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
      $sql2="select userid,username,name,surname,level,status from user where name LIKE '%" . $wordsearch . "%' AND userid != $userid";
      $sql = "select userid,username,name,surname,level,status from user where name LIKE '%" . $wordsearch . "%' AND userid != $userid limit $pageprocess,5";
    }
    else if($typesearch=='2')
    {
      $sql2="select userid,username,name,surname,level,status from user where surname LIKE '%" . $wordsearch . "%' AND userid != $userid";
      $sql = "select userid,username,name,surname,level,status from user where surname LIKE '%" . $wordsearch . "%' AND userid != $userid limit $pageprocess,5";
    }
    else
    {
      $sql2="select userid,username,name,surname,level,status from user where userid != $userid";
      $sql = "select userid,username,name,surname,level,status from user where userid != $userid limit $pageprocess,5";
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
      $sql2="select userid,username,name,surname,level,status from user where name LIKE '%" . $wordsearch . "%' AND userid != $userid";
      $sql = "select userid,username,name,surname,level,status from user where name LIKE '%" . $wordsearch . "%' AND userid != $userid limit $pageprocess,5";
    }
    else if($typesearch=='2')
    {
      $sql2="select userid,username,name,surname,level,status from user where surname LIKE '%" . $wordsearch . "%' AND userid != $userid";
      $sql = "select userid,username,name,surname,level,status from user where surname LIKE '%" . $wordsearch . "%' AND userid != $userid limit $pageprocess,5";
    }
  }
  else
  {
    $sql2 ="select userid,username,name,surname,level,status from user where userid != $userid";
    $sql = "select userid,username,name,surname,level,status from user where userid != $userid limit $pageprocess,5";
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
function BlockUser(rec)
    {
      var r = confirm("ท่านต้องการระงับการใช้งานใช่หรือไม่?");
      if (r == true) 
      {
        window.open("AdminBlockUserSave.php?userid=" + rec,"_self");
      } 
      else 
      {
        
      }
  
    }
  function DelUser(rec)
  {
    var r = confirm("ท่านต้องการลบผู้ใช้งานใช่หรือไม่?");
      if (r == true) 
      {
        window.open("AdminDelUserSave.php?userid=" + rec,"_self");
      } 
      else 
      {
        
      }
  }
function UnlockUser(rec)
{
  var r = confirm("ท่านต้องการเปิดการใช้งานใช่หรือไม่?");
      if (r == true) 
      {
        window.open("AdminUnlockUserSave.php?userid=" + rec,"_self");
      } 
      else 
      {
        
      }
}
function ChangePasswordUser(rec)
{
        window.open("AdminChangePasswordUser.php?userid=" + rec,"_self");
}
function UserInfo(rec)
{
        window.open("AdminUserInfo.php?userid=" + rec,"_self");
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
        <a class="nav-link" href="#">ระบบฝ่ายบุคคล <span class="sr-only">(current)</span></a>
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
<br><br><br><br>
<center>
    <form action="ManageUser.php" method="get">
    <div style="width: 20%;">
    <select class="browser-default custom-select" name="typesearch" required>
        <option value = ''>----ประเภทสิ่งที่จะค้นหา----</option>
        <option value = 1>ชื่อ</option>
        <option value = 2>นามสกุล</option>
        </select>
        <table border="0">
        <tr>
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
        <th colspan="7">
        รายชื่อผู้ใช้งาน
        </th>
       </tr>
        <tr align="center">
            <th>ลำดับ</th>
            <th>รหัสบุคคล</th>
            <th>ชื่อ</th>
            <th>นามสกุล</th>
            <th>ตำแหน่ง</th>
            <th>สถานะ</th>
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
              echo "<td>$row[userid]</td>";
              echo "<td>$row[name]</td>";
              echo "<td>$row[surname]</td>";
              if($row['level'] == 1)
                {
                    echo "<td>ผู้ดูแลระบบ</td>";
                }
                else if($row['level'] == 2)
                {
                    echo "<td>สัตวแพทย์</td>";
                }
               else if($row['level'] == 3)
                {
                    echo "<td>พนักงาน</td>";
                }
                else if($row['level'] == 4)
                {
                    echo "<td>สมาชิก</td>";
                }
              if($row['status'] == 1)
              {
                echo "<td>พร้อมใช้งาน</td>";
              }
              else
              {
                echo "<td>ไม่พร้อมใช้งาน</td>";
              }
            ?>
            <td><button class="btn btn-info" onclick="UserInfo('<?php echo $row['userid']; ?>')">ดูข้อมูล</button>
            <button class="btn btn-primary" onclick="ChangePasswordUser('<?php echo $row['userid']; ?>')">เปลี่ยนรหัสผ่าน</button>
            <?php
            if($row['status'] == 1)
            {
            ?>
            <button class="btn btn-danger" onclick="BlockUser('<?php echo $row['userid']; ?>')">ระงับการใช้งาน</button>
            <?php
            }
            else
            {
            ?>
            <button class="btn btn-success" onclick="UnlockUser('<?php echo $row['userid']; ?>')">เปิดการใช้งาน</button>
            <?php
            }
            ?>
            <button class="btn btn-warning" onclick="DelUser('<?php echo $row['userid']; ?>')">ลบผู้ใช้งาน</button>
            </td>
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
          if(!empty($_GET['wordsearch']) && !empty($_GET['typesearch']))
          {
           ?>
           <a href='ManageUser.php?count=<?php echo $count ?>&page=<?php echo $i ?>&wordsearch=<?php echo $_GET['wordsearch'] ?>&typesearch=<?php echo $_GET['typesearch'] ?>'><?php echo $i; ?>&nbsp;</a>
           
           <?php
          }
          else
          {
            ?>
            <a href='ManageUser.php?count=<?php echo $count ?>&page=<?php echo $i ?>'><?php echo $i; ?>&nbsp;</a>
            <?php
          }
            $count+=5;
         }
        ?></td></tr>
        </tfoot>
    </table>
    </div>
    </center>
    <center><button type="button" class="btn btn-primary" style="margin-top: 10px;" onclick="window.open('AdminAddUser.php','_self');">เพิ่มผู้ใช้งาน</button></center>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>