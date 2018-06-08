<?php 
	session_start();
	require ('../conexao.php');

	$descAtividade = $_GET["descAtividade"];

	$idAtividade = $_GET["idAtividade"];

	$sql = "UPDATE Atividade SET desc_Atividade = ? WHERE id = ?";

		$stmt = $conexao->prepare($sql);
		$stmt->bindValue(1, $descAtividade);
		$stmt->bindValue(2, $idAtividade);
		$stmt->execute();
		
	header("Location: /codeplay/professor/listarProblemasAtividade.php?idAtividade="."$idAtividade");
?>