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

		
		<br><br>

		<?php

			if ($_GET["msg"] != null && strcmp($_GET["msg"], "") != 0) {
		?>

		<h3>
			<?=$_GET["msg"];?>
		</h3>

		<?php

		}

		?>

		<table border="1" class="table">
		<form action="/professor/criarAtividades.php" name="formulario" method="GET" onsubmit="return verificaChecks()">

			<tr>
				<th colspan="2">
					<label>Desctição para a atividade: </label>
					<input maxlength="50000" required="required" type="text" name="descAtividade">
				</th>
				<th>
				<p>
					* Insira de 1 a 10 problemas na sua atividade.
				</p>
					
				</th>
			</tr>
		
		
				<tr>
					<td>
						Descrição
					</td>
					<td>
						Ultima alteração
					</td>
					<td>
						Marcar
					</td>
				</tr>

				
				<?php
					
					

				   $resultado = $conexao->prepare("select * from Problema where id_Professor = ?");
				   $resultado->bindValue(1, $_SESSION["id"]);
				   $resultado->execute();

				  foreach($resultado as $linha){ 

				?>
			      <tr>
			         
			         <td><?=$linha['desc_Problema'];?></td>
			         <td><?=$linha['data_Alteracao'];?></td>
			         <td> 

			         <input type="checkbox" name="idsProb[]" value="<?=$linha["id"];?>">

			          </td>

			       </tr>

				<?php 
					
					} 
				?>
				<tr>
					<td colspan="3">
					<center>
						<button class="btn btn-sm btn-success" type="submit">
							Criar Atividade
						</button>
					</center>
					</td>
				</tr>
				</form>
				
		</table>
		

</body>
</html>

