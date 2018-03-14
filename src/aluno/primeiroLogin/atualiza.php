<?php  

	session_start();

	require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');

	$id = $_SESSION["id"];

	$nome = $_POST["nome"];

	$email = $_POST["email"];

	$senha = $_POST["senha"];

	$senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

	$sql = "UPDATE Aluno SET nome = ?, email = ?, senha = ?, situacao = ? WHERE id = ?";

	try {
		
		$stmt = $conexao->prepare($sql);
		$stmt->bindValue(1, $nome);
		$stmt->bindValue(2, $email);
		$stmt->bindValue(3, $senhaCriptografada);
		$stmt->bindValue(4, 1);
		$stmt->bindValue(5, $id);

		$stmt->execute();

		$_SESSION["email"] = $email;
		$_SESSION["nome"] = $nome;

		header("Location: /index.php");

	} catch (Exception $e) {
		
	}

?>