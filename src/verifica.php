<?php

	session_start();
		
	 include ($_SERVER ['DOCUMENT_ROOT'].'/conexao.php');

	 if (!isset($_SESSION['nome'])) {
		# code...
		require 'navegacao.php';
	}else{

		$usuario = $_SESSION['USUARIO_LOGADO'];

		$professor = 'P';

		$aluno = 'A';


		if (strcasecmp($usuario, $professor) == 0) {

			require 'professor/navegacaoProf.php';
			
		}else if (strcasecmp($usuario, $aluno) == 0) {

			require 'aluno/navegacaoAlun.php';

		}

	}

	


?>