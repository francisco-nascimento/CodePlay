<?php	
	require 'conexao.php';

	$resposta = $_POST["resposta"];

	$query = "insert into resposta (resposta) values (:resposta)";

	$insere = $conn -> prepare($query);
	$insere -> execute(array(
		':resposta' => $resposta
		)
	);
	if ($insere == true) {
		echo "cadastrando...";
		header("Location: index.php");
	}else{
		echo "Não cadastrado";
		header("Location: cadastrar.php");
	}
?>
//use mysql; UPDATE user SET Password=PASSWORD('@luno1fpe') WHERE User='root'; FLUSH PRIVILEGES; exit;