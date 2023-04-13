<?php
require_once("conexao.php");
    $conexao = novaConexao();    
    // Criar uma verificação se dentro do $_GET exite uma chave excluir. Se houver informação ele entrará na estrutura para executar a tarefa de exclusão de registro.
    if (isset($_GET['excluir'])){     
        
        //variavel criada para receber o parametro do id a ser excluido, evitando assim que possiveis ataques de comandos SQL validos sejam passados pela URL e executem de maneira errada dentro da função query(), a esse tipo de ataque damos o nome de SQL Injection.
        $excluirSQL = "DELETE FROM cadastros WHERE id = ?"; //É utilizado a interrogação no parametro do WHERE, pois será ele que informaremos através da URL.
        $stmt = $conexao->prepare($excluirSQL);  //O prepare, é uma função que não deixará parametros invalidos a serem executados junto com o item a ser excluído, esse tipo de ação é um dos mais comuns a serem utilizados como ataque a servidores web php, que é chamado de SQL Injection, isso ocorre se deixarmos a execução direta da Query.Com a utilização do Prepare seu código ficará mais seguro.     
        $stmt->bind_param("i", $_GET['excluir']); //Você deve criar uma variavel stendement $stmt, e utilizando o a função bind_param, onde você deverá informar um tipo de parametro que você quer passar (i = inteiro, s=string, d=decimal, b=binario), após a isso deve colocar $_GET['chaveExclusao'];       
        $stmt->execute(); //O execute vai servir para você saber se o processo foi executado ou não
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
        <?php //Verificar se variavel $registros existe (isset) e $registros não está vazio(!empety)
        if (isset($registros) && !empty($registros)) {
            //Percorre o Array $registros e mostra os valores em $registro
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