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
	<title>Cadastro de Idiomas</title>
</head>
<body>
	<div class="container">
		<center><h1>Cadastrar Idiomas</h1></center>
		<?php
			if (isset($_SESSION['nao_cadastrado'])):
		?>
		<div class="alert alert-danger" id="ocultar" role="alert">
		  ERRO: Cadastro não autorizado!
		</div>
		<?php
			endif;
			unset($_SESSION['nao_cadastrado']);
		?>
		<?php
			if (isset($_SESSION['cadastrado'])):
		?>
		<div class="alert alert-success" role="alert">
		  Cadastro efetuado com sucesso!
		</div>
		<?php
			endif;
			unset($_SESSION['cadastrado']);
		?>
		<div class="row justify-content-center align-items-center">
			<div class="col-6">
				<form action="../Scripts/Cadastroidioma_script/cadastroidiomaNA_script.php" method="POST">
					<div class="form-group">
					    <label class="form-label" for="countrycode">Código do país:</label>
					    <input type="text" class="form-control" name="countrycode" value="<?php $code = $_GET['code'] ?? ''; echo "$code"; ?>" required>
			  		</div>
					<div class="form-group">
					    <label class="form-label">Idioma:</label>
					    <input type="text" class="form-control" name="language" required>
			  		</div>
			  		<div class="form-group">
					    <label class="form-label">É Oficial (T/F)?</label>
					    <input type="text" class="form-control" name="isofficial" required>
			  		</div>
			  		<div class="form-group">
					    <label class="form-label">Porcentagem:</label>
					    <input type="text" class="form-control" name="percentage" required>
			  		</div>
			  		<div class="form-group">
			  			<br>
					    <center><input type="submit" class="btn btn-success"></center>
				  	</div>
				</form>
				<div class="return">
			      <a href="../Idiomas/idiomasNA.php?code=<?php echo $_GET['code']; ?>"><i class="bi-arrow-return-left" title="Voltar"></i></a>
			    </div>
			</div>
		</div>
	</div>
</body>
</html>