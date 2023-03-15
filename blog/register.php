

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>ลงทะเบียน</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/checkout/">

    

    

<link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="form-validation.css" rel="stylesheet">
  </head>
  <body class="bg-light">
    
<div class="container">
  <main>
    <div class="py-5 text-center">
      <h2>Register</h2>
    </div>
<div class="row">
    <div class="col-md-3">
     
    </div>
    
</div> 

<form method="post" action="">
ชื่อ <input type="text" name="cus_name" class="form-control" required>
Username <input type="text" name="cus_usr" class="form-control" required>
Password <input type="password" name="cus_pwd"  maxlength="10" class="form-control" required> 
Telephone <input type="text" name="cus_tel"  maxlength="10" class="form-control" required> 
Address <input type="text" name="add"  maxlength="500" class="form-control" required> <br>
<input type="submit" name="submit" value="บันทึก" class="btn btn-primary"> <br>
<br><input type="reset" name="cancle" value="ยกเลิก" class="btn btn-primary"> <br>

<a href="index.php">LOGIN </a>
</form>  

<?php
	if (isset($_POST['submit'])){
    $conn=mysqli_connect("localhost","root","12345678")or die("เชื่อมต่อฐานข้อมูลไม่ได้");
    mysqli_select_db($conn,"jew")or die("เลือกฐานข้อมูลไม่ได้");
    mysqli_query($conn,"SET NAMES utf8"); //ทำให้อ่านข้อมูลที่เป็นภาษาไทยได้
	
	$sql = "INSERT INTO `customer` (`cus_id`, `cus_name`, `cus_usr`, `cus_pwd`, `cus_tel`, `add`) VALUES (NULL, '{$_POST['cus_name']}', '{$_POST['cus_usr']}', '".md5($_POST['cus_pwd'])."', '{$_POST['cus_tel']}','{$_POST['add']}');";
    
		
		mysqli_query($conn, $sql) or die (mysqli_error($conn));

		echo "<script>";
		echo "alert('สมัครสำเร็จ');";
        echo "window.location='index.php';";
		echo "</script>";
		
	}
?>

    </div>
    
</div> 
 
  </main>
</div>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      <script src="form-validation.js"></script>
  </body>
</html>
