<?php
	session_start();

	if (isset($_SESSION['usuario'])) {
		unset($_SESSION['usuario']);
		setcookie("usuario", null, -1, '/');
		session_destroy();
		header('LOCATION: ../../index.php');
		exit();
	}
	//echo "<script>window.location = '../../index.php';</script>";
?>