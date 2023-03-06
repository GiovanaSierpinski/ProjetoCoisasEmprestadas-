<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="style.css" rel="stylesheet"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
    </head>
    <body>
        <header>
            <h1>Coisas emprestadas</h1>
        </header>

        <div id="img-box">
            <img src="imgemprestada.png"/>
        </div>
        
        <div>
            <form action="login.php" method="post">
            <label for="email">Login</label><input type="text" name="login"/><br/>
            <label for="senha">Senha</label><input type="password" name="senha"/><br/>
            <input type="submit" name="enviar"/><br/>   
            </form>
            <a href="cadastre-se.php" id="cadastrar">Ainda não tem uma conta? Cadastre-se!</a>
        </div>
 <?php       
        include "includes/rodape.php";
?>

</html>
