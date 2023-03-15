<meta charset="utf-8">
<?php
	@session_start();
	$id2 = $_GET['id'] ;
	unset($_SESSION['jid'][$id2]) ;
	unset($_SESSION['jname'][$id2]) ;
	unset($_SESSION['jprice'][$id2]) ;
	unset($_SESSION['jdetail'][$id2]) ;
	unset($_SESSION['picturea'][$id2]) ;
	unset($_SESSION['itema'][$id2]) ;
	echo "<meta http-equiv=\"refresh\" content=\"0;URL=basket.php\">";

?>