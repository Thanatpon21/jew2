<?php
	@session_start();
	$conn=mysqli_connect("localhost","root","12345678")or die("เชื่อมต่อฐานข้อมูลไม่ได้");
	mysqli_select_db($conn,"jew")or die("เลือกฐานข้อมูลไม่ได้");
	mysqli_query($conn,"SET NAMES utf8"); //ทำให้อ่านข้อมูลที่เป็นภาษาไทยได้
	$sql = "select * from products where j_id='{$_GET['id']}' ";
	$rs = mysqli_query($conn, $sql) ;
	$data = mysqli_fetch_array($rs);
	$id = $_GET['id'] ;
	
	if(isset($_GET['id'])) {
		$_SESSION['jid'][$id] = $data['j_id'];
		$_SESSION['jname'][$id] = $data['j_name'];
		$_SESSION['jprice'][$id] = $data['j_price'];
		$_SESSION['jdetail'][$id] = $data['j_detail'];
		$_SESSION['picturea'][$id] = $data['j_id'];
		@$_SESSION['itema'][$id]++;
	}
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
      <a href="mem.php" class="navbar-brand d-flex align-items-center">
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

<body>
	<!-- Page Preloder -->
	<div id="preloder">
		<div class="loader"></div>
	</div>


	<!-- Page -->
	<div class="page-area cart-page spad">
		<div class="container">
	  <div class="text" >
		<a href="allproduct.php" type="submit" class="btn btn-light">กลับไปเลือกสินค้า</a> </div><br>
	  <div class="gaming-library profile-library">
	  <div class="col-lg-20">
		  <div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 ">
					<div class="cart-table-wrap" >
						<table class="cart-table" width="100%" height="80%">
							<thead class="cart-table-head" >
								<tr class="table-head-row" >
									<th class="product-image">Product Image</th>
									<th class="product-name">Name</th>
									<th class="product-price">Price</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-total">Total</th>
									<th class="product-remove"></th>
								</tr>
								<?php
                    if(!empty($_SESSION['jid'])) {
                        foreach($_SESSION['jid'] as $pid) {
                            @$i++;
                            $sum[$pid] = $_SESSION['jprice'][$pid] * $_SESSION['itema'][$pid] ;
                            @$total += $sum[$pid] ;
                       ?>

                      <tr>
                  <th><a href="allproduct.php"><img src="images/<?=$_SESSION['picturea'][$pid];?>.jpg"  height="50" class="templatemo-item"></a></th>
                  <th><?=$_SESSION['jname'][$pid];?></th>
                  <th><?=number_format($_SESSION['jprice'][$pid],0);?> ฿</th>
                  <th><?=$_SESSION['itema'][$pid];?></th>
                  <th><?=number_format($sum[$pid],0);?> ฿</th>
                 <th><div class="main-button"><a href="clear.php?id=<?=$pid;?>" class="btn btn-outline-dark">remove</a></div></th>
                 <?php } // end foreach ?>
                  <th>

							</thead>
						</table>
					</div>
				</div>

				<div class="col-lg-12">
					<div class="total-section">
						<table class="total-table">
								<tr class="table-total-row">
									<th class="product-image"></th>
									<th class="product-name"></th>
									<th class="product-price"></th>
									<th class="product-quantity"></th>
									<th class="product-total">TotalPrice<?=number_format($total,0);?>   ฿</th>
									
								</tr>
						   </div>
						</table>
			  </div>
			</div>
						<?php 
       					 } else {
       				  ?>
           			 <tr>
               			 <td colspan="7" height="50" align="center">ไม่มีสินค้าในตะกร้า</td>
           			 </tr>
       				 <?php } // end if ?> </div>
										
												</table>
		</div>
		</div>
		  </div>
	  </div>
</div>
							<!-- Page end -->
							<div class="col-lg-12">
             		 									<div class="text-center">
                            							<a href="clear2.php" class="btn btn-outline-dark">ลบสินค้าทั้งหมด</a>
                           								 <a href="record.php" class="btn btn-outline-dark">สั่งซื้อสินค้า</a><br>
                        								</div><br>



	<!--====== Javascripts & Jquery ======-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/mixitup.min.js"></script>
	<script src="js/sly.min.js"></script>
	<script src="js/jquery.nicescroll.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>