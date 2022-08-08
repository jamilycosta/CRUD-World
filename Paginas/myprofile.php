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
	<title>My Profile</title>
</head>
<body>
	<div class="container-fluid">
		<div class="row flex-nowrap">
			<div class="col-auto px-0">
				<div id="sidebar" class="collapse collapse-horizontal border-end bg-black">
				    <div id="sidebar-nav" class="list-group border-0 rounded-0 text-sm-start min-vh-100">
				        <a href="inicio.php"
				            class="link-primary list-group-item border-end-0 d-inline-block text-truncate bg-black"
				            data-bs-parent="#sidebar">
				            <i class="fs-4 bi-house"></i>
				            <span>Home</span>
				        </a>
				        <a href="myprofile.php"
				            class="link-primary list-group-item border-end-0 d-inline-block text-truncate bg-black"
				            data-bs-parent="#sidebar">
				            <i class="bi bi-pencil-square"></i>
				            <span>My Profile</span>
				        </a>
				        <a href="#" id="exit" data-bs-toggle='modal' data-bs-target='#modal_confirma'
				            class="link-primary list-group-item border-end-0 d-inline-block text-truncate bg-black"
				            data-bs-parent="#sidebar">
				            <i class="bi bi-x-circle"></i>
				            <span>Logout</span>
				        </a>
				    </div>
				</div>
			</div>
				<main class="col ps-md-2 pt-2">
	                <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse"
	                    data-bs-target="#sidebar" aria-expanded="false" aria-controls="sidebar">
	                    <i class="bi bi-list bi-lg py-2 p-1"></i>Menu
	                </button>
	                <div class="row">
	                	<div class="col">
	                		<i id="conta" class="bi-person-circle perfil"></i>
	                		<h4 class="perfil">Meu Perfil</h4>
	                		<hr id="perfilhr" class="col-md-6">
	                		<p class="user"><b>ID: </b><?php echo $linha['idusuario']; ?></p>
	                		<p class="user"><b>Nome: </b><?php echo $linha['nome']; ?></p>
	                		<p class="user"><b>CPF: </b><?php echo $linha['cpf']; ?></p>
	                	</div>
	                </div>
	                <div class="row">
	                	<div class="col">
	                		<br>
	                		<center><a href="alterardados.php" class="btn btn-success">Alterar Dados</a></center>
	                	</div>
	                </div>
        	</main>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="modal_confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLabel">Confirmação</h5>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
	      </div>
	      <div class="modal-body">
	      	<form action="Scripts/sair.php" method="POST">
	        <p>Deseja realmente sair?</p>
	      </div>
	      <div class="modal-footer">
	        <button type="button" id="cancelar" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
	        <input type="submit" class="btn btn-danger" value="Confirmar">
	        </form>
	      </div>
	    </div>
	  </div>
	</div>
</body>
</html>