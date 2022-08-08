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
	<title>Cidades</title>
</head>
<body>
    <?php
        $pesquisa = $_POST['busca'] ?? '';

        $code = $_GET['code']  ?? '';

        require_once('../Scripts/conexao.php');

        $sql = "SELECT * FROM city WHERE CountryCode = '$code' AND Name LIKE '%$pesquisa%'";

        $dados = mysqli_query($conexao, $sql);
    ?>
<div class="container">
    <div class="row">
        <div class="col">
        <h1 class="pag-tabela">Cidades da África</h1>
        <nav class="navbar">
            <h4>Pesquisar por nome:</h4>
            <div class="container-fluid">
                <form class="d-flex" action="cidadesAf.php<?php echo "?code=$code"; ?>" method="POST">
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
              Cidade excluída com sucesso!
            </div>
            <?php
                endif;
                unset($_SESSION['excluido']);
        ?>
    </div>
</div>
        <div class="row justify-content-center align-items-center">
            <div class="col">
                <a href="../Cadastros_cidades/cadastro_cidadeAf.php<?php echo "?code=$code"; ?>" class="btn btn-success pull-right">
                    <i class="fa fa-plus"></i>Adicionar Cidade
                </a>
                <div class="mt-5 mb-3 clearfix">
                    <table class="table table-bordered table-hover">
                      <thead class="table-dark">
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Código do País</th>
                          <th scope="col">Nome</th>
                          <th scope="col">Distrito</th>
                          <th scope="col">População</th>
                          <th scope="col">Ações</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            while ($linha = mysqli_fetch_assoc($dados)) {
                                $id = $linha['ID'];
                                $codigopais = $linha['CountryCode'];
                                $nome = $linha['Name'];
                                $distrito = $linha['District'];
                                $populacao = $linha['Population'];

                                echo 
                                    "<tr>
                                      <td>$id</td>
                                      <td>$codigopais</td>
                                      <td>$nome</td>
                                      <td>$distrito</td>
                                      <td>$populacao</td>
                                      <td><center>
                                        <a href='../VerMais_cidades/vermais_cidadesAf.php?id=$id' class='mr-3' title='Ver Mais' data-toggle='tooltip'><span class='fa fa-eye'></span></a>
                                        <a href='../Editar_cidades/editar_cidadeAf.php?id=$id&code=$codigopais' class='mr-3' title='Editar Informações' data-toggle='tooltip'><span class='fa fa-pencil'></span></a>
                                        <a href='#' class='mr-3' title='Excluir' data-toggle='tooltip' data-bs-toggle='modal' data-bs-target='#modal_confirma' onclick=" .'"' ."pegar_dados('$id', '$nome', '$codigopais')" .'"' ."><span class='fa fa-trash'></span></a></td>
                                    </tr>";
                            }
                        ?>
                      </tbody>
                    </table>
                </div>
                <div class="return">
                    <a href="../Paises/africa.php"><i class="bi-arrow-return-left" title="Voltar"></i></a>
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
            <form action="../Scripts/Excluircidade_script/excluircidadeAf_script.php" method="POST">
            <p>Deseja realmente excluir esse dado?</p>
          </div>
          <div class="modal-footer">
            <button type="button" id="cancelar" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
            <input type="hidden" name="Name" id="nome" value="">
            <input type="hidden" name="ID" id="id" value="">
            <input type="hidden" name="CountryCode" id="code" value="">
            <input type="submit" class="btn btn-danger" value="Confirmar">
            </form>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
        function pegar_dados(id, nome, code) {
            document.getElementById('nome').value = nome;
            document.getElementById('id').value = id;
            document.getElementById('code').value = code;
        }
    </script>
</body>
</html>