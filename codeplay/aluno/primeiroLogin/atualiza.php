<?php  

	session_start();

	require ('../../conexao.php');

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

		$sql = "SELECT * FROM Aluno where id = ? ";
		$stmt = $conexao->prepare($sql);
		$stmt->bindValue(1, $id);
		$stmt->execute();
		$res = $stmt->fetch(PDO::FETCH_ASSOC);

		$_SESSION["email"] = $res['email'];
		$_SESSION["nome"] = $res['nome'];

		header("Location: codeplay/index.php");

	} catch (Exception $e) {
		echo "Erro: " ;
	}

?>
