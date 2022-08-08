<?php
	session_start();
	include "../conexao.php";

    $code = $_POST['countrycode'];
	$idioma = $_POST['language'];
	$eoficial = $_POST['isofficial'];
	$porcentagem = $_POST['percentage'];

	$sql = "UPDATE countrylanguage SET CountryCode = '$code', Language = '$idioma', IsOfficial = '$eoficial', Percentage = $porcentagem WHERE Language = '$idioma'";
	$result = mysqli_query($conexao, $sql);

	echo "$sql";

	if (mysqli_affected_rows($conexao) > 0) {
		$_SESSION['cadastrado'] = true;
		header('LOCATION: ../../Editar_idiomas/editar_idiomaAf.php?code='.$code);
		exit();
	} else {
		$_SESSION['nao_cadastrado'] = true;
		header('LOCATION: ../../Editar_idiomas/editar_idiomaAf.php?code='.$code);
		exit();
	}
	
	mysqli_close($conexao);
?>