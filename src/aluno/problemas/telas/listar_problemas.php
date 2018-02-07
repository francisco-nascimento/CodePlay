<!DOCTYPE html>
<html>
<head>
	<title>Problemas a responder</title>
</head>
<body>

	<?php

			require ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');
			

		?>

		
		<fieldset>
		<table border="1">
		<legend>Lista de problemas</legend>
				<tr>
					<td>
						Descrição
					</td>
					<td>
						Classificação
					</td>
					<td>
						Opções
					</td>
				</tr>
				<?php
					require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');

				   $resultado = $conexao->query("select  id, desc_Problema, classificacao from Problema");

				  foreach($resultado as $linha){ 

				?>
			      <tr>
			         
			         <td><?=$linha['desc_Problema'];?></td>
			         <td><?=$linha['classificacao'];?></td>
			         <td>
			         	<form action="/aluno/problemas/telas/responderProblemas.php" method="GET">
			         		<input type="hidden" name="id" value="<?=$linha['id'];?>">
			         		<button type="submit"> Responder Esta </button>
			         	</form>
			         </td>

			       </tr>

				<?php 
					} 
				?>

		</table>
		</fieldset>

</body>
</html>