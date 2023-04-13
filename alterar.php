<?php 
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




     
     //Inserir o require_once("conxeao") e o $conexao=novaConexao() logo no inicio de nosso bloco php.
     require_once("conexao.php");
     $conexao = novaConexao();
 
     //vamos criar um formulario antes de nosso formulário principal para que possamos passar a chave código que conterá o id do registro, para que possamos identificar o registro a ser alterado, que será passado por um método $_GET.
     if (isset($_GET['codigo'])) {
 
         //Vamos realizar o select de todos os dados utilizando um prepare()
         $sql = "SELECT * FROM cadastros WHERE id = ? ";
 
         //Criando o prepare() para a consulta
         $consulta = $conexao->prepare($sql);
         //Fazendo bind para a consulta, que será do tipo inteiro "i", vindo a informação do $_GET['codigo'].
         $consulta->bind_param("i", $_GET['codigo']);
 
         //Executar a $consulta e verificar se o resultado dela for verdadeiro, pegar o resultado do execute da $consulta.
         if ($consulta->execute()) {
             $resultado = $consulta->get_result(); //função get_result(), pega o resultado obtido pela execução da $consulta.
     
             //Verificar o resultado obtido através do num_rows se o resultado for maior que zero vamos gerar um ARRAY Associativo.
             if ($resultado->num_rows > 0) {
 
                 $dados = $resultado->fetch_assoc();
                 
                 //Como vamos receber a data do banco de dados temos que tratar novamente a data, para apresentar no formulário.
                 if ($dados['nascimento']) {
                     $dt = new DateTime($dados['nascimento']);
                     $dados['nascimento'] = $dt->format('d/m/Y');
                 }
 
                  //Como vamos receber o salario do banco de dados temos que tratar novamente o salario, para apresentar no formulário.
                  if ($dados['salario']) {
                     $dados['salario']= str_replace(".",",",$dados['salario']); //O str_replace serve para substituir o ponto da casa decimal por virgula dentro da informação vinda da variavel $dados.
                     
                 }
             }
         }
         //Proximo passo é criar um formulário HTML onde o usuario possa inserir qual usuario deseja alterar.
     }
 
     
     if (count($_POST) > 0) {
 
         $dados = $_POST;
         $erros = [];
 
         if (trim($dados['nome']) === "") {
             $erros['nome'] = "Nome é obrigatório";
         }
 
         if (isset($dados['nascimento'])) {
             $data = DateTime::createFromFormat('d/m/Y', $dados['nascimento']);
             if (!$data) {
                 $erros['nascimento'] = "A data de nascimento deverá estar no formato dd/mm/aaaa";
             }
         }
 
         if (!filter_var($dados['email'], FILTER_VALIDATE_EMAIL)) {
             $erros['email'] = "Email inválido";
         }
 
         if (!filter_var($dados['site'], FILTER_VALIDATE_URL)) {
             $erros['site'] = "URL Inválido!, deve ter o padrão http://www.dominio.com.br";
         }
 
         $filhoConfig = ['options' => ['min_range' => 0, 'max_range' => '20']];
 
         if (!filter_var($dados['filhos'], FILTER_VALIDATE_INT, $filhoConfig) && $dados['filhos'] != 0) {
 
             $erros['filhos'] = "Quantidade de filhos incorreta, valores 0-20";
         }
 
         $salarioConfig = ['options' => ['decimal' => ',']];
         if (!filter_var($dados['salario'], FILTER_VALIDATE_FLOAT, $salarioConfig)) {
             $erros['salario'] = "Valor de salário invalido! utilize a virgula (,)para separar a casa decimal";
         }
     
 
 
         if (count($erros) == 0) {
 
            //Vamos alterar a sintaxe de inserir para alterar agora
             $sql = "UPDATE cadastros SET nome = ?, nascimento = ?, email = ?, site = ?, filhos = ?, salario =? WHERE id = ?";
 
            
             $consultar = $conexao->prepare($sql);
 
             $params = [
                 $dados['nome'],
                 $data ? $data->format('Y-m-d') : null,
                 $dados['email'],
                 $dados['site'],
                 $dados['filhos'],
                 $dados['salario'] ? str_replace(",",".",$dados['salario']):null,
                 //devemos colocar a chave id tambem
                 $dados['id'],
             ];
         
             //Como foi inserido mais uma chave no $params, temos que colocar o tipo de dado da chave inserida no $param que em nosso caso trata-se de um inteiro, sendo assim devemos colocar i no final dos tipos de dados no bind_param
             $consultar->bind_param("ssssidi", ...$params);
 
 
 
             if ($consultar->execute()) {
                 unset($dados);
             }
         }
     }
     
?>