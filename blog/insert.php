<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ฟอร์มเพิ่มเครื่องประดับ</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" 

</head>

<body>

<form class="form-horizontal" method="post" action="" enctype="multipart/form-data" >
<fieldset>

<!-- Form Name -->
<legend>ฟอร์มเพิ่มเครื่องประดับ</legend>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="p_id">รหัสสินค้า</label>  
  <div class="col-md-4">
  <input id="p_id" name="p_id" type="text" placeholder="รหัสสินค้า" class="form-control input-md" required autofocus >
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="p_name">ชื่อสินค้า</label>  
  <div class="col-md-4">
  <input id="p_name" name="p_name" type="text" placeholder="ชื่อสินค้า" class="form-control input-md" required>
    
  </div>
</div>

<!-- Textarea -->
<div class="form-group">
  <label class="col-md-4 control-label" for="p_detail">รายละเอียด</label>
  <div class="col-md-4">                     
    <textarea class="form-control" id="p_detail" name="p_detail">รายละเอียด</textarea>
  </div>
</div>



<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="p_price">ราคา</label>  
  <div class="col-md-4">
  <input id="p_price" name="p_price" type="text" placeholder="ราคา" class="form-control input-md" required>
    
  </div>
</div>
<!-- File Button --> 
<div class="form-group">
  <label class="col-md-4 control-label" for="img">รูปเครื่องประดับ</label>
  <div class="col-md-4">
    <input id="images" name="images" class="input-file" type="file">
  </div>
</div>




<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Submit"></label>
  <div class="col-md-4">
    <button id="Submit" name="Submit" class="btn btn-primary">บันทึกข้อมูล</button>
  </div>
</div>

</fieldset>
</form>

<?php
	if (isset($_POST['Submit'])){
		include("../connectdb.php");
		$sql = "INSERT INTO `product` (`p_id`, `p_name`, `p_detail`, `p_price`) VALUES ('{$_POST['p_id']}', '{$_POST['p_name']}', '{$_POST['p_detail']}', '{$_POST['p_price']}')";
		mysqli_query($conn, $sql) or die ("insert ไม่ได้");
		
		
	@copy($_FILES['images']['tmp_name'], "../images/".$_POST['p_id'].".jpg");
		
	echo "<script>";
	echo "alert('บันทึกข้อมูลสำเร็จ')";
	echo "</script>";
	
	}
?>



</body>
</html>