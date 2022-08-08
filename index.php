<?php
    session_start();

    $cookie_name = 'usuario';

    if(isset($_COOKIE[$cookie_name])){
        $_SESSION['usuario'] = $_COOKIE[$cookie_name];
        header('location: Paginas/inicio.php');
    }
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
	<title>Início</title>
</head>
<body>
<div class="container">
	<div class="row justify-content-center">
	    <div class="col-5 border gy-5 mb-5">
	        <h1 class="row justify-content-center mt-5">Login</h1>
			<?php
				if (isset($_SESSION['nao_autenticado'])):
			?>
			<div class="alert alert-danger" role="alert">
			  ERRO: Usuário ou senha inválidos!
			</div>
			<?php
				endif;
				unset($_SESSION['nao_autenticado']);
			?>
	        <form action="Paginas/Scripts/autentica_login.php" method="POST">
	            <div class="mb-5 form-floating mt-5">
	                <input type="text" class="form-control" name="usuario" id="usuario" placeholder="Login" autofocus required>
	                <label for="usuario">Usuário (CPF/CNPJ):</label>
	            </div>
	            <div class="mb-5 form-floating">
	                <input type="password" class="form-control" name="senha" id="senha" placeholder="Senha" required>
	                <label for="senha">Senha:</label>
	            </div>
	            <div class="mb-5">
	                <a href="cadastro.php" class="form">Primeiro Acesso</a>
	            </div>
	            <div class="mb-5 float-end">
	                <input class="btn btn-primary dropdown-toggle" type="submit" name="botao" value="Entrar">
	            </div>
	        </form>
	    </div>
	</div>
</div>
</body>
</html>