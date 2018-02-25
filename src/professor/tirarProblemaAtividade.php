<?php

require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');

$idProblema = $_GET["idProblema"];

<<<<<<< HEAD
$descAtividade = $_GET["descAtividade"];
=======
$idAtividade = $_GET["idAtividade"];
>>>>>>> Wesley

$idAtividade = $_GET["idAtividade"];

	$sql = "DELETE FROM Problema_Atividade WHERE id_atividade = ? and id_problema = ?";

		$stmt = $conexao->prepare($sql);
		$stmt->bindValue(1, $idAtividade);
		$stmt->bindValue(2, $idProblema);
		$stmt->execute();
		
	header("Location: /professor/listarProblemasAtividade.php?id="."$idAtividade");
?>