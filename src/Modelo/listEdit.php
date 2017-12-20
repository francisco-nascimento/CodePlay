<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Listagem</title>
</head>
<body>

 <?php

      require 'verifica.php';

 ?>
<table border="2">
	<tr>
		<th>Nome</th>
		<th>Senha</th>
		<th>Email</th>
	</tr>

	<?php
	$query = "select * from cadastro";
	$conexao = mysqli_connect('localhost', 'root', '1994', 'projeto');
	$resultado = mysqli_query($conexao, $query);
	while($row = mysqli_fetch_array($resultado)){
		?>

   <tr>
   	<td><?=$row["nome"]?></td>
 	<td><?=$row["senha"]?></td>
 	<td><?=$row["email"]?></td>
 	<td><a href="editar.php?nome=<?= $row["nome"]?>">Editar</a></td>
   </tr>

<?php
	}
?>

</table>

</body>
</html>