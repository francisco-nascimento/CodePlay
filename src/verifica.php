<?php
		
	require 'conexao.php';

	$usuario = $_SESSION['USUARIO_LOGADO'];

	$professor = 'P';

	$aluno = 'A';


	if (strcasecmp($usuario, $professor) == 0) {

		require 'navegacaoProf.php';
		
	}else if (strcasecmp($usuario, $aluno) == 0) {

		require 'navegacaoAlun.php';

	}else{
		require 'navegacao.php';
	}


?>