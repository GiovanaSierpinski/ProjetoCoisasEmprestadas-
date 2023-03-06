<?php

    include "includes/topo.php";
	include "includes/conecta.php";

    $id = "";
	$nome = "";
	$email = "";
	$celular = "";
    $senha = "";

	if(isset($_GET['id'])){
        ?>
        <header>
        <h1>Cadastrar usuário</h1>
        </header>
         <section>
        <?php
        include "includes/menu.php";

		//Valor enviado via GET
		$id = $_GET['id'];
		$sql = "SELECT * FROM usuarios WHERE id = $id";

		$res = mysqli_query($conn, $sql);

		$row = mysqli_fetch_assoc($res);

        $id = $row['id'];
        $nome = $row['nome'];
        $email = $row['email'];
        $celular = $row['celular'];
        $senha = $row['senha'];
	} else {
    
        ?>
        <header>
        <h1>Cadastrar usuário</h1>
        </header>
        <section>
        <?php
    }
?>
            <article> 
                <form action="recebe-usuario.php" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                    <label for="nome">Nome completo</label><input type="text" name="nome" value="<?php echo $nome; ?>"/><br/>
                    <label for="email">E-mail</label> <input type="email" name="email" value="<?php echo $email; ?>" /><br>
                    <label for="celular">Celular</label> <input type="text" name="celular" value="<?php echo $celular; ?>" /><br/>
                    <label for="senha">Criar senha</label> <input type="password" name="senha" value="<?php echo $senha;?>"  /><br/>
                    <label for="senha">Confirmar senha</label> <input type="password" name="senha" value="<?php echo $senha;?>" /><br/>
                    <input type="submit" name="enviar"/><br/><br/>  
                    <a href="index.php">Voltar</a>
                </form>
            </article>
        </section>
 <?php
    include "includes/rodape.php";
?>       
