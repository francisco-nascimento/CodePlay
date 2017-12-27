<?php

	session_start();
		
	require 'conexao.php';

	$professor = 'P';

	$aluno = 'A';

	if (isset($_SESSION['email'])) {
		
		$usuario = $_SESSION['USUARIO_LOGADO'];

		if (strcasecmp($usuario, $professor) == 0) {

			require '../professor/navegacaoProf.php';
		
		}else if (strcasecmp($usuario, $aluno) == 0) {

			require '../aluno/navegacaoAlun.php';

		}

	}else{
		require 'navegacao.php';
	}

?>
