<?php

	require ('../conexao.php');
	$idProblema = $_GET["idProb"];

	$sql = "DELETE FROM Gabarito WHERE id_Problema = ?";

	$stmt = $conexao->prepare($sql);
	$stmt->bindValue(1, $idProblema);
	$stmt->execute();

	$sql = "DELETE FROM Problema_Atividade WHERE id_problema = ?";

	$stmt = $conexao->prepare($sql);
	$stmt->bindValue(1, $idProblema);
	$stmt->execute();


	$sql2 = "DELETE FROM Problema WHERE id = ?";
	$stmt2 = $conexao->prepare($sql2);
	$stmt2->bindValue(1, $idProblema);
	$stmt2->execute();

	header("Location: /codeplay/professor/listarProblemas.php");

?>