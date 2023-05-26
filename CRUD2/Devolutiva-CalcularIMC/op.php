<?php
function criarTabela(){ 
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
}

// function  consultarTabela(){
require_once('conexao.php');

if(isset($_GET['op'])and $_GET['op']=='calcular'){
    if(isset($_POST['txtaltura'])and isset($_POST['txtpeso'])){
        $altura=$_POST['txtaltura'];
        $peso=$_POST['txtpeso'];
        $imc = round($peso/($altura * $altura),2);
        $_POST['imc']=$imc;
    }
}

if(isset($_GET['op'])and $_GET['op']=='inserir'){
    $altura = $_GET['altura'];
    $peso = $_GET['peso'];
    $imc = $_GET['imc'];
    $pdo=novaConexao('diogo_Kawaguchi_Rosa');
    $insert=$pdo->prepare("INSERT INTO imc (altura, peso, imc) values (?,?,?)");
    $insert ->bindValue(1, $altura);
    $insert ->bindValue(2, $peso);
    $insert ->bindValue(3, $imc);
    $insert->execute();
    header("Location:index.php?acao=listar");
}else if(isset($_GET['op'])and $_GET['op']=='buscaid'){
    $id=$_GET['id'];
    $pdo=novaConexao('diogo_Kawaguchi_Rosa');
    $busca=$pdo->prepare("SELECT * FROM imc WHERE id = ?");
    $busca->bindValue(1,$id);
    $busca->execute();
    $linha = $busca->fetch();
    $peso = $linha['peso'];
    $altura = $linha['altura'];
    $imc = $linha['imc'];
    header("Location:index.php?display=editar&altura=$altura&peso=$peso&imc=$imc&id=$id");
}else if(isset($_GET['op'])and $_GET['op']=='editar'){
    $id=$_GET['id'];
    $pdo=novaConexao('diogo_Kawaguchi_Rosa');
    $update= $pdo->prepare("UPDATE imc SET altura=?, peso=?, imc=? WHERE id=?");
    $update->bindValue(1,$altura);
    $update->bindValue(2,$peso);
    $update->bindValue(3,$imc);
    $update->bindValue(4,$id);
    $update->execute();
    header("Location:index.php?acao=listar");
}else if(isset($_GET['op'])and $_GET['op']=='excluir'){
    $id=$_GET['id'];
    $pdo=novaConexao('diogo_Kawaguchi_Rosa');
    $delete = $pdo->prepare("DELETE FROM imc WHERE id=?");
    $delete->bindValue(1,$id);
    $delete->execute();
    header("Location:index.php?acao=listar");
}else{
    if($_GET['modo']='inserir'){
        header("Location:index.php?display=inserir&acao=inserir&altura=".$altura."&peso=".$peso."&imc=".$imc);
    }else if($_GET['modo']='editar'){
        header("Location:index.php?display=editar&acao=editar&altura=".$altura."&peso=".$peso."&imc=".$imc);
    }
    
}
// }
?>