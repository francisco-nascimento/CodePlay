<?php
	require ('../verifica.php');
	require ('../conexao.php');			
?>

<!DOCTYPE html>
<html>
<head>
	<title>Code && Play - Criar Turma</title>

</head>
<body>

	
		
		<br><br>


		<table border="1" class="table">
		<form action="inserirTurma.php" name="formulario" method="POST">

			<tr>
				<th>
					<label>Descrição para turma: </label>
					<input maxlength="80" required="required" type="text" name="descTurma">
				</th>
			</tr>
				<tr>
					<td>
					<center>
						<button class="btn btn-sm btn-success" type="submit">
							Criar Turma
						</button>
					</center>
					</td>
				</tr>
				</form>
				
		</table>
		

</body>
</html>
