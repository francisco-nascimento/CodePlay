<?php

	require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');

	$sql = "INSERT INTO Atividade(desc_Atividade) VALUES (?)";

	try {

		$stmt = $conexao->prepare("$sql");
		$stmt->bindValue(1, 'Nova Atividade');
		$stmt->execute();

		header("Location: /professor/listarAtividades.php");
		
	} catch (Exception $e) {
		
	}

	



?>