<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/index.css" media="screen" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exer CRUD php</title>
</head>
<body class="wrapper">
    <div class="posiForm">
        <form method="POST" class="Form">
            <label class="label">Coloque o seu nome:</label>
            <input type="text" name="nome" class="input"/><br>

            <label class="label">Coloque a sua Data de Nascimento:</label>
            <input type="date" name="nascimento" class="input"/><br>

            <label class="label">Coloque a sua altura:</label>
            <input type="text" name="altura" class="input"/><br>

            <label class="label">Coloque o seu Peso:</label>
            <input type="text"  name="peso" class="input"/><br>

            <div class="posiButtons">
            <input type="submit" value="Salvar" class="buttons" />
            <input type="submit" value="Deletar" class="buttons"/>
            <input type="submit" value="Renomear" class="buttons"/>
            <input type="submit" value="Consultar" class="buttons"/>
            </div>
        </form>
    </div>

    <?php
    if (isset($_POST['nome'])){
        $nome = $_POST['nome'];
        $idade = date('Y') -$_POST['nascimento'];
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




    ?>
</body>
</html>