<?php

	require ('../conexao.php');
	$idTurma = $_GET["idturma"];
	$idAtv = $_GET["idAtv"];
	$data = $_GET["dataLimite"];

	$sql = "select * from Atividade_Turma where id_Atividade = ? and id_Turma = ?";
	$teste = $conexao->prepare($sql);
	$stmt = $conexao->prepare($sql);
	$stmt->bindValue(1, $idAtv);
	$stmt->bindValue(2, $idTurma);
	$stmt->execute();

	$atividade;
	$turma;
	foreach ($stmt as $key) {

		$atividade = $key['id_Atividade'];
		$turma = $key['id_Turma'];

	}
	if ($atividade == $idAtv && $turma == $idTurma) {

		$msg = "Essa atividade já está aplicada à essa turma!";
		header("Location: /codeplay/professor/exibirLiberarAtividade.php?idAtividade=".'$idAtv');
		
	}else{

		try {

	$sql = "INSERT INTO Atividade_Turma(id_Atividade, id_Turma, data_limite) VALUES(?,?,?);";

	$stmt = $conexao->prepare($sql);
	$stmt->bindValue(1, $idAtv);
	$stmt->bindValue(2, $idTurma);
	$stmt->bindValue(3, $data);
	$stmt->execute();


	header("Location: /codeplay/professor/turmas.php");
			
		} catch (Exception $e) {

			echo "$e";
			
		}

	}

	

?> 