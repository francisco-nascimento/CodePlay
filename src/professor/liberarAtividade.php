<?php

	require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');
	$idTurma = $_GET["idturma"];
	$idAtv = $_GET["idAtv"];
	$data = $_GET["dataLimite"];

	$sql = "INSERT INTO Atividade_Turma(id_Atividade, id_Turma, data_limite) VALUES(?,?,?);";

	$stmt = $conexao->prepare($sql);
	$stmt->bindValue(1, $idAtv);
	$stmt->bindValue(2, $idTurma);
	$stmt->bindValue(3, $data);
	$stmt->execute();


	header("Location: /professor/turmas.php");

?>