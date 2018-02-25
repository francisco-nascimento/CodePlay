<?php

require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');

$idProblema = $_GET["idProblema"];

$idAtividade = $_GET["idAtividade"];

$sql = "DELETE FROM Problema_Atividade WHERE id_atividade = ? AND id_problema = ?";

$stmt = $conexao->prepare($sql);

$stmt->bindValue(1, $idAtividade);

$stmt->bindValue(2, $idProblema);

$stmt->execute();

header("Location: /professor/listarProblemasAtividade.php?id=$idAtividade");

?>