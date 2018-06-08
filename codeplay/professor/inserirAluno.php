<?php 
	session_start();
	require ('../conexao.php');

	$matricula = $_POST["matricula"];

	$senha = "ifpe1234";

	$senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

	$sql = "SELECT id FROM Aluno WHERE matricula = ?";

	$stmt = $conexao->prepare($sql);

	$stmt->bindValue(1, $matricula);
	$stmt->execute();

	$idAluno = 0;

	foreach ($stmt as $key) {
		$idAluno = $key["id"];
	}



	if ($idAluno == null || $idAluno == 0) {
		$sql = "insert into Aluno(matricula, senha, situacao, id_professor) values(?,?,?,?)";

		$stmt = $conexao->prepare($sql);
		$stmt->bindValue(1, $matricula);
		$stmt->bindValue(2, $senhaCriptografada);
		$stmt->bindValue(3, 0);
		$stmt->bindValue(4, $_SESSION["id"]);

		$stmt->execute();

		header("Location: /codeplay/professor/cadastrarAluno.php?msg=Aluno%20Cadastrado!");
		
	}else{

		header("Location: /codeplay/professor/cadastrarAluno.php?msg=Aluno%20já%20existente!");

	}
	
		
	
		
	
?>