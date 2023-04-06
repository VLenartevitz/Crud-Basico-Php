<?php
//Vamos criar uma função de para conexão com banco de dados, onde ela irá conectar automaticamente a um banco de dados padrão que iremos apontar dentro de um parametro da função através de uma variavel banco.

function novaConexao($banco='crud_fatec'){
    $servidor="127.0.0.1:3306"; //Devemos informa o ip de conexão ao servidor juntamente com a porta de conexão que sendo usada, lembrando que a padrão é a porta 3306.
    $usuario="root"; //Informar o usuario de conexão ao MySQL que foi configurado.
    $senha=""; //Informar a senha padrão do usuario padrão da conexão MySQL

    //Vamos instancia uma nova instancia para o MySQLi, e será armazenada em uma variavel.Devemos inserir no momento da criação da instancia como parametros as variaveis de $servidor, $usuario, $senha e por ultimo $servidor.

    $conexao = new mysqli($servidor,$usuario,$senha,$banco);

    //Vamos verificar se a conexão foi realizado com sucesso ou não!

    if($conexao -> connect_error)
    {
      //Se vedadeiro significa que a conexão não foi estabelicida com sucesso e vamos mostrar uma mensagem ao usuário.
        /*Podemos tratar 2 duas formas esse erro, a primeira que irei te mostrar não é a mais indicada para usarmos em uma aplicação comercial de desenvolvemos, pois ela ira matar todo o processo e isso não é o que queremos, mas vou lhe mostrar assim mesmo. Iremos utilizar uma função chamada die().
        die('Erro: '.$conexao->connect_error);
        
        Porem podemos utilizar uma outra forma mesmo bruta de finalização de processo para onde informaremos ao usuario o motivo do erro e orientamos o que ele deverá fazer, mas isso iremos ver mais a frente. Neste momento vamos usar a função die() mesmo.*/

        die('Erro: '.$conexao->connect_error);
    }
    return $conexao; //Ao chegar neste ponto significa que a conexão deu tudo certo.

    //Agora vamos criar um novo arquivo php que será responsável em criar um banco de dados para nós, que será chamado de criar_banco.php

}
?>