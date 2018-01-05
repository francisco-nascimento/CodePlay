<?php

<<<<<<< HEAD
	require '/conexao.php';
=======
	require 'conexao.php';
>>>>>>> f0f3aa649b623ae61b84b1f10f23310b2313afbf

	try {

		$descricaoProblema = $_POST["descricao"];
		$idProfessor = 5;
		$classificacao = $_POST["dificuldade"];
		

		$InserirProblema = $conexao->prepare("insert into Problema (desc_Problema, id_Professor, classificacao) values (?,?,?)");

			$InserirProblema->bindValue(1, $descricaoProblema);
			$InserirProblema->bindValue(2, $idProfessor);
			$InserirProblema->bindValue(3, $classificacao);

			$InserirProblema->execute();


			$lastId = $conexao->lastInsertId();
			$descricaoGabarito = $_POST["gabarito"];


		$InserirGabarito = $conexao->prepare("insert into Gabarito (id_Problema, desc_Gabarito) values (?,?)");

			$InserirGabarito->bindValue(1, $lastId);
			$InserirGabarito->bindValue(2, $descricaoGabarito);

			$InserirGabarito->execute();



	}catch(PDOException $e){
			echo $e->getMessage();
		}



	
?>