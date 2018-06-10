<?php

	session_start();

	require "baseURI.php";
	$pasta = URI::scriptName();

	$usuario = $_SESSION['USUARIO_LOGADO'];

	$pasta = str_replace("/", "", $pasta);

	if (strcmp($pasta, "") == 0 || strcmp($pasta, "loginCadastro") == 0){
		return true;
	}

	if (!isset($usuario) || (strcasecmp($usuario, "A") == 0 && stripos($pasta, "professor") === true)) {
		header ("Location: /index.php");
	}

?>
