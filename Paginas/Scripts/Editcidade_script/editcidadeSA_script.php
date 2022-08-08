<?php
	session_start();
	include "../conexao.php";

	$id = $_POST['id'];
	$nome = $_POST['name'];
	$code = $_POST['countrycode'];
	$distrito = $_POST['district'];
	$populacao = $_POST['population'];

	$sql = "UPDATE city SET Name = '$nome', CountryCode = '$code', District = '$distrito', Population = $populacao WHERE ID = $id";

	$result = mysqli_query($conexao, $sql);

	if (mysqli_affected_rows($conexao) > 0) {
		$_SESSION['cadastrado'] = true;
		header('LOCATION: ../../Editar_cidades/editar_cidadeSA.php?code='.$code);
		exit();
	} else {
		$_SESSION['nao_cadastrado'] = true;
		header('LOCATION: ../../Editar_cidades/editar_cidadeSA.php?code='.$code);
		exit();
	}

	$conexao->close();
?>