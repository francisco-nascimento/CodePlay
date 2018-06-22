<?php 
	session_start();
	require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');
	require ($_SERVER["DOCUMENT_ROOT"].'/aluno/areaAluno.php');
  	require ($_SERVER["DOCUMENT_ROOT"].'/aluno/AreaAlunoDAO.php');

  	$id_professor = $_SESSION['id'];
	$matricula = $_POST["matricula"];
	$nome = $_POST["nome"];
	$email = $_POST["email"];
	$id_turma = $_POST["pesq-turma"];
	$senha = "codeplay123";
	$senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);
	$situacao = 0;

	$alunoDAO = new AlunoDAO($conexao);
	$aluno = $alunoDAO->getByMatriculaEmail($matricula, $email);

	if (!isset($aluno->id)) {

		$alunoDAO->save($matricula, $nome, $email, $senhaCriptografada, $situacao, $id_turma, $id_professor);
		header("Location: /professor/cadastrarAluno.php?msg=2");
	}else{
		header("Location: /professor/cadastrarAluno.php?msg=1");
	}
	
		
	
		
	
?>