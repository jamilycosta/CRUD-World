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
	<title>Cadastro de Países</title>
</head>
<body>
	<div class="container">
	<h1>Cadastrar País</h1>
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
		<form action="../Scripts/Cadastropais_script/cadastropaisNA_script.php" method="POST">
			<div class="form-group">
		    <label class="form-label" for="code">Sigla:</label>
		    <input type="text" class="form-control" name="code" id="code" required>
	  		</div>
	  		<div class="form-group">
			    <label class="form-label" for="name">Nome:</label>
			    <input type="text" class="form-control" name="name" id="name" required>
	  		</div>
	  		<div class="mb-3">
			    <label class="form-label" for="continent">Continente:</label>
			    <input type="text" class="form-control" name="continent" id="continent" value="<?php echo "North America" ?>" required>
	  		</div>
	  		<div class="form-group">
			    <label class="form-label" for="region">Região:</label>
			    <input type="text" class="form-control" name="region" id="region" required>
	  		</div>
	  		<div class="form-group">
			    <label class="form-label" for="surfacearea">Área de Superfície:</label>
			    <input type="number" class="form-control" name="surfacearea" id="surfacearea" required>
	  		</div>
	  		<div class="form-group">
			    <label class="form-label" for="indepyear">Ano de Independência:</label>
			    <input type="number" class="form-control" name="indepyear" id="indepyear">
	  		</div>
	  		<div class="form-group">
			    <label class="form-label" for="population">População</label>
			    <input type="number" class="form-control" name="population" id="population" required>
	  		</div>
	  		<div class="form-group">
			    <label class="form-label" for="lifeexpectancy">Expectativa de Vida:</label>
			    <input type="number" class="form-control" name="lifeexpectancy" id="lifeexpectancy">
	  		</div>
				<div class="form-group">
				    <label class="form-label" for="gnp">Renda Nacional Bruta:</label>
				    <input type="number" class="form-control" name="gnp" id="gnp" required>
  		  		</div>
				<div class="form-group">
				    <label class="form-label" for="gnpold">Antiga Renda Nacional Bruta:</label>
				    <input type="number" class="form-control" name="gnpold" id="gnpold">
		  	</div>
	  		<div class="form-group">
			    <label class="form-label" for="localname">Nome Local:</label>
			    <input type="text" class="form-control" name="localname" id="localname" required>
	  		</div>
	  		<div class="form-group">
			    <label class="form-label" for="governmentform">Forma de Governo:</label>
			    <input type="text" class="form-control" name="governmentform" id="governmentform" required>
	  		</div>
	  		<div class="form-group">
			    <label class="form-label" for="headofstate">Chefe de Estado:</label>
			    <input type="text" class="form-control" name="headofstate" id="headofstate" required>
	  		</div>
	  		<div class="form-group">
			    <label class="form-label" for="capital">Capital:</label>
			    <input type="number" class="form-control" name="capital" id="capital" required>
	  		</div>
	  		<div class="form-group">
			    <label class="form-label" for="code2">Sigla 2:</label>
			    <input type="text" class="form-control" name="code2"  id="code2">
	  		</div>
				<br>
		  	<div class="form-group">
		  		<center><input type="submit" class="btn btn-success"></center>
		  	</div>
		  	<br>
			</form>
			<div class="return">
	      <a href="../Paises/northamerica.php"><i class="bi-arrow-return-left" title="Voltar"></i></a>
	    </div>
		</div>
	</div>
</div>
</body>
</html>