<?php 
	session_start();
	require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');

	$matricula = $_POST["matricula"];

	$senha = "ifpe1234";

	$senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

	$sql = "insert into Aluno(matricula, senha, id_professor) values(?,?,?)";

		$stmt = $conexao->prepare($sql);
		$stmt->bindValue(1, $matricula);
		$stmt->bindValue(2, $senhaCriptografada);
		$stmt->bindValue(3, $_SESSION["id"]);

		$stmt->execute();

	if ($stmt) {
		header("Location: /professor/cadastrarAluno.php?msg=Aluno%20Cadastrado");
	}else{
		header("Location: /professor/cadastrarAluno.php?msg=Aluno%20não%20Cadastrado");
	}
		
	
?>