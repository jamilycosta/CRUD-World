<?php
	session_start();
	include "../conexao.php";

	$code = mysqli_real_escape_string($conexao, trim($_POST['Code']));
	$nome = mysqli_real_escape_string($conexao, trim($_POST['Name']));
	
	$sql = "DELETE FROM country WHERE Code = '$code'";
	
	if (mysqli_query($conexao, $sql)) {
		$_SESSION['excluido'] = true;
		header('LOCATION: ../../Paises/africa.php');
		exit();
	} else {
		$_SESSION['nao_excluido'] = true;
		header('LOCATION: ../../Paises/africa.php');
		exit();
	}
?>