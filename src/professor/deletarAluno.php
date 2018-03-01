<?php

	require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');
	$aluno = $_GET["idAluno"];

	$sql = "DELETE FROM Aluno_Turma WHERE id_aluno = ?;";

	$stmt = $conexao->prepare($sql);
	$stmt->bindValue(1, $aluno);
	$stmt->execute();

	$sql = "DELETE FROM Resposta_Aluno WHERE id_Aluno = ?";

	$stmt = $conexao->prepare($sql);
	$stmt->bindValue(1, $aluno);
	$stmt->execute();


	$sql2 = "DELETE FROM Aluno WHERE id = ?";
	$stmt2 = $conexao->prepare($sql2);
	$stmt2->bindValue(1, $aluno);
	$stmt2->execute();

	header("Location: /professor/listarAlunos.php");

?>