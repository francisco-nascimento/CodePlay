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
						Opções
					</td>
				</tr>
				
				<?php
					
					

				   $resultado = $conexao->prepare("select a.id, a.desc_Atividade from Atividade as a right join Atividade_Turma as a_t on a.id = a_t.id_Atidividade where id_Turma = ?;");
				   $resultado->bindValue(1, $_SESSION["idTurma"]);
				   $resultado->execute();

				  foreach($resultado as $linha){ 

				?>
			      <tr>
			         
			         <td><?=$linha['desc_Atividade'];?></td>
			         
			         <td> 
			         <form method="GET" action="/professor/listarProblemasAtividade.php">
			         	<input type="hidden" name="idAtividade" value="<?=$linha['id'];?>">

			         	<button class="btn btn-sm btn-success" type="submit"> Responder </button>
			         </form>


			          </td>

			       </tr>

				<?php 
					
					} 
				?>
				
		</table>
		

</body>
</html>

