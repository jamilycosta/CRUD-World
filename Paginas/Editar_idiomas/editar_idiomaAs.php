<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Meta tags Obrigatórias -->
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap JS -->
    <script src="../../bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <!-- Plugin do Jquery: usado para aplicar a máscara no campo telefone. -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../Estilos/estilo.css">
	<title>Atualização de Idiomas</title>
</head>
<body>
	<div class="container">
		<center><h1>Atualizar Dados do Idioma</h1></center>
		<?php
			if (isset($_SESSION['nao_cadastrado'])):
		?>
		<div class="alert alert-danger" id="ocultar" role="alert">
		  ERRO: Atualização não autorizada!
		</div>
		<?php
			endif;
			unset($_SESSION['nao_cadastrado']);
		?>
		<?php
			if (isset($_SESSION['cadastrado'])):
		?>
		<div class="alert alert-success" role="alert">
		  Atualização efetuada com sucesso!
		</div>
		<?php
			endif;
			unset($_SESSION['cadastrado']);
		?>
		<?php
	        require_once('../Scripts/conexao.php');

	        $language = $_GET['linguagem'] ?? '';

	        $sql = "SELECT * FROM countrylanguage WHERE Language = '$language'";

	        $dados = mysqli_query($conexao, $sql);

	        $linha = mysqli_fetch_assoc($dados);
	    ?>
	<div class="row justify-content-center align-items-center">
		<div class="col-6">
			<form action="../Scripts/Editidioma_script/editidiomaAs_script.php" method="POST">
				<label class="form-label" for="countrycode">Código do país:</label>
					<div class="form-group">
					    <input type="text" class="form-control" name="countrycode" value="<?php
					    if ($language == '') {
							echo "";
						} else {
							echo $_GET['code'];
						} ?>" required>
			  		</div>
					<div class="form-group">
					    <label class="form-label">Idioma:</label>
					    <input type="text" class="form-control" name="language" value="<?php
					    if ($language == '') {
							echo "";
						} else {
							echo $linguagem = $linha['Language'];
						} ?>" required>
			  		</div>
			  		<div class="form-group">
					    <label class="form-label">É Oficial (T/F)?</label>
					    <input type="text" class="form-control" name="isofficial" value="<?php
					    if ($language == '') {
							echo "";
						} else {
							echo $eoficial = $linha['IsOfficial'];
						} ?>" required>
			  		</div>
			  		<div class="form-group">
					    <label class="form-label">Porcentagem:</label>
					    <input type="text" class="form-control" name="percentage" value="<?php
					    if ($language == '') {
							echo "";
						} else {
							echo $porcentagem = $linha['Percentage'];
						} ?>" required>
			  		</div>
		  		<div class="form-group">
		  			<br>
				    <center><input type="submit" class="btn btn-success"></center>
			  	</div>
			</form>
			<div class="return">
		      <a href="../Idiomas/idiomasAs.php?code=<?php echo $_GET['code']; ?>"><i class="bi-arrow-return-left" title="Voltar"></i></a>
		    </div>
		</div>
	</div>
	</div>
</body>
</html>