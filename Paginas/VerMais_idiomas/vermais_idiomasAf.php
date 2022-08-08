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
	<title>América do Norte</title>
</head>
<body>
    <?php
        require_once('../Scripts/conexao.php');

        $language = $_GET['linguagem']  ?? '';

        $sql = "SELECT * FROM countrylanguage WHERE Language = '$language'";

        $dados = mysqli_query($conexao, $sql);

        $linha = mysqli_fetch_assoc($dados);
    ?>
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col">
            <h1 class="pag-tabela"><?php echo $language = $linha['Language']; ?></h1>                 
            <div class="row justify-content-center align-items-center informacoes">
                <div class="col-4">
                    <p class="inform"><?php echo '<b>Código do País:</b> '.$code = $linha['CountryCode']; ?></p>
                    <p class="inform"><?php echo '<b>É Oficial:</b> '.$eoficial = $linha['IsOfficial']; ?></p>
                    <p class="inform"><?php echo '<b>Porcentagem:</b> '.$population = $linha['Percentage']; ?></p>
                </div>
            </div>
            <div class="return">
                <a href="../Idiomas/idiomasAf.php<?php echo "?code=$code"; ?>"><i class="bi-arrow-return-left" title="Voltar"></i></a>
            </div>
        </div>
    </div>
</div>
</body>
</html>