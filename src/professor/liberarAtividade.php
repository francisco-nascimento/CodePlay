<?php

	require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');
	$idTurma = $_GET["idturma"];
	$idAtv = $_GET["idAtv"];

	$sql = "INSERT INTO Atividade_Turma(id_Atidividade, id_Turma) VALUES(?,?);";

	$stmt = $conexao->prepare($sql);
	$stmt->bindValue(1, $idAtv);
	$stmt->bindValue(2, $idTurma);
	$stmt->execute();


	header("Location: /professor/turmas.php");

?>