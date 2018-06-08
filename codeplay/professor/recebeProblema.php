<?php

include ('../conexao.php');

session_start();

	try {

		$descricaoProblema = $_POST["descricao"];
		$idProfessor = $_SESSION["id"];
		$classificacao = $_POST["classificacao"];
		$resposta = $_POST["resposta"];
		$assunto = $_POST["sel-assunto"];
		

		$InserirProblema = $conexao->prepare("insert into Problema (desc_Problema, id_Professor, classificacao, id_assunto) values (?,?,?,?)");

			$InserirProblema->bindValue(1, $descricaoProblema);
			$InserirProblema->bindValue(2, $idProfessor);
			$InserirProblema->bindValue(3, $classificacao);
			$InserirProblema->bindValue(4, $assunto);

			$InserirProblema->execute();


			$lastId = $conexao->lastInsertId();
			


		$InserirGabarito = $conexao->prepare("insert into Gabarito (id_Problema, desc_Gabarito) values (?,?)");

			$InserirGabarito->bindValue(1, $lastId);
			$InserirGabarito->bindValue(2, $resposta);

			$InserirGabarito->execute();

			header("Location: /professor/cadastrarProblema.php");



	}catch(PDOException $e){
			echo $e->getMessage();
		}



	
?>