<!DOCTYPE html>
<html>
<head>
	<title>Problemas a responder</title>
</head>
<body>

	<?php

			require ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');
			$idAtividade = $_GET["id"];
			$sql = "select * from Atividade where id = ?";
			$stmt = $conexao->prepare($sql);
			$stmt->bindValue(1, $idAtividade);
			$stmt->execute();

			$descAtividade;
			

			foreach ($stmt as $key) {
				
				$descAtividade = $key["desc_Atividade"];
				

			}

			
			

		?>

		
		<br><br><br><br>
		<form method="POST" action="/professor/inserirAtividade.php">
		<input type="hidden" name="idAtividade" value="<?=$idAtividade;?>">
		<table border="1" class="table">

				<tr>
					<td>Descrição Da atividade: <br> <input type="text" name="descAtividade" value="<?=$descAtividade;?>"></td>


				</tr>
		
				<tr>
					<td>
						Descrição do problema
					</td>
					<td>
						Classificação do Problema
					</td>
					<td>
						Marcar
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
			        <p>Marque esse problema: </p>
			         <input type="checkbox" name="idsProb[]" value="<?=$linha['id'];?>">

			          </td>

			       </tr>

				<?php 
					//$count = $count + 1;
					} 

				?>
				<tr>
					<td colspan="3">
					<center>
					
						<button type="submit"> Enviar Alterações</button>
					</center>
					</td>
				</tr>
			</form>
				
		</table>
		

</body>
</html>

