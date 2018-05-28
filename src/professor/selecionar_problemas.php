<?php

require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');
// require ($_SERVER["DOCUMENT_ROOT"].'/aluno/areaAluno.php');
// require ($_SERVER["DOCUMENT_ROOT"].'/aluno/AreaAlunoDAO.php');
require ($_SERVER["DOCUMENT_ROOT"].'/professor/carregarDadosAlunos.php');

function gerarProblemasTurma($con, $turma){
	// selecionar os alunos da turma
	$alunos = pesquisarAlunos($con, NULL, $turma);

	$problemaDAO = new ProblemaDAO($con);
	$blocoAreaDAO = new BlocoAreaDAO($con);
	$itemBlocoDAO = new ItemBlocoDAO($con);

	$id_assunto = 1;
	// para cada aluno
	//   escolher um problema aleatorio de nivel F
	//   gerar um item de bloco de ordem 1
	foreach($alunos as $aluno){

		$id_aluno = $aluno->id;
		$bloco = $blocoAreaDAO->getByAlunoAssunto($id_aluno, $id_assunto);

		$id_bloco = $bloco->id;
		$problema = $problemaDAO->selecionarPorNivel('F', $id_assunto, $id_bloco);
		$itemBlocoDAO->createNextProblem($bloco, 1);
		//criarItemBloco($con, 1, $aluno->id, 1, $problema->id, $id_bloco);
	}	
}

// function criarItemBloco($con, $id_assunto, $id_aluno, $ordem, $id_problema, $id_bloco){

//    	$situacaoDAO = new SituacaoItemBlocoDAO($con);
//    	$situacao = new SituacaoItemBloco();
//    	$situacao->status = 1;
//    	$situacao->definirPontuacao($ordem);
//    	$situacaoDAO->save($situacao);
//    	$id_situacaoitem = $situacaoDAO->getLastId("SituacaoItemBloco");

//    	$sql = "insert into ItemBloco (id_bloco, id_problema, ordem,  id_situacaoitem) values (?,?,?,?)";
// 	$stmt = $con->prepare($sql);
// 	$stmt->bindValue(1, $id_bloco);
// 	$stmt->bindValue(2, $id_problema);
// 	$stmt->bindValue(3, $ordem);
// 	$stmt->bindValue(4, $id_situacaoitem);
// 	$stmt->execute();			   	
// }


?>