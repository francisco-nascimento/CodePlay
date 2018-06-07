<?php
	
	 session_start();	
	 include ('conexao.php');
	 include ('imports.php');

	 if (!isset($_SESSION['USUARIO_LOGADO'])) {
		include ('navegacao.php');
		
	}else{

		$usuario = $_SESSION['USUARIO_LOGADO'];

		$professor = 'P';

		$aluno = 'A';


		if (strcasecmp($usuario, $professor) == 0) {

			include ('navegacaoProf.php');
			
		}else if (strcasecmp($usuario, $aluno) == 0) {

			include ('navegacaoAlun.php');

		}

	}

	


?>