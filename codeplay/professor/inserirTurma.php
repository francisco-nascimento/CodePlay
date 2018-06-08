<?php
	require ('../conexao.php');

	session_start();

	$id = $_SESSION["id"];

	$descricao = $POST["descTurma"];

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

		header("Location: /codeplay/professor/listarAlunosTurma.php?idturma=$idTurma");
		
	} catch (Exception $e) {

		echo $e;
		
	}
?>