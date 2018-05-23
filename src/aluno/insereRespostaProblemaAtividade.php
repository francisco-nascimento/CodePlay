<?php

session_start();
include ('pontuar.php');
require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');

$idAluno = $_SESSION["id"];

$idurma = $_SESSION["idTurma"];

$respostaAluno = $_POST["respostaAluno"];

$idProblema = $_POST["idProblema"];

$idAtividade = $_POST["idAtividade"];

$correcao = $_POST["correcao"];

$classificacao = $_POST["classificacao"];

try {

	$sql = "INSERT INTO Problema_Atividade_Respondido (id_Atividade, id_Aluno, id_Problema) VALUES(?,?,?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(1, $idAtividade);
    $stmt->bindValue(2, $idAluno);
    $stmt->bindValue(3, $idProblema);
    $stmt->execute();

	$sql = "INSERT INTO Resposta_Aluno_Problema_Atividade(desc_resposta, correcao, id_Aluno, id_Problema, id_Atividade) VALUES(?,?,?,?,?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(1, $respostaAluno);
    $stmt->bindValue(2, $correcao);
    $stmt->bindValue(3, $idAluno);
    $stmt->bindValue(4, $idProblema);
    $stmt->bindValue(5, $idAtividade);
    $stmt->execute();

    pontuar_aluno($idAluno, $idProblema, 1, $classificacao);

    header("Location: /aluno/responderAtividade.php?idAtividade=$idAtividade");
	
} catch (Exception $e) {
	
}






?>