<?php 
function novaConexao($banco=null){
    $servidor="127.0.0.1:3306";
    $user="root";
    $pass="";
    
    try{
        // Objeto para classe PDO(PHP Data Objects) de acesso ao banco
        $pdo = new PDO("mysql:host=$servidor;dbname=$banco",$user,$pass);
        return $pdo;
    }catch(PDOException $erro){
        die("ERRO: ".$erro->getMessage());
    }
}
?>