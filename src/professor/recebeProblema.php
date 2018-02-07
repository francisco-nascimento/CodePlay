<?php

include ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');

session_start();

	try {

		$descricaoProblema = $_POST["descricao"];
		$idProfessor = $_SESSION["id"];
		$classificacao = $_POST["classificacao"];
		$resposta = $_POST["resposta"];
		

		$InserirProblema = $conexao->prepare("insert into Problema (desc_Problema, id_Professor, classificacao) values (?,?,?)");

			$InserirProblema->bindValue(1, $descricaoProblema);
			$InserirProblema->bindValue(2, $idProfessor);
			$InserirProblema->bindValue(3, $classificacao);

			$InserirProblema->execute();


			$lastId = $conexao->lastInsertId();
			


		$InserirGabarito = $conexao->prepare("insert into Gabarito (id_Problema, desc_Gabarito) values (?,?)");

			$InserirGabarito->bindValue(1, $lastId);
			$InserirGabarito->bindValue(2, $resposta);

			$InserirGabarito->execute();

			header("Location: /professor/listarProblemas.php");



	}catch(PDOException $e){
			echo $e->getMessage();
		}



	
?>