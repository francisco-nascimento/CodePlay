<?php 

	require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');

	session_start();

	$idAtividade = $_POST["idAtividade"];

	$descAtividade = $_POST["descAtividade"];

	$problemas = $_POST["idsProb"];

	$marcadas = count($_POST['idsProb']);
	

	
	
		$sql = "UPDATE Atividade SET desc_Atividade = ? WHERE id = ?";

		$stmt = $conexao->prepare($sql);
		$stmt->bindValue(1, $descAtividade);
		$stmt->bindValue(2, $idAtividade);
		$stmt->execute();

	if ($marcadas > 0)	require ($_SERVER["DOCUMENT_ROOT"]."/professor/insercao/".$marcadas.".php");
	
	
	


	header("Location: /professor/listarAtividades.php");
?>