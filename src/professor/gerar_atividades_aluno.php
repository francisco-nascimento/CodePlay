<?php
  require ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');
  require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');

  require ($_SERVER["DOCUMENT_ROOT"].'/professor/carregarDadosAlunos.php');


if(isset($_POST['id_turma'])){
	gerarProblemasTurma($conexao, $_POST['id_turma'], NULL);
} elseif (isset($_POST['alunos'])){
	gerarProblemasTurma($conexao, NULL, $_POST['alunos']);
}

function gerarProblemasTurma($con, $turma, $selecao){
	$alunoDAO = new AlunoDAO($con);
	$problemaDAO = new ProblemaDAO($con);
	$blocoAreaDAO = new BlocoAreaDAO($con);
	$itemBlocoDAO = new ItemBlocoDAO($con);
	$turmaConfigDAO = new TurmaConfiguracaoDAO($con);

	// selecionar os alunos da turma
	if (isset($turma)){
		
		$config = $turmaConfigDAO->getByTurma($turma);		
		$assunto = $config->assuntos[0];

		$alunos = pesquisarAlunos($con, NULL, $turma);
		foreach($alunos as $aluno){
			$id_aluno = $aluno->id;
			$itemBlocoDAO->createNextProblem($id_aluno, $assunto->id, 0, $config);
		}
	} else if (isset($selecao)){
		// para cada aluno
		//   escolher um problema aleatorio de nivel F
		//   gerar um item de bloco de ordem 1
		// echo "Quantidade: " . count($selecao);
		foreach($selecao as $id_aluno){
			// echo "<br/>Aluno: $id_aluno";
			$aluno = $alunoDAO->getById('Aluno', $id_aluno);
			$config = $turmaConfigDAO->getByTurma($aluno->id_turma);
			$assunto = $config->assuntos[0];

			$itemBlocoDAO->createNextProblem($id_aluno, $assunto->id, 0, $config);
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
	      	Atividades criadas para os alunos selecionados.
	     </div>
	 </div>
	</body>
</html>

