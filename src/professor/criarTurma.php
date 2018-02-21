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

		
		<br><br><br><br>
		<table border="1" class="table">
		
		
				<tr>
					<td>
						Turma
					</td>
					<td>
						Ultima alteração
					</td>
					<td>
						Opções
					</td>
				</tr>
				
				<?php
					
					

				   $resultado = $conexao->query("select  id, desc_Turma, data_Alteracao from Turma");

				  foreach($resultado as $linha){ 

				?>
			      <tr>
			         
			         <td><?=$linha['desc_Turma'];?></td>
			         <td><?=$linha['data_Alteracao'];?></td>
			         <td> 
			         <form method="GET" action="/professor/adicionarAluno.php">
			         	<input type="hidden" name="id" value="<?=$linha['id'];?>">
			         	<input type="submit" value="Alterar">
			         </form>

			          </td>

			       </tr>

				<?php 
					
					} 
				?>
				
				<tr>
					<td colspan="3">
					<center>
						<a href="/professor/Turma.php"><button> Criar Turma </button></a>
					</center>
					</td>
				</tr>
				
		</table>
</body>