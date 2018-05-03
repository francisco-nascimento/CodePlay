<?php

	require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');
	$idTurma = $_GET["idturma"];

	$sql = "DELETE FROM Atividade_Turma WHERE id_Turma = ?;";

	$stmt = $conexao->prepare($sql);
	$stmt->bindValue(1, $idTurma);
	$stmt->execute();

	$sql = "DELETE FROM Aluno_Turma WHERE id_turma = ?";

	$stmt = $conexao->prepare($sql);
	$stmt->bindValue(1, $idTurma);
	$stmt->execute();


	$sql2 = "DELETE FROM Turma WHERE id = ?";
	$stmt2 = $conexao->prepare($sql2);
	$stmt2->bindValue(1, $idTurma);
	$stmt2->execute();

	header("Location: /professor/turmas.php");

?>