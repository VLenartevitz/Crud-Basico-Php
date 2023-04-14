    <!-- <?php
    if (isset($_POST['nome'])){
        $nome = $_POST['nome'];
        $idade = date('Y') - $_POST['nascimento'];
        $altura = $_POST['altura'];
        $peso = $_POST['peso'];
        $imc = $peso /($altura * $altura );
        $classImc;
        
        if($imc>40)
        {$classImc = "Obesidade Grave";}
        elseif($imc >= 30 && $imc < 40 ){
            $classImc = "Obesidade";
        }elseif ( $imc >= 25 && $imc < 30){
            $classImc = "Sobrepeso";
        }elseif ( $imc >= 18.5 && $imc < 25){
            $classImc = "Normal";
        }elseif ($imc < 18.5){
            $classImc = "Magreza";
        }

        echo "Olá! $nome você tem 
        $idade anos, seu IMC é $imc , e tratase de $classImc!";
    }
    
    require("conexao.php");

    $conexao = novaConexao(null); 

    $sql='CREATE DATABASE IF NOT EXISTS crud_imc';

    $resultado = $conexao->query($sql); 

    if($resultado){
        echo "Banco de Dados CRIADO com SUCESSO :)";
    }else{
        echo ":( Erro: ".$conexao->error;
    }


    $sql="CREATE TABLE IF NOT Exists cadastros(
        id int(6) auto_increment primary key,
        nome varchar(50) not null,
        nascimento int(3),
        altura double,
        peso double
    )";

    $conexao = novaConexao();

    $resultado = $conexao->query($sql);

    if($resultado){
        echo "Tabela CRIADA com SUCESSO :)";
    }else{
        echo ":( Erro: ".$conexao->error;
    }



    $erros = [];
    $dados = $_POST;
         
         $sql="INSERT INTO cadastros (nome, nascimento, altura, peso) values (?, ?, ?, ?)";

         $insert = $conexao->prepare($sql);

         $params = [
             $dados['nome'],
             $dados['nascimento'],
             $dados['altura'],
             $dados['peso'],
            
         ];
         
         $insert->bind_param("sidd", ...$params);
         
         if ($insert->execute()){
             unset($dados); 


         }

         $sql = "SELECT * FROM cadastros";
      
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

   
 
 ?> -->
