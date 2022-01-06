<?php
session_start();
require("../mysql/config.php");
if($_SESSION['type'] != "admin")
{
        echo "<script>window.open('../Main.php','_self');</script>";
}
$drugid = $_REQUEST['drugid'];
$listid = $_REQUEST['listid'];
$connect2 = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
mysqli_query($connect2, "SET NAMES UTF8");
$sql2 ="select drugserviceinfo.DrugID AS drugid,drugservicecatagory.type AS typeofdrugid,drugserviceinfo.name AS name,drugservicecatagory.Name AS type,drugservicecatagory.dcid AS dcid,manufacturer.CompanyName AS companyname,manufacturer.manufactid AS manufactid,properties,instruction,extra from drugserviceinfo,drugservicecatagory,manufacturer where drugserviceinfo.DcID = drugservicecatagory.DcID and drugserviceinfo.manufactid = manufacturer.ManufactID and drugserviceinfo.drugid = '$drugid'";
$result2 = mysqli_query($connect2, $sql2);

    $record2 = mysqli_fetch_array($result2);
    $sql3 ="select drugservicelist.listid AS listid,drugservicestorehouse.name AS storehousename,drugservicelist.dshid AS dshid,drugservicelist.drugid AS drugid,drugserviceinfo.name AS drugname,drugservicelist.balance AS balance,drugservicelist.unit AS unit,drugservicelist.price AS price from drugservicelist,drugservicestorehouse,drugserviceinfo where drugservicelist.dshid = drugservicestorehouse.dshid and drugservicelist.drugid = drugserviceinfo.drugid and drugservicelist.listid='$listid'";
    $result3 = mysqli_query($connect2, $sql3);

    $record3 = mysqli_fetch_array($result3);
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
  font-size: 50px;
  padding-top: 10px;
}
.btmenu {
 margin: 5%;
}
         
      </style>
      <script>
      function isNumber(evt) 
      {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode > 31 && (charCode < 48 || charCode > 57)) 
            {
                return false;
            }
        return true;
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
   <center><div class="head1">แก้ไขรายการยาและบริการ</div></center>
   <center>
   <form action="AdminManageDrugServiceListEditSave.php" method="post">
   <input type="hidden" name="drugid" value="<?php echo $drugid ?>">
    <table width = '50%' border = "1"  bgcolor = "#FFFFFF">
            <tr><td colspan="4" align="center">
            รหัสยาและบริการ :&nbsp;
            <input type="text" size='30' name="drugid" maxlength='3' value="<?php echo $drugid ?>" disabled>
                </td></tr>
                <tr><td colspan="2" align="right">
            หมวดยาและบริการ :&nbsp;
            <td colspan="2" align="left">
            <select required disabled>
               <option value="">กรุณาเลือกหมวดยาและบริการ</option>
               <?php
               $sql="select dcid,name from drugservicecatagory";
               require("../mysql/connect.php");
               while($row=mysqli_fetch_array($result))
               {
                if($row['dcid'] == $record2['dcid'])
                {
                    $typeid=$row['dcid'];
                }
                ?>
                <option value="<?php echo $row['dcid']; ?>" <?=$record2['dcid'] == $row['dcid'] ? ' selected="selected"' : '';?>><?php echo $row['name']; ?></option>
                
                <?php 
                }
                echo "<input type='hidden' value='$typeid' name='type'>";
            require("../mysql/unconnect.php");
               ?>
               </select>
                </td></tr>
                <tr><td colspan="2" align="right">
            ประเภทยาและบริการ :&nbsp;
            <td colspan="2" align="left">
            <?php
            if($record2['typeofdrugid'] == '1')
            {
                echo "<input type='text' size='30' maxlength='30' value='ยา' disabled>";
            }
            else if($record2['typeofdrugid'] == '2')
            {
                echo "<input type='text' size='30' maxlength='30' value='บริการ' disabled>";
            }
            else if($record2['typeofdrugid'] == '3')
            {
                echo "<input type='text' size='30' maxlength='30' value='วัคซีน' disabled>";
            }
            ?>
            <input type='hidden' value="<?php echo $record2['typeofdrugid']; ?>" name='typeofdrug'>
                </td></tr>
                <tr><td colspan="2" align="right">
            ชื่อยาและบริการ :&nbsp;
            <td colspan="2" align="left">
            <input type="text" size='30' maxlength='30' value="<?php echo $record2['name']; ?>" disabled>
            <input type='hidden' value="<?php echo $record2['name']; ?>" name='name'>
                </td></tr>
                <tr><td colspan="2" align="right">
            บริษัทที่ผลิต :&nbsp;
            <td colspan="2" align="left">
            <select required disabled>
               <option value="">กรุณาเลือกบริษัทผู้ผลิต</option>
               <?php
               require("../mysql/unconnect.php");
               $sql="select manufactid,companyname from manufacturer";
               require("../mysql/connect.php");
               while($row=mysqli_fetch_array($result))
               {
                if($row['manufactid'] == $record2['manufactid'])
                {
                    $manuid=$row['manufactid'];
                }
                ?>
                <option value="<?php echo $row['manufactid']; ?>" <?=$record2['manufactid'] == $row['manufactid'] ? ' selected="selected"' : '';?>><?php echo $row['companyname']; ?></option>
                <?php
                }
            require("../mysql/unconnect.php");
               ?>
               </select>
               <input type='hidden' value="<?php echo $manuid; ?>" name='manufacturer'>
                </td></tr>
                <tr><td colspan="2" align="right">
            รหัสรายการยาและบริการ :&nbsp;
            <td colspan="2" align="left">
            <input type="text" size='30' maxlength='6' value="<?php echo $record3['listid']; ?>" disabled>
            <input type='hidden' value="<?php echo $record3['listid']; ?>" name='listid'>
                </td></tr>
                <tr><td colspan="2" align="right">
            คลังที่เก็บ :&nbsp;
            <td colspan="2" align="left">
            <select name="dshid" required>
               <option value="">กรุณาเลือกคลังยาและบริการ</option>
               <?php
               require("../mysql/unconnect.php");
               $sql="select dshid,name from drugservicestorehouse";
               require("../mysql/connect.php");
               while($row=mysqli_fetch_array($result))
               {
                ?>
                <option value="<?php echo $row['dshid']; ?>" <?=$record3['dshid'] == $row['dshid'] ? ' selected="selected"' : '';?>><?php echo $row['name']; ?></option>
                <?php
                }
            require("../mysql/unconnect.php");
               ?>
               </select>
            
                </td></tr>
                <tr><td colspan="2" align="right">
            จำนวนคงเหลือ :&nbsp;
            <td colspan="2" align="left">
            <input type="text" name="balance" size='30' maxlength='30' value="<?php echo $record3['balance']; ?>" onkeypress="return isNumber(event)" required>
                </td></tr>
                <tr><td colspan="2" align="right">
            ราคา :&nbsp;
            <td colspan="2" align="left">
            <input type="text" name="price" size='30' maxlength='30' value="<?php echo $record3['price']; ?>" onkeypress="return isNumber(event)" required>
                </td></tr>
                <tr><td colspan="2" align="right">
            หน่วย :&nbsp;
            <td colspan="2" align="left">
            <input type="text" name="unit" size='30' maxlength='30' value="<?php echo $record3['unit']; ?>" required>
                </td></tr>
                <tr><td colspan="4" align="center"><input type="submit" value="บันทึก"></td></tr>
        </form>
    </table>
    </center>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>