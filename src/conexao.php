<?php

	try {

	  $conexao = new PDO('mysql:host=127.0.0.1;dbname=Codeplay', 'root', "123");
	  $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	} catch(PDOException $e) {
	    echo 'ERROR: ' . $e->getMessage();
	}


?>