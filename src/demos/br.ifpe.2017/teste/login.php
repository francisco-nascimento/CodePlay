<?php
session_start();
require 'conexao.php';
if (isset($_SESSION['login'])){
  echo"<script type='text/javascript'> alert('Já estais logado!');</script>";
  header('location: tela.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>testando</title>
</head>
<body>
<h1>Logue-se</h1>
<form method="POST" action="logon.php">
	<label>Usuario:</label>
	<input type="text" name="usuario">

	<label>Senha:</label>
	<input type="password" name="senha">
	<button type="submit">Logar-se</button>

</form>
<a href="cadastro.php"><button>Cadastre-se</button></a>


</body>
</html>