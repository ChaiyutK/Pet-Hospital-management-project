<?php
session_start();
if(!empty($_SESSION['type']))
{
    if($_SESSION['type'] == 'member')
    {
	echo "<script>window.open('member/member.php','_self');</script>";
    }
    else if($_SESSION['type'] == 'admin')
    {
        echo "<script>window.open('admin/admin.php','_self');</script>";
    }
    else if($_SESSION['type'] == 'staff')
    {
        echo "<script>window.open('staff/staff.php','_self');</script>";
    }
    else if($_SESSION['type'] == 'veterinary')
    {
        echo "<script>window.open('veterinary/veterinary.php','_self');</script>";
    }
}


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
   
    
    <title>ระบบจัดการการตรวจรักษา</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
     <style>
      .login-container{
    margin-top: 5%;
    margin-bottom: 5%;
          
}
.login-form-1{
    padding: 5%;
    box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.2), 0 9px 26px 0 rgba(0, 0, 0, 0.19);
    background-color: white;
    border-radius: 1rem;
}
.login-form-1 h3{
    text-align: center;
    color: #333;
}

.login-container form{
    padding: 10%;
    color: aqua;
}
.btnSubmit
{
    width: 50%;
    border-radius: 1rem;
    padding: 1.5%;
    border: none;
    cursor: pointer;
}
.login-form-1 .btnSubmit{
    font-weight: 600;
    color: #fff;
    background-color: #0062cc;
}

body {
  background-image: url("background/bg.jpg");
  background-repeat: no-repeat;
    background-size: 120%;
}
h3 {
    font-family: "TH SarabunPSK";
}
         
      </style>
<script>
function chkdata()
    {
        
    }
</script>
  </head>
  <body>
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">ระบบจัดการการตรวจรักษา</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">เข้าสู่ระบบ <span class="sr-only">(current)</span></a>
      </li>
    </ul>
  </div>
</nav>
   
   <div class="container login-container" align = 'center'>
            <div>
                <div class="col-md-6 login-form-1">
                    <h3>ระบบจัดการการตรวจรักษา</h3>
                    <form action="Checklogin.php" method="post" onsubmit="return chkdata()">
                        <div class="form-group">
                            <input type="text" name="username" class="form-control" placeholder="ชื่อผู้ใช้งาน" value="" />
                        </div>
                        <div class="form-group">
                            <input type="password" name = "password" class="form-control" placeholder="รหัสผ่าน" value="" />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" />
                        </div>
                    </form>
                </div>
            
        </div>
      </div>
    

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>