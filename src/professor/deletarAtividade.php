<?php

	require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');
	$idAtividade = $_GET["idAtividade"];

	$sql = "DELETE FROM Atividade_Turma WHERE id_Atidivade = ?;";

	$stmt = $conexao->prepare($sql);
	$stmt->bindValue(1, $idAtividade);
	$stmt->execute();

	$sql = "DELETE FROM Problema_Atividade WHERE id_atividade = ?";

	$stmt = $conexao->prepare($sql);
	$stmt->bindValue(1, $idAtividade);
	$stmt->execute();


	$sql2 = "DELETE FROM Atividade WHERE id = ?";
	$stmt2 = $conexao->prepare($sql2);
	$stmt2->bindValue(1, $idAtividade);
	$stmt2->execute();

	header("Location: /professor/listarAtividades.php");

?>