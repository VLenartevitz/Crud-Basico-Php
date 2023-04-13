<?php 
    $sql = "SELECT * FROM cadastros";

    require("conexao.php");
            
    $conexao = novaConexao();
        
    $resultado = $conexao->query($sql);

    $registros = [];

    if ($resultado->num_rows > 0) { 
        while ($row = $resultado->fetch_assoc()) {
            $registros[] = $row; 
        }
    } else if ($conexao->error) {
        echo ":( Erro: " . $conexao->error;
    }

    print_r($registros);

    $conexao->close();

?>