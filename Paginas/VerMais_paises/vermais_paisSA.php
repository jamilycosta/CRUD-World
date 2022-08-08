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
	<title>América do Sul</title>
</head>
<body>
    <?php
        require_once('../Scripts/conexao.php');

        $code = $_GET['code']  ?? '';

        $sql = "SELECT * FROM country WHERE Code = '$code'";

        $dados = mysqli_query($conexao, $sql);

        $linha = mysqli_fetch_assoc($dados);
    ?>
<div class="container">
    <div class="row justify-content-center align-items-center">
        <div class="col">
            <h1 class="pag-tabela"><?php echo $nome = $linha['Name']; ?></h1>                 
            <div class="row justify-content-center align-items-center informacoes">
                <div class="col-4">
                    <p class="inform"><?php echo '<b>Código:</b> '.$code = $linha['Code']; ?></p>
                    <p class="inform"><?php echo '<b>Código 2:</b> '.$code2 = $linha['Code2']; ?></p>
                    <p class="inform"><?php echo '<b>Continente:</b> '.$continent = $linha['Continent']; ?></p>
                    <p class="inform"><?php echo '<b>Região:</b> '.$region = $linha['Region']; ?></p>
                    <p class="inform"><?php echo '<b>Área de Superfície:</b> '.$surfacearea = $linha['SurfaceArea']; ?></p>
                    <p class="inform"><?php echo '<b>Ano de Independência:</b> '.$indepyear = $linha['IndepYear']; ?></p>
                    <p class="inform"><?php echo '<b>População:</b> '.$population = $linha['Population']; ?></p>
                </div>
                <div class="col-4">
                    <p class="inform"><?php echo '<b>Expectativa de Vida:</b> '.$lifeexpectancy = $linha['LifeExpectancy']; ?></p>
                    <p class="inform"><?php echo '<b>Renda Nacional Bruta:</b> '.$gnp = $linha['GNP']; ?></p>
                    <p class="inform"><?php echo '<b>Antiga Renda Nacional Bruta:</b> '.$gnpold = $linha['GNPOld']; ?></p>
                    <p class="inform"><?php echo '<b>Nome Local:</b> '.$localname = $linha['LocalName']; ?></p>
                    <p class="inform"><?php echo '<b>Forma de Governo:</b> '.$governmentform = $linha['GovernmentForm']; ?></p>
                    <p class="inform"><?php echo '<b>Chefe de Estado:</b> '.$headofstate = $linha['HeadOfState']; ?></p>
                    <p class="inform"><?php echo '<b>Capital:</b> '.$capital = $linha['Capital']; ?></p>
                </div>
            </div>
            <div class="return">
                <a href="../Paises/southamerica.php"><i class="bi-arrow-return-left" title="Voltar"></i></a>
            </div>
        </div>
    </div>
</div>
</body>
</html>