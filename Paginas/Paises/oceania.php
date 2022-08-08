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
    <title>Oceania</title>
</head>
<body>
    <?php
        $pesquisa = $_POST['busca'] ?? '';

        require_once('../Scripts/conexao.php');

        $sql = "SELECT Code, Name, Continent, Region FROM country WHERE Continent = 'Oceania' AND Name LIKE '%$pesquisa%'";

        $dados = mysqli_query($conexao, $sql);
    ?>
<div class="container">
    <div class="row">
        <h1 class="pag-tabela">Países da Oceania</h1>                 
        <nav class="navbar">
            <h4>Pesquisar por nome:</h4>
            <div class="container-fluid">
                <form class="d-flex" action="oceania.php" method="POST">
                    <input class="form-control me-2" type="search" aria-label="Search" name="busca" autofocus>
                    <button class="btn btn-outline-success" type="submit">Pesquisar</button>
                </form>
            </div>
        </nav>
        <?php
            if (isset($_SESSION['nao_excluido'])):
            ?>
            <div class="alert alert-danger" id="ocultar" role="alert">
              ERRO: Não foi possível excluir!
            </div>
            <?php
                endif;
                unset($_SESSION['nao_excluido']);
            ?>
            <?php
                if (isset($_SESSION['excluido'])):
            ?>
            <div class="alert alert-success" role="alert">
              País excluído com sucesso!
            </div>
            <?php
                endif;
                unset($_SESSION['excluido']);
        ?>
    </div>
        <div class="row justify-content-center align-items-center">
            <div class="col">
                <a href="../Cadastros_paises/cadastro_paisO.php" class="btn btn-success pull-right">
                    <i class="fa fa-plus"></i> Adicionar País
                </a>
                <div class="mt-5 mb-3 clearfix">
                    <table class="table table-bordered table-hover">
                      <thead class="table-dark">
                        <tr>
                          <th scope="col">Sigla</th>
                          <th scope="col">Nome</th>
                          <th scope="col">Região</th>
                          <th scope="col">Continente</th>
                          <th scope="col">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            while ($linha = mysqli_fetch_assoc($dados)) {
                                $codigo = $linha['Code'];
                                $nome = $linha['Name'];
                                $regiao = $linha['Region'];
                                $continente = $linha['Continent'];

                                echo 
                                    "<tr>
                                      <td>$codigo</td>
                                      <td>$nome</td>
                                      <td>$regiao</td>
                                      <td>$continente</td>
                                      <td><center>
                                        <a href='../VerMais_paises/vermais_paisO.php?code=$codigo' class='mr-3' title='Ver Mais' data-toggle='tooltip'><span class='fa fa-eye'></span></a>
                                        <a href='../Editar_paises/editar_paisO.php?code=$codigo' class='mr-3' title='Editar Informações' data-toggle='tooltip'><span class='fa fa-pencil'></span></a>
                                        <a href='#' class='mr-3' title='Excluir' data-toggle='tooltip'><span class='fa fa-trash' data-bs-toggle='modal' data-bs-target='#modal_confirma' onclick=" .'"' ."pegar_dados('$codigo', '$nome')" .'"' ."<span class='fa fa-trash'></span></a>
                                        <a href='../Cidades/cidadesO.php?code=$codigo' class='mr-3' title='Ver Cidades' data-toggle='tooltip'><span class='fa fa-building'></span></a>
                                        <a href='../Idiomas/idiomasO.php?code=$codigo' class='mr-3' title='Ver Idiomas' data-toggle='tooltip'><span class='fa fa-language'></span></a>
                                      </center></td>
                                    </tr>";
                            }
                        ?>
                      </tbody>
                    </table>
                </div>
                <div class="return">
                    <a href="../inicio.php"><i class="bi-arrow-return-left" title="Voltar"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="modal_confirma" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirmação de Exclusão</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
          </div>
          <div class="modal-body">
            <form action="../Scripts/Excluirpais_script/excluirpaisO_script.php" method="POST">
            <p>Deseja realmente excluir esse dado?</p>
          </div>
          <div class="modal-footer">
            <button type="button" id="cancelar" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <input type="hidden" name="Name" id="nome" value="">
            <input type="hidden" name="Code" id="codigo" value="">
            <input type="submit" class="btn btn-danger" value="Confirmar">
            </form>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
        function pegar_dados(codigo, nome) {
            document.getElementById('nome').value = nome;
            document.getElementById('codigo').value = codigo;
        }
    </script>
</body>
</html>