<?php

	require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');

	session_start();

	$id = $_SESSION["id"];


	$descricao = $_GET["descAtividade"];

	$problema = $_GET["idsProb"];

	$marcadas = count($problema);

	try {

		$sql = "INSERT INTO Atividade(desc_Atividade, id_Professor) VALUES (?,?)";

		$stmt = $conexao->prepare("$sql");
		$stmt->bindValue(1, $descricao);
		$stmt->bindValue(2, $id);
		$stmt->execute();

		$stmt = $conexao->query("select MAX(id) as id from Atividade");


		$idAtv;

		foreach ($stmt as $key) {
			$idAtv = $key["id"];
		}



		if ($marcadas > 0 && $marcadas < 11) {

			require ($_SERVER["DOCUMENT_ROOT"].'/professor/insercao/'.$marcadas.'.php');
			
		}

		


		header("Location: /professor/listarProblemasAtividade.php?id=$idAtv");

		
	} catch (Exception $e) {

		echo $e;
		
	}

	



?>