<?php 
require_once("conexao.php");

$pdo=novaConexao("crud_modal_fatec");

$id=$_GET['id'];
$nome=$_POST['txtnome'];
$email=$_POST['txtemail'];

try{
    $insert = $pdo->prepare("UPDATE pessoas SET nome= ?, email=? WHERE id=?");
    $insert->bindValue(1,$nome);
    $insert->bindValue(2,$email);
    $insert->bindValue(3,$id);

    $resultado = $insert->execute();
    header("Location:listar.php");

}catch(PDOException $erro) {
    echo "Erro: " . $erro->getMessage();
}


?>