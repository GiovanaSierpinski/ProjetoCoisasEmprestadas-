<?php

	$login = $_POST["login"];
	$senha = $_POST["senha"];

	
		if(isset($_GET['erro'])){
			echo '<p style="text-align:center;color:red">Usuário e/ou senha incorreto(s).</p>';
		}
	
		if(isset($_GET['autentica'])){
			echo '<p style="text-align:center;color:red">Você não tem permissão de acesso.</p>';
		}
	
	//Conecta com a base de dados
	include "includes/conecta.php";
	
	$sql = "SELECT * FROM usuarios WHERE email = '$login' AND senha = '$senha'";
	$res = mysqli_query($conn, $sql);
	

	$qtdeRegistros = mysqli_num_rows($res);
	

	if($qtdeRegistros > 0){
		

		session_start();
		

		$row = mysqli_fetch_assoc($res);
		

		$_SESSION['id'] = $row['id'];
		$_SESSION['nome'] = $row['nome'];
		
		header("Location: home.php?id=".$row['id']."");
	}
	else{
		header("Location: cadastre-se.php");
	}

?>