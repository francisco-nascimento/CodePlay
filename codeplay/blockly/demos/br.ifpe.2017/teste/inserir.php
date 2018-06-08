<?php

session_start();

	$usuario = $_POST['usuario'];
	$senha = $_POST['senha']; 
	require('conexao.php');

	$query = "INSERT INTO usuario VALUES(:nome, :senha)";

	$prep = $conexao->prepare($query);
	
	$prep->execute(array(

		':nome' => $usuario,
		':senha' => $senha
	));
	if ($prep == true) {
		header("Location: login.php");
	}

?>