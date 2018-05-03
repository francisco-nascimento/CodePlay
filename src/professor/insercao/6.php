<?php

	$sql = "INSERT INTO Problema_Atividade VALUES(?,?), (?,?), (?,?), (?,?), (?,?), (?,?)";

	$stmt = $conexao->prepare($sql);
	$count = 1;

	for ($i=0; $i < $marcadas ; $i++) { 
	
		$stmt->bindValue($count, $idAtividade);
		$count = $count + 1;
		$stmt->bindValue($count, $problemas[$i]);
		$count = $count + 1;
	}

	$stmt->execute();
	


?>