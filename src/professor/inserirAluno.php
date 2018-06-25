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
	$areaAlunoDAO = new AreaAlunoDAO($conexao);
	$turmaConfigDAO = new TurmaConfiguracaoDAO($conexao);

	$aluno = $alunoDAO->getByMatriculaEmail($matricula, $email);

	if (!isset($aluno->id)) {

	  $alunoDAO->save($matricula, $nome, $email, $senhaCriptografada, $situacao, $id_turma, $id_professor);
      $id_aluno = $alunoDAO->getLastId("Aluno");
      // Gerar objeto AreaAluno
      $areaAluno = new AreaAluno();
      $aluno = new Aluno();
      $aluno->id = $id_aluno;
      // $aluno->id = ;
      $areaAluno->aluno = $aluno;

      // inserir blocos
      $config = $turmaConfigDAO->getByTurma($id_turma);
      $assuntos = $config->assuntos;
      $blocos = array();
      $i = 0;
      foreach($assuntos as $assunto){
         $blocos[$i] = new BlocoArea($assunto);
         $i++;
      }
      $areaAluno->blocos = $blocos;
      var_dump($areaAluno);
      $areaAlunoDAO->save($areaAluno);

	  header("Location: /professor/cadastrarAluno.php?msg=2");
	}else{
	  header("Location: /professor/cadastrarAluno.php?msg=1");
	}
	
		
	
		
	
?>