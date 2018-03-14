
<?php

	require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');

	session_start();


	$id = $_SESSION["id"];

	$descricao = $_GET["descTurma"];


	try {

		$sql = "INSERT INTO Turma(desc_Turma, id_Professor) VALUES (?,?)";

		$stmt = $conexao->prepare("$sql");
		$stmt->bindValue(1, $descricao);
		$stmt->bindValue(2, $id);
		$stmt->execute();

		$stmt = $conexao->query("select MAX(id) as id from Turma");

		$idTurma;

		foreach ($stmt as $key) {
			$idTurma = $key["id"];
		}

		header("Location: /professor/listarAlunosTurma.php?idturma=$idTurma");
		
	} catch (Exception $e) {

		echo $e;
		
	}
?>