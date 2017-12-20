
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
		<th>Alunos cadastrados</th>
		
	</tr>

	<?php
		$query = "select nome from Aluno";
		$conexao = mysqli_connect('localhost', 'root', '1994', 'Pesquisa');
		$resultado = mysqli_query($query, $conexao);
		while($row = mysqli_fetch_array($resultado)){
	?>

	 <tr>
	   	<td><?=$row["nome"]?></td>
	 		
 	 </tr>


<?php
	}
?>

</table>

</body>
</html>
