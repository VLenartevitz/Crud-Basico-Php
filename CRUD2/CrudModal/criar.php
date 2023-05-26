<?php 
    require_once("conexao.php");
$pdo = novaConexao($banco ="crud_modal_fatec");
$sql = "CREATE DATABASE IF NOT EXISTS crud_modal_fatec";
$conn = novaConexao();
$conn->query($sql);
$conn = null;

$sql = "CREATE TABLE IF NOT EXISTS pessoas (
    id INT AUTO_INCREMENT,
    nome VARCHAR(255),
    email VARCHAR(255)
)";
?>