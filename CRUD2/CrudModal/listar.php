<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="cadastrar.php">Cadastrar</a>
    <a href="listar.php">Listar</a>
    <a href="criar.php">Criar</a>
<table>
    <thead>
        <th>Id</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Excluir</th>
        <th>Editar</th>
    </thead>
    <tbody>
        <?php
        require_once('conexao.php');
            $pdo = novaConexao($banco="crud_modal_fatec");
            $select = $pdo->query("SELECT * FROM pessoas");
            while ($linha = $select->fetch(PDO::FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>".$linha['id']."</td>";
                echo "<td>".$linha['nome']."</td>";
                echo "<td>".$linha['email']."</td>";
                echo "<td><a href='editar.php?id=".$linha['id']."'>Editar</a></td>";
                echo "<td><a href='deletar.php?id=".$linha['id']."'>Deletar</a></td>";
                echo "</tr>";
            }
        ?>
    </tbody>
</table>

</body>
</html>