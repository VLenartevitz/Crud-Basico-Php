<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php?display=inserir">Cadastrar IMC</a> | <a href="index.php?acao=lista">Listar IMC</a>
    <?php
    require_once('conexao.php');

    $sql = "create database if not exists Diogo_Kawaguchi_Rosa";
    $conn = novaConexao();
    $conn->query($sql);
    // $conn = novaConexao();
    // $conn->query($sql);
    $conn = null;

    $sql = "create table if not exists imc(
        id int auto_increment,
        peso float,
        altura float,
        imc float,
        primary key(id))";
    $conn = novaConexao("Diogo_Kawaguchi_Rosa");
    $conn->query($sql);
    $conn = null;
    
    if(isset($_GET['display'])and $_GET['display']=='inserir'){
        if(isset($_GET['acao'])and $_GET['acao']=='inserir'){
            $altura=$_GET['altura'];
            $peso=$_GET['peso'];
            $imc=$_GET['imc'];
            echo "<form action='op.php?op=inserir&altura=$altura&peso=$peso&imc=$imc' method='POST'>";
            echo "<br>";

            echo "<span>Altura Informada: 
                </span>";
            echo "<input type='text' name='txtaltura' value='$altura'><br>";

            echo "<span>Peso Informado: </span>";
            echo "<input type='text' name='txtpeso' value='$peso'><br>";

            echo "<button type='submit' disabled>Calcular</button>";
            echo "<button type='submit'>Inserir</button>";
        }else{
            echo "<form action='op.php?op=calcular&modo=inserir' method='POST'>";
            echo "<br>";

            echo "<span>Digite a altura:: 
                </span>";
            echo "<input type='text' name='txtaltura' placeholder='Obs.: metros'><br>";

            echo "<span>Digite o peso: </span>";
            echo "<input type='text' name='txtpeso' placeholder='Obs.: KG'><br>";

            echo "<button type='submit'>Calcular</button>";
            echo "<button type='submit' disabled>Inserir</button>";
        }
    }else if(isset($_GET['display'])and $_GET['display']=='editar'){
        if(isset($_GET['acao'])and $_GET['acao']=='editar'){
            $altura=$_GET['altura'];
            $peso=$_GET['peso'];
            $imc=$_GET['imc'];
            echo "<form action='op.php?op=editar&altura=$altura&peso=$peso&imc=$imc' method='POST'>";
            echo "<br>";

            echo "<span>Altura Informada: 
                </span>";
            echo "<input type='text' name='txtaltura' value='$altura'><br>";

            echo "<span>Peso Informado: </span>";
            echo "<input type='text' name='txtpeso' value='$peso'><br>";

            echo "<button type='submit' disabled>Calcular</button>";
            echo "<button type='submit'>Editar</button>";
        }else{
            $altura=$_GET['altura'];
            $peso=$_GET['peso'];
            echo "<form action='op.php?op=calcular&modo=editar'  method='POST'>";
            echo "<br>";

            echo "<span>Digite a altura:: 
                </span>";
            echo "<input type='text' name='txtaltura' value='$altura' ><br>";

            echo "<span>Digite o peso: </span>";
            echo "<input type='text' name='txtpeso' value='$peso'><br>";

            echo "<button type='submit'>Calcular</button>";
            echo "<button type='submit' disabled>Editar</button>";
    }}echo "</form>";
    ?>
    <table>
        <thead>
            <th>Id</th>
            <th>Altura</th>
            <th>Peso</th>
            <th>IMC</th>
        </thead>
        <tbody>
            <?php
                $pdo=novaConexao($banco="diogo_kawaguchi_rosa");
                $select = $pdo->query("SELECT * FROM imc");
                while($linha = $select->fetch(PDO::FETCH_ASSOC)){
                    echo "<tr>";
                    echo "<td>".$linha['id']."</td>";
                    echo "<td>".$linha['altura']."</td>";
                    echo "<td>".$linha['peso']."</td>";
                    echo "<td>".$linha['imc']."</td>";
                    echo "<td><a href='op.php?op=buscaid&id=".$linha['id']."'>Editar</a></td>";
                    echo "<td><a href='op.php?op=excluir&id=".$linha['id']."'>Excluir</a></td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
</body>
</html>