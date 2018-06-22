<?php

	const LIMITE_SESSION_TIME = 1200;
	session_start();
		
	 include 'conexao.php';
	 

	 if (!isset($_SESSION['USUARIO_LOGADO'])) {
		require ($_SERVER["DOCUMENT_ROOT"].'/navegacao.php');
		
	}else{

		// Verifica a expiracao da sessao
		if (isset($_SESSION['ultima_atividade']) && (time() - $_SESSION['ultima_atividade'] > LIMITE_SESSION_TIME)) {

		    // última atividade foi mais de 60 minutos atrás
		    session_unset();     // unset $_SESSION  
		    session_destroy();   // destroindo session data 
		    header("Location: /index.php");
		}
		$_SESSION['ultima_atividade'] = time(); // update da ultima atividade

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