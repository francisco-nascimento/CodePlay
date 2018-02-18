<!DOCTYPE html>
<html>
<head>
	<title>Problemas a responder</title>
</head>
<body>

	<?php

			require ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');
			

		?>

		
		<br><br><br><br>

		<table border="1">
		
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
					require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');
					$cont = 0;

				   $resultado = $conexao->query("select  id, desc_Atividade, data_Alteracao from Atividade");

				  foreach($resultado as $linha){ 

				?>
			      <tr>
			         
			         <td><?=$linha['desc_Atividade'];?></td>
			         <td><?=$linha['data_Alteracao'];?></td>
			         <td>  </td>

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

