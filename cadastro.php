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
    <script src="bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <!-- Plugin do Jquery: usado para aplicar a máscara no campo telefone. -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
	<title>Cadastro</title>
</head>
<body>
<div class="container">
	<div class="row justify-content-center">
	    <div class="col-5 border gy-5 mb-5">
	        <h1 class="row justify-content-center mt-5">Cadastro</h1>
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
	        <form action="Paginas/Scripts/autentica_cadastro.php" method="POST">
	            <div class="mb-5 form-floating mt-5">
	            	<input class="form-control" type="text" name="nome" id="nome" required>
	                <label for="nome">Nome:</label>
	            </div>
	            <div class="mb-5 form-floating">
	            	<input class="form-control" type="text" name="cpf" id="cpf" required>
	            	<label for="cpf">Usuário (CPF/CNPJ):</label>
				</div>
				<div class="mb-5 form-floating">
					<input class="form-control" type="password" name="senha" id="senha" required>
	            	<label for="senha">Senha:</label>
				</div>
				<div class="mb-5 form-floating">
					<input class="form-control" type="password" name="confsenha" id="confsenha" required>
	            	<label for="confsenha">Confirme a senha:</label>
				</div>
	            <div class="mb-5 float-end">
	                <input class="btn btn-primary dropdown-toggle" type="submit" name="botao" value="Cadastrar">
				<br>
	            </div>
	            <div class="mb-5">
	                <a href="index.php" class="form">Voltar</a>
	            </div>
	        </form>
	    </div>
	</div>
</div>
</body>
</html>