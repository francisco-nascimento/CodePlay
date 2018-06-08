<?php

	require ('../conexao.php');
	$aluno = $_GET["idAluno"];

	// $sql = "DELETE FROM Aluno_Turma WHERE id_aluno = ?;";

	// $stmt = $conexao->prepare($sql);
	// $stmt->bindValue(1, $aluno);
	// $stmt->execute();

	$sql = "DELETE FROM RespostaAluno WHERE id_Aluno = ?";
	$stmt = $conexao->prepare($sql);
	$stmt->bindValue(1, $aluno);
	$stmt->execute();

	$sql = "SELECT id_situacaoitem FROM ItemBloco WHERE id_bloco in (select b.id from BlocoArea b, AreaAluno a where b.id_areaaluno = a.id and a.id_aluno = ?)";
	$stmt = $conexao->prepare($sql);
	$stmt->bindValue(1, $aluno);
	$stmt->execute();	
    $res = $stmt->fetchAll(PDO::FETCH_OBJ);

    if (count($res) > 0) {
		$str_idsituacao = join(",", $res);
		$sql = "DELETE FROM SituacaoItemBloco where id in (" . $str_idsituacao . ")";
		$stmt = $conexao->query($sql);
		$stmt->execute();
	}

	$sql = "DELETE FROM ItemBloco WHERE id_bloco in (select b.id from BlocoArea b, AreaAluno a where b.id_areaaluno = a.id and a.id_aluno = ?)";
	$stmt = $conexao->prepare($sql);
	$stmt->bindValue(1, $aluno);
	$stmt->execute();

	$sql = "DELETE FROM BlocoArea WHERE id_areaaluno = (select id from AreaAluno where id_aluno = ?)";
	$stmt = $conexao->prepare($sql);
	$stmt->bindValue(1, $aluno);
	$stmt->execute();

	$sql = "DELETE FROM AreaAluno WHERE id_Aluno = ?";
	$stmt = $conexao->prepare($sql);
	$stmt->bindValue(1, $aluno);
	$stmt->execute();

	$sql2 = "DELETE FROM Aluno WHERE id = ?";
	$stmt2 = $conexao->prepare($sql2);
	$stmt2->bindValue(1, $aluno);
	$stmt2->execute();

	header("Location: /codeplay/professor/listarAlunos.php");

?>