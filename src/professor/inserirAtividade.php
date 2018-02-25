<?php 
	session_start();

	require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');

<<<<<<< HEAD
	session_start();

	$idAtividade = $_GET["idAtividade"];
<<<<<<< HEAD

	

	$problema = $_GET["idProb"];

		$sql2 = "INSERT INTO Problema_Atividade(id_atividade, id_Problema) VALUES(?,?)";

		$stmt = $conexao->prepare($sql2);
		$stmt->bindValue(1, $idAtividade);
		$stmt->bindValue(2, $problema);
		
		$stmt->execute();

	
	
=======

	

	$problema = $_GET["idProb"];

		$sql2 = "INSERT INTO Problema_Atividade(id_atividade, id_Problema) VALUES(?,?)";

		$stmt = $conexao->prepare($sql2);
		$stmt->bindValue(1, $idAtividade);
		$stmt->bindValue(2, $problema);
		
		$stmt->execute();

	
	
=======
	

	$idAtividade = $_GET["idAtividade"];

	$problema = $_GET["idProb"];

	
	

	
	
		

		
		$sql = "INSERT INTO Problema_Atividade VALUES(?,?)";

		$stmt = $conexao->prepare($sql);
		$stmt->bindValue(1, $idAtividade);
		$stmt->bindValue(2, $problema);
		$stmt->execute();

		
>>>>>>> Wesley
>>>>>>> 278f2521d59d0cd2a5955ea54ab44e9259316153
	
	


<<<<<<< HEAD
	header("Location: /professor/listarProblemasAtividade.php?id="."$idAtividade");
=======
<<<<<<< HEAD
	header("Location: /professor/listarProblemasAtividade.php?id="."$idAtividade");
=======
	header("Location: /professor/listarProblemasAtividade.php?id=$idAtividade");
>>>>>>> Wesley
>>>>>>> 278f2521d59d0cd2a5955ea54ab44e9259316153
?>