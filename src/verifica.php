<?php

	session_start();
		
	 include 'conexao.php';

	 if (!isset($_SESSION['USUARIO_LOGADO'])) {
		require ($_SERVER["DOCUMENT_ROOT"].'/navegacao.php');
		
	}else{

		$usuario = $_SESSION['USUARIO_LOGADO'];

		$professor = 'P';

		$aluno = 'A';


		if (strcasecmp($usuario, $professor) == 0) {

			require ($_SERVER["DOCUMENT_ROOT"].'/professor/navegacaoProf.php');
			
		}else if (strcasecmp($usuario, $aluno) == 0) {

			require ($_SERVER["DOCUMENT_ROOT"].'/aluno/navegacaoAlun.php');

		}

	}

	


?>