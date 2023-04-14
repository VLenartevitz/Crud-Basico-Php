<?php
require_once("conexao.php");
    $conexao = novaConexao();    
    if (isset($_GET['excluir'])){     
        
        $excluirSQL = "DELETE FROM cadastros WHERE id = ?"; 
        $stmt = $conexao->prepare($excluirSQL);   
        $stmt->bind_param("i", $_GET['excluir']);        
        $stmt->execute(); 
    }   

    $sql = "SELECT * FROM cadastros";
    $resultado = $conexao->query($sql);

    if ($resultado->num_rows > 0) {
        while ($row = $resultado->fetch_assoc()) {
            $registros[] = $row;
        }
    } elseif ($conexao->error) {
        echo ":( Erro: " . $conexao->error;
    }
    $conexao->close();
    ?>

<table class="table table-hover table-striped table-bordered">
    <thead>
         <th>ID</th>
         <th>Nome</th>
         <th>Email</th>
        <th>Nascimento</th>
        <th>Ações</th>
    </thead>    
    <tbody>
        <?php 
        if (isset($registros) && !empty($registros)) {
            
            foreach ($registros as $registro): 
            ?>
                <tr>
                    <td><?php echo $registro['id'] ?></td>
                    <td><?php echo $registro['nome'] ?></td>
                    <td><?php echo $registro['email'] ?></td>
                    <td>
                        <?php echo date('d/m/Y', strtotime($registro['nascimento'])) ?>
                    </td>
                    <td>                        
                        <a href="08_excluir_dados%2302.php?excluir=<?= $registro['id'] ?>" class="btn btn-danger"> Excluir </a>
                    </td>
                </tr>
             
        <?php endforeach ;
        }
        ?>
            
             
    </tbody>