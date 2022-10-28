<?php
	/*function connect() {

	    $conexao = mysqli_connect("localhost", "root", "", "world");

	    if (mysqli_connect_errno()) {
	        echo "Não foi possível conectar ao banco de dados: " . mysqli_connect_error();

	    }

	    return $conexao;
	}*/

	$server = "localhost";
	$user = "root";
	$pass = "";
	$bd = "world";

	if ($conexao = mysqli_connect($server, $user, $pass, $bd)) {
		//echo "Conectado!";
	} else {
		echo "Erro!";
	}
?>
