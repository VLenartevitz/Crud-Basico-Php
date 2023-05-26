<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="cadastrar.php">Cadastrar</a>
    <a href="listar.php">Listar</a>
    <form method="POST" action="./adicionar.php">
        <label>Nome:</label>
        <input type="text" name="txtnome">
        <br>
        <label>Email:</label>
        <input type="text" name="txtemail">
        <br>
        <button type='submit' action="./adicionar.php">Cadastrar</button>
    </form>
</body>
</html>