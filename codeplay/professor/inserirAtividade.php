<?php 
	session_start();

	require ('../conexao.php');

	$idAtividade = $_GET["idAtividade"];



	$sql = "select count(*) as probs from Problema_Atividade where id_atividade = ?";

	$problemas;

	$stmt = $conexao->prepare($sql);
	$stmt->bindValue(1, $idAtividade);
	$stmt->execute();

	foreach ($stmt as $key) {
		$problemas = $key["probs"];
	}

	if ($problemas == 10) {
		header("Location: /codeplay/professor/listarProblemasAtividade.php?id=".$idAtividade);
	}


	$problema = $_GET["idProb"];

		
		$sql = "INSERT INTO Problema_Atividade VALUES(?,?)";

		$stmt = $conexao->prepare($sql);
		$stmt->bindValue(1, $idAtividade);
		$stmt->bindValue(2, $problema);
		$stmt->execute();
	
	



	header("Location: /codeplay/professor/listarProblemasAtividade.php?idAtividade=$idAtividade");


?>