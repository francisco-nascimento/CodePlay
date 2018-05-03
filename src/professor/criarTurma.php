<!DOCTYPE html>
<html>
<head>
	<title>Turma</title>

</head>
<body>

	<?php

			require ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');
			require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');
			
			

		?>

		
		<br><br>


		<table border="1" class="table">
		<form action="/professor/inserirTurma.php" name="formulario" method="GET">

			<tr>
				<th>
					<label>Descrição para turma: </label>
					<input maxlength="50000" required="required" type="text" name="descTurma">
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
