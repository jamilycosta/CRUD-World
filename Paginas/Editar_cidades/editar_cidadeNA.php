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
	<title>Atualização de Cidades</title>
</head>
<body>
	<div class="container">
		<center><h1>Atualizar Dados da Cidade</h1></center>
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

	        $id = $_GET['id'] ?? '';

	        $sql = "SELECT * FROM city WHERE ID = '$id'";

	        $dados = mysqli_query($conexao, $sql);

	        $linha = mysqli_fetch_assoc($dados);
	    ?>
	<div class="row justify-content-center align-items-center">
		<div class="col-6">
			<form action="../Scripts/Editcidade_script/editcidadeNA_script.php" method="POST">
					<div class="form-group">
					    <label class="form-label" for="name">Nome:</label>
					    <input type="text" class="form-control" name="name" value="<?php
					    if ($id == '') {
							echo "";
						} else {
							echo $nome = $linha['Name'];
						} ?>" required>
			  		</div>
			  		<div class="form-group">
					    <label class="form-label" for="countrycode">Código do país:</label>
					    <input type="text" class="form-control" name="countrycode" value="<?php
					    if ($id == '') {
							echo "";
						} else {
							echo $_GET['code'];
						} ?>" required>
			  		</div>
			  		<div class="form-group">
					    <label class="form-label" for="district">Distrito:</label>
					    <input type="text" class="form-control" name="district" value="<?php
					    if ($id == '') {
							echo "";
						} else {
							echo $distrito = $linha['District'];
						} ?>" required>
			  		</div>
			  		<div class="form-group">
					    <label class="form-label" for="population">População:</label>
					    <input type="number" class="form-control" name="population" value="<?php
					    if ($id == '') {
							echo "";
						} else {
							echo $populacao = $linha['Population'];
						} ?>" required>
			  		</div>
		  		<div class="form-group">
		  			<br>
		  			<input type="hidden" name="id" value="<?php
					    if ($id == '') {
							echo "";
						} else {
							echo $id = $linha['ID'];
						} ?>">
				    <center><input type="submit" class="btn btn-success"></center>
			  	</div>
			</form>
			<div class="return">
		      <a href="../Cidades/cidadesNA.php?code=<?php echo $_GET['code']; ?>"><i class="bi-arrow-return-left" title="Voltar"></i></a>
		    </div>
		</div>
	</div>
	</div>
</body>
</html>