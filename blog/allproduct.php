<?php
@session_start();
$conn=mysqli_connect("localhost","root","12345678")or die("เชื่อมต่อฐานข้อมูลไม่ได้");
mysqli_select_db($conn,"jew")or die("เลือกฐานข้อมูลไม่ได้");
mysqli_query($conn,"SET NAMES utf8"); //ทำให้อ่านข้อมูลที่เป็นภาษาไทยได้
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Jewelry</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/album/">

    

    

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

    
  </head>
  <body>
    
<header>
  <div class="collapse bg-dark" id="navbarHeader"></div>
  <div class="navbar navbar-dark bg-dark shadow-sm">
    <div class="container">
      <a href="index.php" class="navbar-brand d-flex align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-house-heart" viewBox="0 0 16 16">
  <path d="M8 6.982C9.664 5.309 13.825 8.236 8 12 2.175 8.236 6.336 5.309 8 6.982Z"/>
  <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.707L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.646a.5.5 0 0 0 .708-.707L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
</svg>
<strong>หน้าหลัก</strong>
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
  </div>
</header>

<main>

  <section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light">สินค้าทั้งหมด</h1></div>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
      
        
        
        <?php
													$conn=mysqli_connect("localhost","root","12345678")or die("เชื่อมต่อฐานข้อมูลไม่ได้");
													mysqli_select_db($conn,"jew")or die("เลือกฐานข้อมูลไม่ได้");
													mysqli_query($conn,"SET NAMES utf8"); //ทำให้อ่านข้อมูลที่เป็นภาษาไทยได้
													$sql = "SELECT * FROM `products` ORDER BY `products`.`j_id` ASC";
													$rs = mysqli_query($conn,$sql); 
													
													while($data = mysqli_fetch_array($rs)){ ?>
														
														<?php
															$y = substr($data['id'], 0, 2);
														?>
        
        <div class="col">
          <div class="card shadow-sm">
            <img src="images/<?=$data['j_id']?>.jpg" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em"><?=$data['j_name'];?></text></svg>

            <div class="card-body">
              <p class="card-text"><?=$data['j_detail'];?></p>
              <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                        <p><a href="basket.php?id=<?=$data['j_id'];?>" class="btn btn-secondary" role="button">หยิบลงตะกร้า</a> </p>

          <!--<a href="basket.php" class="btn btn-warning">หยิบใส่ตะกร้า</a>-->
                </div>
              </div>
            </div>
          </div>
        </div><?php	} ?>
        
        
        
        
        
       
      </div>
    </div>
  </div>

</main>

<footer class="text-muted py-5">
  <div class="container">
    <p class="float-end mb-1">
      <a href="#">Back to top</a>
    </p>


    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>

      
  </body>
</html>