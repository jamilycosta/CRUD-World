<?php
	session_start();
	include "../conexao.php";

	$nome = $_POST['name'];
	$code = $_POST['countrycode'];
	$distrito = $_POST['district'];
	$populacao = $_POST['population'];

	$sql = "INSERT INTO city (Name, CountryCode, District, Population) VALUES ('$nome', '$code', '$distrito', $populacao)";
	$result = mysqli_query($conexao, $sql);

	if (mysqli_affected_rows($conexao) > 0) {
		$_SESSION['cadastrado'] = true;
		header('LOCATION: ../../Cadastros_cidades/cadastro_cidadeAs.php?code='.$code);
		exit();
	} else {
		$_SESSION['nao_cadastrado'] = true;
		header('LOCATION: ../../Cadastros_cidades/cadastro_cidadeAs.php?code='.$code);
		exit();
	}

	$conexao->close();
?>