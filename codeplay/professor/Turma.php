<?php

	require ('../conexao.php');

	session_start();

	$id = $_SESSION["id"];

	$sql = "INSERT INTO Turma(desc_Turma, id_Professor) VALUES (?,?)";

	try {

		$stmt = $conexao->prepare("$sql");
		$stmt->bindValue(1, ' Nome da turma ');
		$stmt->bindValue(2, $id);
		$stmt->execute();

		header("Location: /codeplay/professor/criarTurma.php");
		
	} catch (Exception $e) {
		
	}

	



?>