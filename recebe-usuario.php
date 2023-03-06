<?php
    include "includes/conecta.php";

    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $celular = $_POST['celular'];
    $senha = $_POST['senha'];


    $sql = "INSERT INTO 
            usuarios (nome, email, celular, senha)
            VALUES
            ('$nome', '$email', '$celular', '$senha')";
     
    $res = mysqli_query($conn, $sql);

    if($res) {
        $email = $_POST["email"];
	    $senha = $_POST["senha"];

		if(isset($_GET['erro'])){
			echo '<p style="text-align:center;color:red">Usuário ou senha incorreto</p>';
		}
	
		if(isset($_GET['autentica'])){
			echo '<p style="text-align:center;color:red">Você não tem permissão para acessar</p>';
		}

        include "includes/conecta.php";
        
        $sql = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$senha'";
        $res = mysqli_query($conn, $sql);
        
  
        $qtdeRegistros = mysqli_num_rows($res);
        
        //Encontrou login e senha compatíveis
        if($qtdeRegistros > 0){
 
            session_start();

            $row = mysqli_fetch_assoc($res);
            
    
            $_SESSION['id'] = $row['id'];
            $_SESSION['nome'] = $row['nome'];
            
            header("Location: home.php?id=".$row['id']."");
        } else {
            echo("Erro ao inserir!");
        }
    }
?>