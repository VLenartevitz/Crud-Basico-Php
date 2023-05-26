<form action='op.php?op=inserir&nome=$nome&email=$email' method='POST'>
        <br>

         <span>Nome: </span>
        <input type='text' name='txtnome' value='$nome'><br>

        <span>Email Informado: </span>
        <input type='text' name='txtemail' value='$email'><br>
         <button type='submit'>Inserir</button>