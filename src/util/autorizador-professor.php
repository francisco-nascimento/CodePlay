<?php

	session_start();

	require "baseURI.php";
	$pasta = URI::scriptName();

	$usuario = $_SESSION['USUARIO_LOGADO'];

	if (strcmp($pasta, "//") == 0){
		return true;
	}

	if (!isset($usuario) || (strcasecmp($usuario, "A") == 0 && stripos($pasta, "professor") === true)) {
		header ("Location: /index.php");
	}

?>
