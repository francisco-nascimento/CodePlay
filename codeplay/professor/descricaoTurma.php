<?php

require ('../conexao.php');

$idTurma = $_GET["idTurma"];

$descTurma = $_GET["descTurma"];

$sql = "UPDATE Turma SET desc_Turma = ? WHERE id = ?";

$stmt = $conexao->prepare($sql);

$stmt->bindValue(1, $descTurma);

$stmt->bindValue(2, $idTurma);

$stmt->execute();

header("Location: /codeplay/professor/listarAlunosTurma.php?idturma=$idTurma");


?>