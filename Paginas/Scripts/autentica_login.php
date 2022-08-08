<?php
	session_start();
	include "conexao.php";

	if (empty($_POST['usuario']) || empty($_POST['senha'])) {
		header('Location: ../../index.php');
		exit();
	}

	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];

	$query = "SELECT idusuario, cpf, senha FROM usuario WHERE cpf = '{$usuario}' AND senha = '{$senha}'";
	$result = mysqli_query($conexao, $query);
	$row = mysqli_num_rows($result);

	if ($row > 0) {
		$_SESSION['usuario'] = $usuario;
		setcookie('usuario', $usuario, time() + 600, "/");
		header('LOCATION: ../inicio.php');
		exit();
	} else if ($row == 0) {
		$_SESSION['nao_autenticado'] = true;
		header('LOCATION: ../../index.php');
		exit();
	}
?>