<!DOCTYPE html>
<html>
<head>
	<title>Problemas a responder</title>
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
						Descrição
					</td>
					<td>
						Ultima alteração
					</td>
					<td>
						Opções
					</td>
				</tr>
				
				<?php
					
					

				   $resultado = $conexao->query("select  id, desc_Atividade, data_Alteracao from Atividade");

				  foreach($resultado as $linha){ 

				?>
			      <tr>
			         
			         <td><?=$linha['desc_Atividade'];?></td>
			         <td><?=$linha['data_Alteracao'];?></td>
			         <td> 
			         <form method="GET" action="/professor/listarProblemasAtividade.php">
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
						<a href="/professor/criarAtividades.php"><button> Criar uma lista </button></a>
					</center>
					</td>
				</tr>
				
		</table>
		

</body>
</html>

