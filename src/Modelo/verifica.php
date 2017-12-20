<?php

	session_start();
		
	require 'conexao.php';

	$professor = 'P';

	$aluno = 'A';

	if (isset($_SESSION['email'])) {
		
		$usuario = $_SESSION['USUARIO_LOGADO'];

		if (strcasecmp($usuario, $professor) == 0) {

			require 'navegacaoProf.php';
		
		}else if (strcasecmp($usuario, $aluno) == 0) {

			require 'navegacaoAlun.php';

		}

	}else{
		require 'navegacao.php';
	}

?>
