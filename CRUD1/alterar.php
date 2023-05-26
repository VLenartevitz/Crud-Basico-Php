<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/index.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Alterar Dados</title>
</head>

<body>
    <h1>Alternado Dados no Banco de Dados via formulário</h1>
    <?php
    require_once("conexao.php");
    $conexao = novaConexao();

    if (isset($_GET['codigo'])) {

        $sql = "SELECT * FROM cadastros WHERE id = ? ";

        $consulta = $conexao->prepare($sql);
        $consulta->bind_param("i", $_GET['codigo']);

        if ($consulta->execute()) {
            $resultado = $consulta->get_result(); 
    
            
            if ($resultado->num_rows > 0) {

                $dados = $resultado->fetch_assoc();              
            }
        }
       
    }
    
    if (count($_POST) > 0) {

        $dados = $_POST;
        $erros = [];

        if (trim($dados['nome']) === "") {
            $erros['nome'] = "Nome é obrigatório";
        }

        if (count($erros) == 0) {

            $sql = "UPDATE cadastros SET nome = ?, nascimento = ?, altura = ?, peso = ? WHERE id = ?";

           
            $consultar = $conexao->prepare($sql);

            $params = [
                $dados['nome'],
                $dados['nascimento'],
                $dados['altura'],
                $dados['peso'],
                $_GET['codigo']
            ];
        
            $consultar->bind_param("siddi", ...$params);

            if ($consultar->execute()) {
                unset($dados);
                echo 'Dados alterados com sucesso!';
            }
        }
    }
    ?>

    <form method="POST">
        <!--ID escondido-->
        <input type="hidden" name="id" value="<?= $dados['id']  ?>">
        <div class="form-row">
            <div class="form-group col-md-8">
                <label for="nome">Nome:</label>
                <input type="text" class="form-control <?php
                echo isset($erros['nome']) ? 'is-invalid' : '' ?>" id="id_nome" name="nome" placeholder="Nome"
                    value="<?php echo isset($dados['nome']) ? $dados['nome'] : '' ?>">
                <div class="invalid-feedback">
                    <?php
                    echo $erros['nome'];
                    ?>
                </div>
            </div>

            <div class="form-group col-md-4">
                <label for="nascimento">Nascimento:</label>
                <input type="text" class="form-control <?php echo isset($erros['nascimento']) ? 'is-invalid' : '' ?>"
                    id="id_nascimento" name="nascimento" placeholder="Nascimento"
                    value="<?php echo isset($dados['nascimento']) ? $dados['nascimento'] : '' ?>">
                <div class="invalid-feedback">
                    <?php echo $erros['nascimento']; ?>
                </div>
            </div>
        </div>

        <div class="form-row">
            
            <div class="form-group col-md-6">
                <label for="Altura">Altura:</label>
                <input type="text" class="form-control <?php echo isset($erros['altura']) ? 'is-invalid' : '' ?>"
                    id="id_altura" name="altura" placeholder="Altura"
                    value="<?php echo isset($dados['altura']) ? $dados['altura'] : '' ?>">
                
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="Peso">Peso:</label>
                <input type="number" class="form-control"
                    id="peso" name="peso" placeholder="Peso"
                    value="<?php echo isset($dados['peso']) ? $dados['peso'] : '' ?>">
                <div class="invalid-feedback">
                    <?php echo $erros['peso'] ?>
                </div>
            </div>

            
        </div>
        <div class="mb-3">
            
        <button class="btn btn-primary btn-lg">Enviar</button>
        <!-- <button onclick="location.href='index.php';" class="buttonD" name="Voltar"></button> -->

        </div>
    </form>
</body>

</html>