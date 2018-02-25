<?php

require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');

$idProblema = $_GET["idProblema"];

<<<<<<< HEAD
$descAtividade = $_GET["descAtividade"];
=======
<<<<<<< HEAD
$descAtividade = $_GET["descAtividade"];
=======
$idAtividade = $_GET["idAtividade"];
>>>>>>> Wesley
>>>>>>> 278f2521d59d0cd2a5955ea54ab44e9259316153

$idAtividade = $_GET["idAtividade"];

	$sql = "DELETE FROM Problema_Atividade WHERE id_atividade = ? and id_problema = ?";

		$stmt = $conexao->prepare($sql);
		$stmt->bindValue(1, $idAtividade);
		$stmt->bindValue(2, $idProblema);
		$stmt->execute();
		
	header("Location: /professor/listarProblemasAtividade.php?id="."$idAtividade");
?>