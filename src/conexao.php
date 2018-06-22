<?php

	try {

	  $conexao = new PDO('mysql:host=127.0.0.1;dbname=Codeplay', 'root', "");
	  // $conexao = new PDO('mysql:host=127.0.0.1;dbname=u775273746_code', 'u775273746_cp', "codeplay123");
	  $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	} catch(PDOException $e) {
	    echo 'ERROR: ' . $e->getMessage();
	}


?>