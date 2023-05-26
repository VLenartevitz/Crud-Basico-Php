<?php 
 require_once("conexao.php");
 $pdo=novaConexao("crud_modal_fatec");
 $id=$_GET['id'];
 try{
    $consulta = $pdo->query("SELECT * FROM pessoas WHERE id = $id");
    $registro=$consulta->fetch();
    $nome=$registro['nome'];
    $email=$registro['email'];
 }catch(PDOException $erro) {
    echo "Erro: " . $erro->getMessage();
}
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="index.php">Cadastrar</a>
    <a href="listar.php">Listar</a>
    <form method="POST" action="salvar.php?id=<?php echo $id?>">
        <label>Id: <?php echo $id?></label><br>
        <label>Nome:</label>
        <input type="text" name="txtnome" value="<?php echo $nome?>">
        <br>
        <label>Email:</label>
        <input type="text" name="txtemail"value="<?php echo $email?>" >
        <br>
        <button type='submit'>Editar</button>
    </form>
</body>
</html>