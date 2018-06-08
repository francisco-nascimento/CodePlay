<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Editar</title>
	<meta charset="utf-8">
</head>
<body>

	<?php

	      require 'verifica.php';

	?>

<center><h1>Editar dados</h1>
<table>
	<tr>
		<td>
			Nome
		</td>
		<td>
			 <input type="text" name="nome" value="<?= $row['nome'] ?>">
		</td>
	</tr>
	<tr>
		<td>
			Senha
		</td>
		<td>
			 <input type="password" name="senha" value="<?= $row['senha'] ?>">
		</td>
	</tr>
	<tr>
		<td>
			Email
		</td>
		<td>
			 <input type="text" name="email" value="<?= $row['email'] ?>">
		</td>

	</tr>

</table>
 <br><br><button type="submit">Enviar</button>
</center>
</body>
</html>