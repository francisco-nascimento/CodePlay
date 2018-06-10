<?php
	require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');

	require ($_SERVER["DOCUMENT_ROOT"].'/aluno/areaAluno.php');
	require ($_SERVER["DOCUMENT_ROOT"].'/aluno/AreaAlunoDAO.php');



function compareJSCode($conexao, $id_problema, $id_aluno){

	$gabaritoDAO = new GabaritoDAO($conexao);
	$respostaDAO = new RespostaAlunoDAO($conexao);
	$id_problema = 2;
	$id_aluno = 108;

	$gabarito = $gabaritoDAO->getByProblema($id_problema);
	$resposta = $respostaDAO->getByAlunoProblema($id_aluno, $id_problema);

	$solucao1 = $gabarito->desc_Gabarito;
	$solucao2 = $resposta->desc_resposta;

	$i = 0;
	$registro = array();

	$lines1 = explode("\n", $solucao1);
	$lines2 = explode("\n", $solucao2);

	echo "<b>Gabarito (" . count($lines1) . " linhas): <br/> ".
		"<pre style='background-color:#ABCDEF'>" . $solucao1 . "</pre></b>";
	echo "<br/>Resposta aluno (" . count($lines2) . " linhas): <br/>". 
		"<pre  style='background-color:#EDEDED'>" . $solucao2 . "</pre>";
	
	// var_dump($lines1);
	// echo"<br>";
	// var_dump($lines2);

	$line_var1 = getLineVar($lines1);
	$line_var2 = getLineVar($lines2);

	$vars1 = getVars($line_var1);
	$vars2 = getVars($line_var2);
	
	echo"<br>";
	echo"<br>";

	// var_dump($vars1);
	// var_dump($vars2);

	$dif = array_diff($vars1, $vars2);
	echo"<br>";

	$registro[$i++] = "Elemento | Esperado | Encontrado | Diferença ";
	$registro[$i++] = "Variáveis: " . implode(";", $vars1) . " | " . implode(";", $vars2) . " | " . count($dif);
	// if (count($lines1) == count($lines2)){
	// 	echo "Quantidade de linhas iguais: " . sizeof($lines2);
	// }
	// verificando variaveis
	
	foreach ($registro as $item) {
		echo "$item<br>";
	}
}

function getLineVar($array){
	$line_var = array_filter($array, function ($var) {return stripos($var, 'var') !== false; } );
	return $line_var[0];
}

function getVars($lineVar){
	return explode(', ', substr($lineVar, 4, -2));
}
?>