
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Signin Template · Bootstrap v5.2</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">

    

    

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
    <link href="signin.css" rel="stylesheet">
  </head>
  <body class="text-center">
    
<main class="form-signin w-100 m-auto">
  <form method='post' action="">
  <br>
    <img src="../images/ปก.jpg" alt="" width="1000" height="500">
    <b><h1 class="h3 mb-3 fw-normal">Please sign in</h1></b>

    <div class="form-floating">
      						   <input type="text" name="usr"  class="form-control" placeholder="Enter Username"required>                         

      <label for="">User/Email address</label><br>
    </div>
    <div class="form-floating">
      <input type="password" name='pwd' class="form-control" id="floatingPassword" placeholder="Password" required>
      <label for="floatingPassword">Password</label>
    </div><br>
   <div class="col-md-12 text-center ">
     <input type="Submit" class=" btn btn-block mybtn btn-dark tx-tfm" name="Submit" value="LOGIN">
     <br>
        <br><a href="register.php"  class=" btn btn-block mybtn btn-dark tx-tfm" >REGISTER</a>

   </div>
	<!--<a href="mem.php" class="btn btn-dark">Sign in</a><p>
    <p><a href="register.php" class="btn btn-dark">Register</a>-->

  </form>
  				<?php
							if(isset($_POST['Submit'])){
								$conn=mysqli_connect("localhost","root","12345678")or die("เชื่อมต่อฐานข้อมูลไม่ได้");
								mysqli_select_db($conn,"jew")or die("เลือกฐานข้อมูลไม่ได้");
								mysqli_query($conn,"SET NAMES utf8"); //ทำให้อ่านข้อมูลที่เป็นภาษาไทยได้
								$sql="select * from customer where cus_usr='{$_POST['usr']}' and cus_pwd='".md5($_POST['pwd']). "' LIMIT 1";
								$rs = mysqli_query($conn,$sql);
							  $num = mysqli_num_rows($rs);
	
							if ($num > 0){
								$data = mysqli_fetch_array($rs);
								$_SESSION['ses_id']= $data['cus_id'];
								$_SESSION['ses_name']= $data['cus_pwd'];
								echo "<script>";
               
								echo "window.location='home.php';";
								echo "</script>";
							}else{
								echo "<script>";
								echo "alert('กรอก Username หรือ Password ผิดกรุณาลองใหม่อีกครั้ง');";
								echo "</script>";	
							}
							}
				?>

</main>


    
  </body>
</html>