<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/index.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Basico</title>
</head>
<body class="wrapper">
        <header>
            <h1>Formulario para calcular IMC</h1>
        </header>
    <div class="container">
        <div class="posiForm">  
            <form method="POST" class="Form">

                <label class="label">Coloque o seu nome:</label>
                <input type="text" name="nome" class="input" /><br>

                <label class="label">Coloque a seu Ano de Nascimento:</label>
                <input type="text" name="nascimento" class="input" /><br>

                <label class="label">Coloque a sua altura:</label>
                <input type="text" name="altura" class="input" /><br>

                <label class="label">Coloque o seu Peso:</label>
                <input type="text" name="peso" class="input" /><br>

                <div class="posiButtons">
                    <input type="submit" value="Salvar"  class="buttonS" /> 
                    <input type="button" value="Consultar" class="buttonC" onclick="location.href='consultar.php';"/> 
                </div>
            </form>

        </div>
            <?php
            require("salvar.php");
            ?>
    </div>
</body>

</html>