<meta charset="utf-8">
<?php
	@session_start();
	$conn=mysqli_connect("localhost","root","12345678")or die("เชื่อมต่อฐานข้อมูลไม่ได้");
	mysqli_select_db($conn,"jew")or die("เลือกฐานข้อมูลไม่ได้");
	mysqli_query($conn,"SET NAMES utf8"); //ทำให้อ่านข้อมูลที่เป็นภาษาไทยได้

	foreach($_SESSION['jid'] as $pid) {
		$sum[$pid] = $_SESSION['jprice'][$pid] * $_SESSION['itema'][$pid] ;
		@$total += $sum[$pid] ;
	}
		

$sql = "INSERT INTO `order` (`o_id`, `ototal`, `odate`, `member_id`) VALUES (NULL, '$total', CURRENT_TIMESTAMP, '0');";

	
	mysqli_query($conn, $sql) or die (mysqli_error($conn));
	$id = mysqli_insert_id($conn);
	
	foreach($_SESSION['jid'] as $pid) {
		$sql2 = "INSERT INTO orders_detail  (od_id,`oid`, jid,`item`) values('', '$id', '".$_SESSION['jid'][$pid]."', '".$_SESSION['itema'][$pid]."');" ;
		mysqli_query($conn, $sql2) or die(mysqli_error($conn));
	}
	
echo "<meta http-equiv=\"refresh\" content=\"0;URL=clear2.php\">";
?>