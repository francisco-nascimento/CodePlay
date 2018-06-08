<!DOCTYPE html>
<html>
<head>
	<title>Code && Play - Adicionar aluno à turma</title>
</head>
<body>

	<?php

			require ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');
			$id = $_GET["id"];
			$sql = "select * from Turma where id = ?";
			$stmt = $conexao->prepare($sql);
			$stmt->bindValue(1, $id);
			$stmt->execute();

			$descTurma;
			

			foreach ($stmt as $key) {
				
				$descTurma = $key["desc_Turma"];
				

			}

			
			

		?>


		
		<br><br><br><br>
		<form method="POST" action="/professor/inserirTurma.php">
		<input type="hidden" name="id" value="<?=$id;?>">
		<table  class="table">

				<tr>
					<td>Nome da turma: <br> <input type="text" name="desc_Turma" value="<?=$descTurma;?>"></td>


				</tr>
		
				<tr>
					<th>
						Aluno
					</th>
					<th>
						Adicionar aluno
					</th>
					
				</tr>
				
				<?php
					require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');
					
				   $resultado = $conexao->query("select  nome from Aluno");

				  foreach($resultado as $linha){ 

				?>
			      <tr>
			         
			         <td><?=$linha['nome'];?></td>
			         <td>
			         	
			         	<input type="checkbox" name="aluno">
			         </td>

			       </tr>


				<?php 
					
					} 

				?>

				<tr>
					<td >
					<center>
					
						<button type="submit"> Enviar Alterações</button>
					</center>
					</td>
				</tr>
			</form>
				
		</table>
		

</body>
</html>

