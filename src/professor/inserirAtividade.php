<?php 
	session_start();

	require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');

	

	$idAtividade = $_GET["idAtividade"];

	$problema = $_GET["idProb"];

	$sql = "select count(*) as probs from Problema_Atividade where id_atividade = ?";

	$problemas;

	$stmt = $conexao->prepare($sql);
	$stmt->bindValue(1, $idAtividade);
	$stmt->execute();

	foreach ($stmt as $key) {
		$problemas = $key["probs"];
	}

	if ($problemas == 10) {
		header("Location: /professor/listarProblemasAtividade.php?id=".$idAtividade);
	}

	
	

	
	
		

		
		$sql = "INSERT INTO Problema_Atividade VALUES(?,?)";

		$stmt = $conexao->prepare($sql);
		$stmt->bindValue(1, $idAtividade);
		$stmt->bindValue(2, $problema);
		$stmt->execute();

		
	
	


	header("Location: /professor/listarProblemasAtividade.php?id=$idAtividade");
?>