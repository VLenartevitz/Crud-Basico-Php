<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/index.css" />
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Basico</title>
</head>
<body class="wrapper">
        <header>
            <h1>Formulario para calcular IMC</h1>
        </header>
    <div class="container">
        <div class="posiForm">  
            <form method="POST" class="Form">

                <label class="label">Coloque o seu nome:</label>
                <input type="text" name="nome" class="input" /><br>

                <label class="label">Coloque a seu Ano de Nascimento:</label>
                <input type="text" name="nascimento" class="input" /><br>

                <label class="label">Coloque a sua altura:</label>
                <input type="text" name="altura" class="input" /><br>

                <label class="label">Coloque o seu Peso:</label>
                <input type="text" name="peso" class="input" /><br>

                <div class="posiButtons">
                    <input type="submit" value="Salvar/Calcular"  class="buttonS" /> 
                    <input type="button" value="Deletar" class="buttonD" onclick="location.href='consultar.php';" />
                </div>
            </form>

        </div>

        <table border="4">
        <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>Nascimento</th>
            <th>altura</th>
            <th>peso</th>
            <th>imc</th>
            <th>classImc</th>
        </thead>

        <tbody>
            <?php foreach($registros as $registro): ?>
                <tr>
                <td><?=$registro['id']?></td>
                <td><?=$registro['nome']?></td>
                <td>
                    <?= 
                        date('d/m/Y',strtotime($registro['nascimento']));
                    ?>
                </td>
                <td><?=$registro['nascimento']?></td>
                <td><?=$registro['altura']?></td>
                <td><?=$registro['peso']?></td>
                <td><?=$registro['imc']?></td>
                <td><?=$registro['classImc']?></td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
        <?php
    if (isset($_POST['nome'])){
        $nome = $_POST['nome'];
        $idade = date('Y') - $_POST['nascimento'];
        $altura = $_POST['altura'];
        $peso = $_POST['peso'];
        $imc = $peso /($altura * $altura );
        $classImc;
        
        if($imc>40)
        {$classImc = "Obesidade Grave";}
        elseif($imc >= 30 && $imc < 40 ){
            $classImc = "Obesidade";
        }elseif ( $imc >= 25 && $imc < 30){
            $classImc = "Sobrepeso";
        }elseif ( $imc >= 18.5 && $imc < 25){
            $classImc = "Normal";
        }elseif ($imc < 18.5){
            $classImc = "Magreza";
        }

        echo "Olá! $nome você tem 
        $idade anos, seu IMC é $imc , e tratase de $classImc!";
    }
    
    require("conexao.php");

    $conexao = novaConexao(null); 

    $sql='CREATE DATABASE IF NOT EXISTS crud_imc';

    $resultado = $conexao->query($sql); 

    if($resultado){
        echo "Banco de Dados CRIADO com SUCESSO :)";
    }else{
        echo ":( Erro: ".$conexao->error;
    }


    $sql="CREATE TABLE IF NOT Exists cadastros(
        id int(6) auto_increment primary key,
        nome varchar(50) not null,
        nascimento int(3),
        altura double,
        peso double
    )";

    $conexao = novaConexao();

    $resultado = $conexao->query($sql);

    if($resultado){
        echo "Tabela CRIADA com SUCESSO :)";
    }else{
        echo ":( Erro: ".$conexao->error;
    }



    $erros = [];
    $dados = $_POST;
         
         $sql="INSERT INTO cadastros (nome, nascimento, altura, peso) values (?, ?, ?, ?)";

         $insert = $conexao->prepare($sql);

         $params = [
             $dados['nome'],
             $dados['nascimento'],
             $dados['altura'],
             $dados['peso'],
            
         ];
         
         $insert->bind_param("sidd", ...$params);
         
         if ($insert->execute()){
             unset($dados); 


         }
   
 
 ?>
    </div>
</body>

</html>