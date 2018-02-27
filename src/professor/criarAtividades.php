<?php

	require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');

	session_start();

	$id = $_SESSION["id"];

	$descricao = $_GET["descricao"];

	$problema = $_GET["idsProb"];

	$marcadas = count($problema);

	try {

		$sql = "INSERT INTO Atividade(desc_Atividade, id_Professor) VALUES (?,?)";

		$stmt = $conexao->prepare("$sql");
		$stmt->bindValue(1, $descricao);
		$stmt->bindValue(2, $id);
		$stmt->execute();

		$stmt = $conexao->query("select MAX(id_atividade) as id from Problema_Atividade");

		$idAtv;

		foreach ($stmt as $key) {
			$idAtv = $key["id"];
		}



		if ($marcados > 0) {

			require ($_SERVER["DOCUMENT_ROOT"].'/professor/insercao/'.$marcados.'.php');
			
		}

		

		header("Location: /professor/listarAtividades.php");
		
	} catch (Exception $e) {

		echo $e;
		
	}

	



?>