<?php 
	session_start();
	require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');

	

	$idAtividade = $_GET["idAtividade"];

	$sql = "DELETE FROM Problema_Atividade WHERE id_atividade = ?";

		$stmt = $conexao->prepare($sql);
		$stmt->bindValue(1, $idAtividade);
		$stmt->execute();


	$sql = "DELETE FROM Atividade WHERE id = ?";

		$stmt = $conexao->prepare($sql);
		$stmt->bindValue(1, $idAtividade);
		$stmt->execute();
		
	header("Location: /professor/listarAtividades.php");
?>