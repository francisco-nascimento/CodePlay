<?php

require ('../conexao.php');

$aluno = $_GET["idAluno"];

$idTurma = $_GET["idTurma"];


$sql = "DELETE FROM Aluno_Turma WHERE id_aluno = ? AND id_turma = ?";

$stmt = $conexao->prepare($sql);

$stmt->bindValue(1, $aluno);

$stmt->bindValue(2, $idTurma);

$stmt->execute();

header("Location: /codeplay/professor/listarAlunosTurma.php?idturma=$idTurma");

?>