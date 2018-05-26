<?php

require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');
// require ($_SERVER["DOCUMENT_ROOT"].'/aluno/areaAluno.php');
// require ($_SERVER["DOCUMENT_ROOT"].'/aluno/AreaAlunoDAO.php');
require ($_SERVER["DOCUMENT_ROOT"].'/professor/carregarDadosAlunos.php');

function gerarProblemasTurma($con, $turma){
	// selecionar os alunos da turma
	$alunos = pesquisarAlunos($con, NULL, $turma);

	$problemaDAO = new ProblemaDAO($con);

	// para cada aluno
	//   escolher um problema aleatorio de nivel F
	//   gerar um item de bloco de ordem 1
	foreach($alunos as $aluno){
		$problema = $problemaDAO->selecionarPorNivel('F');
		criarItemBloco($con, 1, $aluno->id, 1, $problema->id);
	}

	
}

function criarItemBloco($con, $id_assunto, $id_aluno, $ordem, $id_problema){
	$sql = "select b.id from BlocoArea b, AreaAluno a where " . 
	"b.id_areaaluno = a.id and a.id_aluno = ? and b.id_assunto = ?";
	$stmt = $con->prepare($sql);
	$stmt->bindValue(1, $id_aluno);
	$stmt->bindValue(2, $id_assunto);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
   	$id_bloco = $result['id'];

   	$situacaoDAO = new SituacaoItemBlocoDAO($con);
   	$situacaoDAO->save();
   	$id_situacaoitem = $situacaoDAO->getLastId("SituacaoItemBloco");

   	$sql = "insert into ItemBloco (id_bloco, id_problema, ordem,  id_situacaoitem) values (?,?,?,?)";
	$stmt = $con->prepare($sql);
	$stmt->bindValue(1, $id_bloco);
	$stmt->bindValue(2, $id_problema);
	$stmt->bindValue(3, $ordem);
	$stmt->bindValue(4, $id_situacaoitem);
	$stmt->execute();			   	
}


?>