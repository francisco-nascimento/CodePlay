<?php
 session_start();

 require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');
 function pontuar_aluno($con, $id_aluno, $id_problema, $percentual_acerto, $classificacao) {
	$sql = "";
	$buscarPontuacao = "select pontuacao from Aluno where id = ?";
	$stmt1 = $con->prepare($buscarPontuacao);
	$stmt1->bindValue(1, $id_aluno);
	$stmt1->execute();
	$resultado = $stmt1->fetchAll(PDO::FETCH_ASSOC);
			foreach ($resultado as $pontuacao) {
				$pontuacao_aluno = $pontuacao['pontuacao'];
			}

	$pontuacao_questao = 0;
	if ($classificacao == "F") {
		$pontuacao_questao = 500; 
	} else if ($classificacao == "médio") {
		$pontuacao_questao = 1000;
	} else if ($classificacao == "díficil") {
		$pontuacao_questao = 2000;
	}

	if ($percentual_acerto != 0) {
		$nova_pontuacao = $pontuacao_questao * $percentual_acerto;
		$sql = "update Aluno set pontuacao = ? where id = ?";
		$stmt = $con->prepare($sql);
		$stmt->bindValue(1, ($pontuacao_aluno + $nova_pontuacao));
		$stmt->bindValue(2, $id_aluno);
	 	$stmt->execute();
	}
	
 }

?>