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
        $sql2 ="select drugserviceinfo.DrugID AS drugid,drugservicecatagory.type AS typeofdrugid,drugserviceinfo.name AS name,drugservicecatagory.Name AS type,manufacturer.CompanyName AS companyname,properties,instruction,extra from drugserviceinfo,drugservicecatagory,manufacturer where drugserviceinfo.DcID = drugservicecatagory.DcID and drugserviceinfo.manufactid = manufacturer.ManufactID and drugserviceinfo.drugid LIKE '%" . $wordsearch . "%'";
        $sql = "select drugserviceinfo.DrugID AS drugid,drugservicecatagory.type AS typeofdrugid,drugserviceinfo.name AS name,drugservicecatagory.Name AS type,manufacturer.CompanyName AS companyname,properties,instruction,extra from drugserviceinfo,drugservicecatagory,manufacturer where drugserviceinfo.DcID = drugservicecatagory.DcID and drugserviceinfo.manufactid = manufacturer.ManufactID and drugserviceinfo.drugid LIKE '%" . $wordsearch . "%' limit $pageprocess,5";
    }
    else if($typesearch=='2')
    {
        $sql2 ="select drugserviceinfo.DrugID AS drugid,drugservicecatagory.type AS typeofdrugid,drugserviceinfo.name AS name,drugservicecatagory.Name AS type,manufacturer.CompanyName AS companyname,properties,instruction,extra from drugserviceinfo,drugservicecatagory,manufacturer where drugserviceinfo.DcID = drugservicecatagory.DcID and drugserviceinfo.manufactid = manufacturer.ManufactID and drugserviceinfo.name LIKE '%" . $wordsearch . "%'";
        $sql = "select drugserviceinfo.DrugID AS drugid,drugservicecatagory.type AS typeofdrugid,drugserviceinfo.name AS name,drugservicecatagory.Name AS type,manufacturer.CompanyName AS companyname,properties,instruction,extra from drugserviceinfo,drugservicecatagory,manufacturer where drugserviceinfo.DcID = drugservicecatagory.DcID and drugserviceinfo.manufactid = manufacturer.ManufactID and drugserviceinfo.name LIKE '%" . $wordsearch . "%' limit $pageprocess,5";
    }
    else
    {
        $sql2 ="select drugserviceinfo.DrugID AS drugid,drugservicecatagory.type AS typeofdrugid,drugserviceinfo.name AS name,drugservicecatagory.Name AS type,manufacturer.CompanyName AS companyname,properties,instruction,extra from drugserviceinfo,drugservicecatagory,manufacturer where drugserviceinfo.DcID = drugservicecatagory.DcID and drugserviceinfo.manufactid = manufacturer.ManufactID";
        $sql = "select drugserviceinfo.DrugID AS drugid,drugservicecatagory.type AS typeofdrugid,drugserviceinfo.name AS name,drugservicecatagory.Name AS type,manufacturer.CompanyName AS companyname,properties,instruction,extra from drugserviceinfo,drugservicecatagory,manufacturer where drugserviceinfo.DcID = drugservicecatagory.DcID and drugserviceinfo.manufactid = manufacturer.ManufactID and drugserviceinfo.name LIKE '%" . $wordsearch . "%' limit $pageprocess,5";
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
    $pageprocess=($page*5)-5;
    $wordsearch = $_REQUEST['wordsearch'];
    $typesearch = $_REQUEST['typesearch'];
    if($typesearch=='1')
    {
        $sql2 ="select drugserviceinfo.DrugID AS drugid,drugservicecatagory.type AS typeofdrugid,drugserviceinfo.name AS name,drugservicecatagory.Name AS type,manufacturer.CompanyName AS companyname,properties,instruction,extra from drugserviceinfo,drugservicecatagory,manufacturer where drugserviceinfo.DcID = drugservicecatagory.DcID and drugserviceinfo.manufactid = manufacturer.ManufactID and drugserviceinfo.drugid LIKE '%" . $wordsearch . "%'";
        $sql = "select drugserviceinfo.DrugID AS drugid,drugservicecatagory.type AS typeofdrugid,drugserviceinfo.name AS name,drugservicecatagory.Name AS type,manufacturer.CompanyName AS companyname,properties,instruction,extra from drugserviceinfo,drugservicecatagory,manufacturer where drugserviceinfo.DcID = drugservicecatagory.DcID and drugserviceinfo.manufactid = manufacturer.ManufactID and drugserviceinfo.drugid LIKE '%" . $wordsearch . "%' limit $pageprocess,5";
    }
    else if($typesearch=='2')
    {
        $sql2 ="select drugserviceinfo.DrugID AS drugid,drugservicecatagory.type AS typeofdrugid,drugserviceinfo.name AS name,drugservicecatagory.Name AS type,manufacturer.CompanyName AS companyname,properties,instruction,extra from drugserviceinfo,drugservicecatagory,manufacturer where drugserviceinfo.DcID = drugservicecatagory.DcID and drugserviceinfo.manufactid = manufacturer.ManufactID and drugserviceinfo.name LIKE '%" . $wordsearch . "%'";
        $sql = "select drugserviceinfo.DrugID AS drugid,drugservicecatagory.type AS typeofdrugid,drugserviceinfo.name AS name,drugservicecatagory.Name AS type,manufacturer.CompanyName AS companyname,properties,instruction,extra from drugserviceinfo,drugservicecatagory,manufacturer where drugserviceinfo.DcID = drugservicecatagory.DcID and drugserviceinfo.manufactid = manufacturer.ManufactID and drugserviceinfo.name LIKE '%" . $wordsearch . "%' limit $pageprocess,5";
    }
  }
  else 
  {
    $sql2 ="select drugserviceinfo.DrugID AS drugid,drugservicecatagory.type AS typeofdrugid,drugserviceinfo.name AS name,drugservicecatagory.Name AS type,manufacturer.CompanyName AS companyname,properties,instruction,extra from drugserviceinfo,drugservicecatagory,manufacturer where drugserviceinfo.DcID = drugservicecatagory.DcID and drugserviceinfo.manufactid = manufacturer.ManufactID";
    $sql = "select drugserviceinfo.DrugID AS drugid,drugservicecatagory.type AS typeofdrugid,drugserviceinfo.name AS name,drugservicecatagory.Name AS type,manufacturer.CompanyName AS companyname,properties,instruction,extra from drugserviceinfo,drugservicecatagory,manufacturer where drugserviceinfo.DcID = drugservicecatagory.DcID and drugserviceinfo.manufactid = manufacturer.ManufactID limit $pageprocess,5";
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
  function DrugServiceInfoDel(rec)
  {
    var r = confirm("ท่านต้องการลบข้อมูลยาและบริการนี้ใช่หรือไม่?");
      if (r == true) 
      {
        window.open("AdminManageDrugServiceInfoDel.php?drugid=" + rec,"_self");
      } 
      else 
      {
        
      }
  }
function DrugServiceInfoEdit(rec)
{
        window.open("AdminManageDrugServiceInfoEdit.php?drugid=" + rec,"_self");
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
<h1 align="center" class="head1 ">จัดการข้อมูลยาและบริการ</h1>
<center>

    <form action="AdminManageDrugServiceInfo.php" method="get">
    <div style="width: 20%;">
    <select class="browser-default custom-select" name="typesearch" required>
        <option value = ''>----ประเภทสิ่งที่จะค้นหา----</option>
        <option value = 1>รหัสยาและบริการ</option>
        <option value = 2>ชื่อยาและบริการ</option>
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
        <th colspan="10">
        รายชื่อคลังยาและบริการ
        </th>
       </tr>
        <tr align="center">
            <th>ลำดับ</th>
            <th>รหัสยาและบริการ</th>
            <th>หมวดยาและบริการ</th>
            <th>ประเภทยาและบริการ</th>
            <th>ชื่อยาและบริการ</th>
            <th>บริษัทที่ผลิต</th>
            <th>สรรพคุณ</th>
            <th>วิธีใช้</th>
            <th>เพิ่มเติม</th>
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
              echo "<td>$row[drugid]</td>";
              echo "<td>$row[type]</td>";
              if($row['typeofdrugid'] == '1')
              {
                echo "<td>ยา</td>";
              }
              else if($row['typeofdrugid'] == '2')
              {
                echo "<td>บริการ</td>";
              }
              else if($row['typeofdrugid'] == '3')
              {
                echo "<td>วัคซีน</td>";
              }
              echo "<td>$row[name]</td>";
              echo "<td>$row[companyname]</td>";
              echo "<td>$row[properties]</td>";
              echo "<td>$row[instruction]</td>";
              echo "<td>$row[extra]</td>";
              

            ?>
            <td>
            <button class="btn btn-warning" onclick="DrugServiceInfoEdit('<?php echo $row['drugid']; ?>')">แก้ไขข้อมูล</button>
            <button class="btn btn-danger" onclick="DrugServiceInfoDel('<?php echo $row['drugid']; ?>')">ลบข้อมูล</button>
            </td>
             <?php
              echo "</tr>";
            }
            ?>
            <tfoot>
        <tr><td colspan=10 align="center"><?php
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
           <a href='AdminManageDrugServiceInfo.php?count=<?php echo $count ?>&page=<?php echo $i ?>&wordsearch=<?php echo $_GET['wordsearch'] ?>&typesearch=<?php echo $_GET['typesearch'] ?>'><?php echo $i; ?>&nbsp;</a>
           
           <?php
          }
          else
          {
            ?>
            <a href='AdminManageDrugServiceInfo.php?count=<?php echo $count ?>&page=<?php echo $i ?>'><?php echo $i; ?>&nbsp;</a>
            <?php
          }
            $count+=5;
         }
        ?></td></tr>
        </tfoot>
    </table>
    </div>
    </center>
    <center><button type="button" class="btn btn-primary" style="margin-top: 10px;" onclick="window.open('AdminManageDrugServiceInfoAdd.php','_self');">เพิ่มข้อมูลยาและบริการ</button></center>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>