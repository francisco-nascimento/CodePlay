<?php 
	session_start();
	require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');

	$matricula = $_POST["matricula"];

	$senha = "ifpe1234";

	$sql = "insert into Aluno(matricula, senha) values(?,?)";

		$stmt = $conexao->prepare($sql);
		$stmt->bindValue(1, $matricula);
		$stmt->bindValue(2, $senha);

		$stmt->execute();

	if ($stmt) {
		header("Location: /professor/cadastrarAluno.php?msg=Aluno%20Cadastrado");
	}else{
		header("Location: /professor/cadastrarAluno.php?msg=Aluno%20não%20Cadastrado");
	}
		
	
?>