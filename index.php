<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="css/index.css" media="screen" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adwa</title>
</head>

<body class="wrapper">
    <div class="container">
        <div class="posiForm">
            <form method="POST" class="Form">
                <label class="label">Coloque o seu nome:</label>
                <input type="text" name="nome" class="input" /><br>

                <label class="label">Coloque a sua Data de Nascimento:</label>
                <input type="date" name="nascimento" class="input" /><br>

                <label class="label">Coloque a sua altura:</label>
                <input type="text" name="altura" class="input" /><br>

                <label class="label">Coloque o seu Peso:</label>
                <input type="text" name="peso" class="input" /><br>

                <div class="posiButtons">
                    <input type="submit" placeholder="salvar" value="salvar" />
                    <input type="submit" placeholder="delete" value="deletar">
                    <input type="submit" placeholder="renomear" value="renomear" />
                    <input type="submit" placeholder="consultar" value="consultar" />
                </div>
            </form>
        </div>
            <?php
            require("php.php");
            ?>
    </div>
</body>

</html>