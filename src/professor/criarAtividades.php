<?php

	require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');

	session_start();

	$id = $_SESSION["id"];

	$sql = "INSERT INTO Atividade(desc_Atividade, id_Professor) VALUES (?,?)";

	try {

		$stmt = $conexao->prepare("$sql");
		$stmt->bindValue(1, 'Nova Atividade');
		$stmt->bindValue(2, $id);
		$stmt->execute();

		header("Location: /professor/listarAtividades.php");
		
	} catch (Exception $e) {
		
	}

	



?>