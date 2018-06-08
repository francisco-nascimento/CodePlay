<?php
  require ('../verifica.php');
  require ('../conexao.php');

  require ('carregarDadosAlunos.php');

if(isset($_POST['id_turma'])){
	gerarProblemasTurma($conexao, $_POST['id_turma'], NULL);
} elseif (isset($_POST['alunos'])){
	gerarProblemasTurma($conexao, NULL, $_POST['alunos']);
}

function gerarProblemasTurma($con, $turma, $selecao){
	$problemaDAO = new ProblemaDAO($con);
	$blocoAreaDAO = new BlocoAreaDAO($con);
	$itemBlocoDAO = new ItemBlocoDAO($con);
	$id_assunto = 1;
	$i = 0;

	// selecionar os alunos da turma
	if (isset($turma)){
		$alunos = pesquisarAlunos($con, NULL, $turma);
		foreach($alunos as $aluno){
			$id_aluno = $aluno->id;
			$itemBlocoDAO->createNextProblem($id_aluno, $id_assunto, 0);
			$i++;
		}
	} else if (isset($selecao)){
		// para cada aluno
		//   escolher um problema aleatorio de nivel F
		//   gerar um item de bloco de ordem 1
		foreach($selecao as $id_aluno){
			$itemBlocoDAO->createNextProblem($id_aluno, $id_assunto, 0);
			$i++;
		}		
	}

}
?>
<!DOCTYPE html>
<html lang="pt" >
	<head>
		<meta charset="UTF-8">
		<title>Code && Play - Geração de atividades para os alunos</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"> 
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	</head>
	<body>
		<div class="table-users">
	  	<div class="header">Geração de atividades</div>
		<div class="title2">
			Atividades geradas para os alunos selecionados.
	      	</div>
	     </div>
	 </div>
	</body>
</html>

