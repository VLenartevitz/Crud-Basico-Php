<?php 
require_once("conexao.php");

$pdo=novaConexao("crud_modal_fatec");

$nome=$_POST['txtnome'];
$email=$_POST['txtemail'];

try{
    $insert = $pdo->prepare("INSERT INTO pessoas (nome, email) VALUES (?,?)");
    $insert->bindValue(1,$nome);
    $insert->bindValue(2,$email);

    $resultado = $insert->execute();
    header("Location:listar.php");
}catch(PDOException $erro) {
    echo "Erro: " . $erro->getMessage();
}


?>