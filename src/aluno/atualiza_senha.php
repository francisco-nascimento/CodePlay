<?php  

	session_start();

	require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');

	$id = $_SESSION["id"];

	$senha = $_POST["senha"];

	$senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

	$sql = "UPDATE Aluno SET senha = ?, situacao = ? WHERE id = ?";

	try {
		
		$stmt = $conexao->prepare($sql);
		$stmt->bindValue(1, $senhaCriptografada);
		$stmt->bindValue(2, 1);
		$stmt->bindValue(3, $id);

		$stmt->execute();

		header("Location: /index.php");

	} catch (Exception $e) {
	    echo 'ERROR: ' . $e->getMessage();		
	}

?>