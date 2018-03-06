<?php

	require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');
	$idTurma = $_GET["idturma"];

	$sql = "INSERT INTO Atividade_Turma VALUES(?,?,?);";

	$stmt = $conexao->prepare($sql);
	$stmt->bindValue(1, $idTurma);
	$stmt->execute();


	header("Location: /professor/turmas.php");

?>