<?php
session_start();
require("../config/config.php");
require("../mysql/config.php");
if($_SESSION['type'] != "veterinary")
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
      
      $sql2 ="select drugservicelist.listid AS listid,drugservicestorehouse.name AS storehousename,drugservicelist.dshid AS dshid,drugservicelist.drugid AS drugid,drugserviceinfo.name AS drugname,drugservicelist.balance AS balance,drugservicelist.unit AS unit,drugservicelist.price AS price from drugservicelist,drugservicestorehouse,drugserviceinfo,drugservicecatagory where drugservicelist.dshid = drugservicestorehouse.dshid and drugservicelist.drugid = drugserviceinfo.drugid and drugservicelist.listid LIKE '%" . $wordsearch . "%' and drugservicecatagory.dcid = drugserviceinfo.dcid and drugservicecatagory.type != 2";
      $sql = "select drugservicelist.listid AS listid,drugservicestorehouse.name AS storehousename,drugservicelist.dshid AS dshid,drugservicelist.drugid AS drugid,drugserviceinfo.name AS drugname,drugservicelist.balance AS balance,drugservicelist.unit AS unit,drugservicelist.price AS price from drugservicelist,drugservicestorehouse,drugserviceinfo,drugservicecatagory where drugservicelist.dshid = drugservicestorehouse.dshid and drugservicelist.drugid = drugserviceinfo.drugid and drugservicelist.listid LIKE '%" . $wordsearch . "%' and drugservicecatagory.dcid = drugserviceinfo.dcid and drugservicecatagory.type != 2 limit $pageprocess,5";
      }
    else if($typesearch=='2')
    {
      $sql2 ="select drugservicelist.listid AS listid,drugservicestorehouse.name AS storehousename,drugservicelist.dshid AS dshid,drugservicelist.drugid AS drugid,drugserviceinfo.name AS drugname,drugservicelist.balance AS balance,drugservicelist.unit AS unit,drugservicelist.price AS price from drugservicelist,drugservicestorehouse,drugserviceinfo,drugservicecatagory where drugservicelist.dshid = drugservicestorehouse.dshid and drugservicelist.drugid = drugserviceinfo.drugid and drugserviceinfo.name LIKE '%" . $wordsearch . "%' and drugservicecatagory.dcid = drugserviceinfo.dcid and drugservicecatagory.type != 2";
      $sql = "select drugservicelist.listid AS listid,drugservicestorehouse.name AS storehousename,drugservicelist.dshid AS dshid,drugservicelist.drugid AS drugid,drugserviceinfo.name AS drugname,drugservicelist.balance AS balance,drugservicelist.unit AS unit,drugservicelist.price AS price from drugservicelist,drugservicestorehouse,drugserviceinfo,drugservicecatagory where drugservicelist.dshid = drugservicestorehouse.dshid and drugservicelist.drugid = drugserviceinfo.drugid and drugserviceinfo.name LIKE '%" . $wordsearch . "%' and drugservicecatagory.dcid = drugserviceinfo.dcid and drugservicecatagory.type != 2 limit $pageprocess,5";
    }
    else
    {
      $sql2 ="select drugservicelist.listid AS listid,drugservicestorehouse.name AS storehousename,drugservicelist.dshid AS dshid,drugservicelist.drugid AS drugid,drugserviceinfo.name AS drugname,drugservicelist.balance AS balance,drugservicelist.unit AS unit,drugservicelist.price AS price from drugservicelist,drugservicestorehouse,drugserviceinfo where drugservicelist.dshid = drugservicestorehouse.dshid and drugservicelist.drugid = drugserviceinfo.drugid and drugservicecatagory.dcid = drugserviceinfo.dcid and drugservicecatagory.type != 2";
      $sql = "select drugservicelist.listid AS listid,drugservicestorehouse.name AS storehousename,drugservicelist.dshid AS dshid,drugservicelist.drugid AS drugid,drugserviceinfo.name AS drugname,drugservicelist.balance AS balance,drugservicelist.unit AS unit,drugservicelist.price AS price from drugservicelist,drugservicestorehouse,drugserviceinfo,drugservicecatagory where drugservicelist.dshid = drugservicestorehouse.dshid and drugservicelist.drugid = drugserviceinfo.drugid and drugservicecatagory.dcid = drugserviceinfo.dcid and drugservicecatagory.type != 2 limit $pageprocess,5";
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
      
      $sql2 ="select drugservicelist.listid AS listid,drugservicestorehouse.name AS storehousename,drugservicelist.dshid AS dshid,drugservicelist.drugid AS drugid,drugserviceinfo.name AS drugname,drugservicelist.balance AS balance,drugservicelist.unit AS unit,drugservicelist.price AS price from drugservicelist,drugservicestorehouse,drugserviceinfo,drugservicecatagory where drugservicelist.dshid = drugservicestorehouse.dshid and drugservicelist.drugid = drugserviceinfo.drugid and drugservicelist.listid LIKE '%" . $wordsearch . "%' and drugservicecatagory.dcid = drugserviceinfo.dcid and drugservicecatagory.type != 2";
      $sql = "select drugservicelist.listid AS listid,drugservicestorehouse.name AS storehousename,drugservicelist.dshid AS dshid,drugservicelist.drugid AS drugid,drugserviceinfo.name AS drugname,drugservicelist.balance AS balance,drugservicelist.unit AS unit,drugservicelist.price AS price from drugservicelist,drugservicestorehouse,drugserviceinfo,drugservicecatagory where drugservicelist.dshid = drugservicestorehouse.dshid and drugservicelist.drugid = drugserviceinfo.drugid and drugservicelist.listid LIKE '%" . $wordsearch . "%' and drugservicecatagory.dcid = drugserviceinfo.dcid and drugservicecatagory.type != 2 limit $pageprocess,5";
      }
    else if($typesearch=='2')
    {
      $sql2 ="select drugservicelist.listid AS listid,drugservicestorehouse.name AS storehousename,drugservicelist.dshid AS dshid,drugservicelist.drugid AS drugid,drugserviceinfo.name AS drugname,drugservicelist.balance AS balance,drugservicelist.unit AS unit,drugservicelist.price AS price from drugservicelist,drugservicestorehouse,drugserviceinfo,drugservicecatagory where drugservicelist.dshid = drugservicestorehouse.dshid and drugservicelist.drugid = drugserviceinfo.drugid and drugserviceinfo.name LIKE '%" . $wordsearch . "%' and drugservicecatagory.dcid = drugserviceinfo.dcid and drugservicecatagory.type != 2";
      $sql = "select drugservicelist.listid AS listid,drugservicestorehouse.name AS storehousename,drugservicelist.dshid AS dshid,drugservicelist.drugid AS drugid,drugserviceinfo.name AS drugname,drugservicelist.balance AS balance,drugservicelist.unit AS unit,drugservicelist.price AS price from drugservicelist,drugservicestorehouse,drugserviceinfo,drugservicecatagory where drugservicelist.dshid = drugservicestorehouse.dshid and drugservicelist.drugid = drugserviceinfo.drugid and drugserviceinfo.name LIKE '%" . $wordsearch . "%' and drugservicecatagory.dcid = drugserviceinfo.dcid and drugservicecatagory.type != 2 limit $pageprocess,5";
    }
  }
  else
  {
    $sql2 ="select drugservicelist.listid AS listid,drugservicestorehouse.name AS storehousename,drugservicelist.dshid AS dshid,drugservicelist.drugid AS drugid,drugserviceinfo.name AS drugname,drugservicelist.balance AS balance,drugservicelist.unit AS unit,drugservicelist.price AS price from drugservicelist,drugservicestorehouse,drugserviceinfo,drugservicecatagory where drugservicelist.dshid = drugservicestorehouse.dshid and drugservicelist.drugid = drugserviceinfo.drugid and drugservicecatagory.dcid = drugserviceinfo.dcid and drugservicecatagory.type != 2";
    $sql = "select drugservicelist.listid AS listid,drugservicestorehouse.name AS storehousename,drugservicelist.dshid AS dshid,drugservicelist.drugid AS drugid,drugserviceinfo.name AS drugname,drugservicelist.balance AS balance,drugservicelist.unit AS unit,drugservicelist.price AS price from drugservicelist,drugservicestorehouse,drugserviceinfo,drugservicecatagory where drugservicelist.dshid = drugservicestorehouse.dshid and drugservicelist.drugid = drugserviceinfo.drugid and drugservicecatagory.dcid = drugserviceinfo.dcid and drugservicecatagory.type != 2 limit $pageprocess,5";
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
      <script>
      function paydrugexport(rec,balance)
      {
        var numdrug = prompt("กรุณากรอกจำนวนยาที่ต้องการเบิก", "");
        if (numdrug != null) 
        {
          if(isNaN(numdrug)) 
          {
            alert("กรุณากรอกเป็นตัวเลข");
            console.log("thisis char");
          }
        else 
          {
            if(numdrug < 1)
            {
              alert("กรุณากรอกเป็นตัวเลขที่มีค่ามากกว่า 0");
            }
            else
            {
              if(parseInt(balance) < numdrug)
              {
                alert("จำนวนยามีไม่เพียงพอ");
              }
            else if(parseInt(balance) >= numdrug)
             {
              window.open("vetpetexportpaydrug.php?listid=" + rec + "&numdrug=" + numdrug,"_self");
            }
            }

          }
        }
          
      }
        
      function petdelpaydrug(rec,rec2)
      {
        window.open("petdelpaydrug.php?treatmentid=" + rec + "&dtid=" + rec2,"_self");
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

   <center><div class="head1">เบิกยา</div></center>
<center>

    <form action="vetdrugservice.php" method="get">
    <div style="width: 20%;">
    <select class="browser-default custom-select" name="typesearch" required>
        <option value = ''>----ประเภทสิ่งที่จะค้นหา----</option>
        <option value = 1>รหัสรายการยาและบริการ</option>
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
        <th colspan="8">
        รายการยาและบริการ
        </th>
       </tr>
        <tr align="center">
            <th>ลำดับ</th>
            <th>รหัสรายการยาและบริการ</th>
            <th>ชื่อคลังยา</th>
            <th>ชื่อยา</th>
            <th>จำนวนคงเหลือ</th>
            <th>หน่วย</th>
            <th>ราคา</th>
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
              echo "<td>$row[listid]</td>";
              echo "<td>$row[storehousename]</td>";
              echo "<td>$row[drugname]</td>";
              echo "<td>$row[balance]</td>";
              echo "<td>$row[unit]</td>";
              echo "<td>$row[price]</td>";
            ?>
            <td>
            <button class="btn btn-warning" onclick="paydrugexport('<?php echo $row['listid']; ?>','<?php echo $row['balance']; ?>')">เบิกยา</button>
            </td>
             <?php
              echo "</tr>";
            }
            ?>
            <tfoot>
        <tr><td colspan=8 align="center"><?php
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
           <a href='vetdrugservice.php?count=<?php echo $count ?>&page=<?php echo $i ?>&wordsearch=<?php echo $_GET['wordsearch'] ?>&typesearch=<?php echo $_GET['typesearch'] ?>'><?php echo $i; ?>&nbsp;</a>
           
           <?php
          }
          else
          {
            ?>
            <a href='vetdrugservice.php?count=<?php echo $count ?>&page=<?php echo $i ?>'><?php echo $i; ?>&nbsp;</a>
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