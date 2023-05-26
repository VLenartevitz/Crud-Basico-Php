<?php
require_once("config.php");
$pdo=novaConexao('crud_modal_fatec');

$id=$_GET['id'];
try{
    $delete=$pdo->prepare("DELETE FROM pessoas WHERE id = ?");
    $delete->bindValue(1,$id);
    $delete->execute();
    header('Location:listar.php');
}catch(PDOException $erro) {
    echo "Erro: " . $erro->getMessage();
}



?>