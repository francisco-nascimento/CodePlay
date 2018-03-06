<?php 
	session_start();

	require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');

	$idTurma = $_GET["idTurma"];

	$aluno = $_GET["idAluno"];
	
		$sql = "INSERT INTO Aluno_Turma VALUES(?,?)";

		$stmt = $conexao->prepare($sql);
		$stmt->bindValue(1, $aluno);
		$stmt->bindValue(2, $idTurma);
		$stmt->execute();

	header("Location: /professor/listarAlunosTurma.php?idturma=$idTurma");
?>