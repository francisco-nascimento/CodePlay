<?php 
	session_start();

	require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');

	$idAtividade = $_GET["idAtividade"];



	$problema = $_GET["idProb"];

		
		$sql = "INSERT INTO Problema_Atividade VALUES(?,?)";

		$stmt = $conexao->prepare($sql);
		$stmt->bindValue(1, $idAtividade);
		$stmt->bindValue(2, $problema);
		$stmt->execute();
	
	



	header("Location: /professor/listarProblemasAtividade.php?idAtividade=$idAtividade");


?>