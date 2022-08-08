<?php
	session_start();
	include "../conexao.php";

    $code = $_POST['countrycode'];
	$idioma = $_POST['language'];
	$eoficial = $_POST['isofficial'];
	$porcentagem = $_POST['percentage'];

	$sql = "INSERT INTO countrylanguage (CountryCode, Language, IsOfficial, Percentage) VALUES ('$code', '$idioma', '$eoficial', $porcentagem)";
	$result = mysqli_query($conexao, $sql);

	echo "$sql";

	if (mysqli_affected_rows($conexao) > 0) {
		$_SESSION['cadastrado'] = true;
		header('LOCATION: ../../Cadastros_idiomas/cadastro_idiomaE.php?code='.$code);
		exit();
	} else {
		$_SESSION['nao_cadastrado'] = true;
		header('LOCATION: ../../Cadastros_idiomas/cadastro_idiomaE.php?code='.$code);
		exit();
	}

	mysqli_close($conexao);
?>