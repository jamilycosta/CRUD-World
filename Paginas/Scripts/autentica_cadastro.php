<?php
	session_start();
	include "conexao.php";

	$nome = $_POST['nome'];
	$cpf = $_POST['cpf'];
	$senha = $_POST['senha'];
	$confsenha = $_POST['confsenha'];

	$sql = "SELECT COUNT(*) AS TOTAL FROM usuario WHERE cpf = '$cpf'";
	$result = mysqli_query($conexao, $sql);
	$row = mysqli_fetch_assoc($result);

	if ($row['TOTAL'] > 0 || $senha != $confsenha) {
		$_SESSION['nao_cadastrado'] = true;
		header('LOCATION: ../../cadastro.php');
		exit();
	}

	$sql2 = "INSERT INTO usuario (nome, cpf, senha) VALUES ('$nome','$cpf', '$senha')";

	if ($conexao->query($sql2) === TRUE && $senha == $confsenha) {
		$_SESSION['cadastrado'] = true;
		header('LOCATION: ../../cadastro.php');
		exit();
	}
	
	$conexao->close();
?>