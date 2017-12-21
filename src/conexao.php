<?php


	try {

	  $conexao = new PDO('mysql:host=localhost;dbname=Codeplay', 'root', "1234");
	  $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	} catch(PDOException $e) {
	    echo 'ERROR: ' . $e->getMessage();
	}


?>