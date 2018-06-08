<?php

	require ('../conexao.php');

	session_start();

	$id = $_SESSION["id"];


	$descricao = $_GET["descAtividade"];

	$problemas = $_GET["idsProb"];


	$marcadas = count($problemas);

	try {

		$sql = "INSERT INTO Atividade(desc_Atividade, id_Professor) VALUES (?,?)";

		$stmt = $conexao->prepare("$sql");
		$stmt->bindValue(1, $descricao);
		$stmt->bindValue(2, $id);
		$stmt->execute();

		$stmt = $conexao->query("select MAX(id) as id from Atividade");


		$idAtividade;


		foreach ($stmt as $key) {
			$idAtividade = $key["id"];
		}



		if ($marcadas > 0 && $marcadas < 11) {

			require ($_SERVER["DOCUMENT_ROOT"].'/professor/insercao/'.$marcadas.'.php');
			
		}

		


		header("Location: /codeplay/professor/listarProblemasAtividade.php?idAtividade=$idAtividade");

		
	} catch (Exception $e) {

		echo $e;
		
	}
	



?>