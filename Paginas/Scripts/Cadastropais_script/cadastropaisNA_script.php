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

	$sql = "INSERT INTO country (Code, Name, Continent, Region, SurfaceArea, IndepYear, Population, LifeExpectancy, GNP, GNPOld, LocalName, GovernmentForm, HeadOfState, Capital, Code2) VALUES ('$sigla', '$nome', '$continente', '$regiao', $area, $independencia, $populacao, $expectativavida, $gnp, $gnpold, '$nomelocal', '$formagoverno', '$chefe', $capital, '$sigla2')";

	$result = mysqli_query($conexao, $sql);

	if (mysqli_affected_rows($conexao) > 0) {
		$_SESSION['cadastrado'] = true;
		header('LOCATION: ../../Cadastros_paises/cadastro_paisNA.php');
		exit();
	} else {
		$_SESSION['nao_cadastrado'] = true;
		header('LOCATION: ../../Cadastros_paises/cadastro_paisNA.php');
		exit();
	}

	$conexao->close();
?>