<?php

include ($_SERVER['DOCUMENT_ROOT'] .'/conexao.php');

$sql = "select * from Aluno where matricula = '20162tijg0545'";

$stmt = $conexao->prepare($sql);
$stmt->execute();

foreach ($stmt as $key) {
	var_dump($key["situacao"]);
}

?>