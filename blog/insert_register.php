<?php
	$conn=mysqli_connect("localhost","root","12345678")or die("เชื่อมต่อฐานข้อมูลไม่ได้");
	mysqli_select_db($conn,"jew")or die("เลือกฐานข้อมูลไม่ได้");
	mysqli_query($conn,"SET NAMES utf8"); //ทำให้อ่านข้อมูลที่เป็นภาษาไทยได้
//รับค่าตัวแปรมาจากไฟล์ register
$name = $_POST['firstname'];
$username = $_POST['username'];
$password = $_POST['password'];

//คำสั่งเพิ่มข้อมูล
$sql ="INSERT INTO mem(name,username,password) values('$name', '$username','$password')";
$result = mysqli_query($conn,$sql);
if($result){
	echo "<script> alert('บันทึกข้อมูลเรียบร้อย'); </script>";
	echo "<script> window.location = 'register.php'; </script>";
}else{
	echo "Error:" .$sql . "<br>" .mysqli_query($conn);
	echo "<script> alert('บันทึกข้อมูลไม่ได้'); </script>";

}
mysqli_query($conn);
?>