<?php

	require ('../verifica.php');
	require ('../conexao.php');
			
?>
<!DOCTYPE html>
<html>
<head>
	<title>Code && Play - Listar Atividades</title>
</head>
<body>

	
		
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
			         <form method="GET" action="listarProblemasAtividade.php">
			         	<input type="hidden" name="idAtividade" value="<?=$linha['id'];?>">
			         	<button class="btn" type="submit"> Alterar </button>
			         </form>

			         <form method="GET" action="deletarAtividade.php">
			         	<input type="hidden" name="idAtividade" value="<?=$linha['id'];?>">
			         	<button class="btn btn-sm btn-danger" type="submit"> Deletar </button>
			         </form>

			         <form method="GET" action="exibirLiberarAtividade.php">
			         	<input type="hidden" name="idAtividade" value="<?=$linha['id'];?>">
			         	<button class="btn btn-sm btn-primary" type="submit"> Liberar para turma </button>
			         </form>

			          </td>

			       </tr>

				<?php 
					
					} 
				?>
				
				<tr>
					<td colspan="3">
					<center>
						<a href="atividade.php"><button class="btn btn-sm btn-success"> Criar uma lista </button></a>
					</center>
					</td>
				</tr>
				
		</table>
		

</body>
</html>

