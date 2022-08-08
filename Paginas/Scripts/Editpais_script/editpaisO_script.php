<?php
	session_start();
	include "../conexao.php";

	$sigla = $_POST['code'];
	$nome = $_POST['name'];
	$continente = $_POST['continent'];
	$regiao = $_POST['region'];
	$area = $_POST['surfacearea'];
	$independencia = $_POST['indepyear'];
	$populacao = $_POST['population'];
	$expectativavida = $_POST['lifeexpectancy'];
	$gnp = $_POST['gnp'];
	$gnpold = $_POST['gnpold'];
	$nomelocal = $_POST['localname'];
	$formagoverno = $_POST['governmentform'];
	$chefe = $_POST['headofstate'];
	$capital = $_POST['capital'];
	$sigla2 = $_POST['code2'];

	$sql = "UPDATE country SET Code = '$sigla', Name = '$nome', Continent = '$continente', Region = '$regiao', SurfaceArea = $area, IndepYear = $independencia, Population = $populacao, LifeExpectancy = $expectativavida, GNP = $gnp, GNPOld = $gnpold, LocalName = '$nomelocal', GovernmentForm = '$formagoverno', HeadOfState = '$chefe', Capital = $capital, Code2 = '$sigla2' WHERE Code = '$sigla'";

	$result = mysqli_query($conexao, $sql);

	if (mysqli_affected_rows($conexao) > 0) {
		$_SESSION['cadastrado'] = true;
		header('LOCATION: ../../Editar_paises/editar_paisO.php');
		exit();
	} else {
		$_SESSION['nao_cadastrado'] = true;
		header('LOCATION: ../../Editar_paises/editar_paisO.php');
		exit();
	}

	$conexao->close();
?>