<?php 

	require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');

	session_start();

	$id = $_POST["id"];

	$desc_Turma = $_POST["desc_Turma"];

	

	

	
	
		$sql = "UPDATE Turma SET desc_Turma = ? WHERE id = ?";

		$stmt = $conexao->prepare($sql);
		$stmt->bindValue(1, $desc_Turma);
		$stmt->bindValue(2, $id);
		$stmt->execute();

	
	
	
	


	header("Location: /professor/criarTurma.php");
?>