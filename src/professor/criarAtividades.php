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
		<form method="GET" action="/professor/inserirAtividade.php">
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

				   $resultado = $conexao->query("select  id, desc_Problema, classificacao from Problema");

				  foreach($resultado as $linha){ 

				?>
			      <tr>
			         
			         <td><?=$linha['desc_Problema'];?></td>
			         <td><?=$linha['classificacao'];?></td>
			         <td> 

			         <input type="checkbox" name="id<?=$count?>" value="<?=$linha['id'];?>">

			          </td>

			       </tr>

				<?php 
					//$count = $count + 1;
					} 
				?>
				<tr>
					<td colspan="3">
					<center>
					<input type="hidden" name="contador" value="<?=$count?>">
						<button type="submit"> Criar uma lista </button>
					</center>
					</td>
				</tr>
			</form>
				
		</table>
		

</body>
</html>

