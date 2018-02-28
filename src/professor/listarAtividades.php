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
					
					

				   $resultado = $conexao->prepare("select  id, desc_Atividade, data_Alteracao from Atividade where id_Professor = ?");
				   $resultado->bindValue(1, $_SESSION["id"]);
				   $resultado->execute();

				  foreach($resultado as $linha){ 

				?>
			      <tr>
			         
			         <td><?=$linha['desc_Atividade'];?></td>
			         <td><?=$linha['data_Alteracao'];?></td>
			         <td> 
			         <form method="GET" action="/professor/listarProblemasAtividade.php">
			         	<input type="hidden" name="id" value="<?=$linha['id'];?>">
			         	<button class="btn btn-sm btn-warning" type="submit"> Alterar </button>
			         </form>

			         <form method="GET" action="/professor/deletarAtividade.php">
			         	<input type="hidden" name="idAtividade" value="<?=$linha['id'];?>">
			         	<button class="btn btn-sm btn-danger" type="submit"> Deletar </button>
			         </form>

			          </td>

			       </tr>

				<?php 
					
					} 
				?>
				
				<tr>
					<td colspan="3">
					<center>
						<a href="/professor/atividade.php"><button class="btn btn-sm btn-success"> Criar uma lista </button></a>
					</center>
					</td>
				</tr>
				
		</table>
		

</body>
</html>

