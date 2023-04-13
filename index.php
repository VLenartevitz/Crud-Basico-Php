<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/index.css" />
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"> -->
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
                <input type="number" name="altura" class="input" /><br>

                <label class="label">Coloque o seu Peso:</label>
                <input type="number" name="peso" class="input" /><br>

                <div class="posiButtons">
                    <input type="submit" value="Salvar"  class="buttonS" /> 
                    <input type="submit" value="Deletar" class="buttonD">
                    <input type="submit" value="Renomear" class="buttonR"/>
                    <input type="button" value="Consultar" class="buttonC" onclick="location.href='consultar.php';"/> 
                </div>
            </form>
        </div>
            <?php
            require("php.php");
            ?>
    </div>
</body>

</html>