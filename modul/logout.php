<?php 
	session_start();
	if ($_SESSION['iduser']) {
		session_destroy();
		header('location:index.php');
	}
 ?>