<?php
	session_start();
	include "conexao.php";

	$idusuario = mysqli_real_escape_string($conexao, trim($_POST['idusuario']));

	$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
	$cpf = mysqli_real_escape_string($conexao, trim($_POST['cpf']));
	$senha = mysqli_real_escape_string($conexao, trim($_POST['senha']));
	$confSenha = $_POST['confSenha'];

	$sql = "UPDATE usuario SET nome = '$nome', cpf = '$cpf', senha = '$senha' WHERE idusuario = $idusuario";
	
	if (mysqli_query($conexao, $sql) && $senha == $confSenha) {
		$_SESSION['cadastrado'] = true;
		header('LOCATION: ../alterardados.php');
		exit();
	} else {
		$_SESSION['nao_cadastrado'] = true;
		header('LOCATION: ../alterardados.php');
		exit();
	}
?>