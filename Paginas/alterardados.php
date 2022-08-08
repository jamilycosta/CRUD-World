<?php
	session_start();
	require_once('Scripts/conexao.php');

	if(!isset($_SESSION['usuario'])) {
		header("location: ../index.php");
	}

	$usuario = $_SESSION['usuario'];

	$nome = "SELECT * FROM usuario WHERE cpf LIKE '$usuario'";

	$dados = mysqli_query($conexao, $nome);
	$linha = mysqli_fetch_assoc($dados);
?>
<!DOCTYPE html>
<html>
<head>
	<!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap JS -->
    <script src="../bootstrap-5.1.3-dist/js/bootstrap.min.js"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <!-- Plugin do Jquery: usado para aplicar a máscara no campo telefone. -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../Estilos/estilo.css">
	<title>Alterar Dados</title>
</head>
<body>
	<div class="container">
		<div class="row  justify-content-center align-items-center">
			<div class="col-6">
				<h1 class="form">Alterar Dados</h1>
				<?php
					if (isset($_SESSION['nao_cadastrado'])):
				?>
				<div class="alert alert-danger" id="ocultar" role="alert">
				  ERRO: Alteração não autorizada!
				</div>
				<?php
					endif;
					unset($_SESSION['nao_cadastrado']);
				?>
				<?php
					if (isset($_SESSION['cadastrado'])):
				?>
				<div class="alert alert-success" role="alert">
				  Alteração efetuada com sucesso!
				</div>
				<?php
					endif;
					unset($_SESSION['cadastrado']);
				?>
				<center><div>
					<form action="Scripts/alterardados_script.php" method="POST">
						<br>
						<input class="form-control" type="text" name="id" id="id" value="<?php echo $linha['idusuario']; ?>" disabled>
						<br>
						<input class="form-control" type="text" name="nome" id="nome" value="<?php echo $linha['nome']; ?>" required>
						<br>
						<input class="form-control" type="text" name="cpf" id="cpf" value="<?php echo $linha['cpf']; ?>" required>
						<br>
						<input class="form-control" type="password" name="senha" id="senha" placeholder="Senha" required>
						<br>
						<input class="form-control" type="password" name="confSenha" id="confSenha" placeholder="Confirmar Senha" required>
						<br>
						<input class="btn btn-success" type="submit" name="botao" value="Atualizar">
						<input class="form-control" type="hidden" name="idusuario" id="idusuario" value="<?php echo $linha['idusuario']; ?>">
					</form>
					<div class="return">
			      	<a href="myprofile.php"><i class="bi-arrow-return-left" title="Voltar"></i></a>
			    	</div>
			</div>
		</div>
	</div>
</body>
</html>