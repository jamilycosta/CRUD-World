<?php
	session_start();
	include "../conexao.php";

	$id = mysqli_real_escape_string($conexao, trim($_POST['ID']));
	$nome = mysqli_real_escape_string($conexao, trim($_POST['Name']));
	$code = mysqli_real_escape_string($conexao, trim($_POST['CountryCode']));

	$sql = "DELETE FROM city WHERE ID = $id";
	
	if (mysqli_query($conexao, $sql)) {
		$_SESSION['excluido'] = true;
		header('LOCATION: ../../Cidades/cidadesAs.php?code='.$code);
		exit();
	} else {
		$_SESSION['nao_excluido'] = true;
		header('LOCATION: ../../Cidades/cidadesAs.php?code='.$code);
		exit();
	}
?>