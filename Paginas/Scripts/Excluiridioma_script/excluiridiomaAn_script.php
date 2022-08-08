<?php
	session_start();
	include "../conexao.php";

	$language = mysqli_real_escape_string($conexao, trim($_POST['Language']));
	$code = mysqli_real_escape_string($conexao, trim($_POST['CountryCode']));

	$sql = "DELETE FROM countrylanguage WHERE Language = '$language'";
	
	if (mysqli_query($conexao, $sql)) {
		$_SESSION['excluido'] = true;
		header('LOCATION: ../../Idiomas/idiomasAn.php?code='.$code);
		exit();
	} else {
		$_SESSION['nao_excluido'] = true;
		header('LOCATION: ../../Idiomas/idiomasAn.php?code='.$code);
		exit();
	}
?>