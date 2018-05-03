<?php

	include ($_SERVER['DOCUMENT_ROOT'] .'/conexao.php');

	$sql = "select * from Professor where email = ? ";

	$email = $_POST["email"];

	$stmt = $conexao->prepare($sql);

	$stmt->bindParam(1, $email);

	$stmt->execute();	

	$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	var_dump($resultado);


?>