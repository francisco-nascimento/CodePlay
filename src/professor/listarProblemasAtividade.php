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

			

			$idsProbBD;

			$sql = "select id_problema from Problema_Atividade where id_atividade = ?";
			$stmt = $conexao->prepare($sql);
			$stmt->bindValue(1, $idAtividade);
			$stmt->execute();


			$count = 0;
			foreach ($stmt as $key) {
				

				$idsProbBD[$count] = $key["id_problema"];
				$count = $count + 1;
			}

			

			
			

		?>

		
		<br><br><br><br>
		
		
		<table border="1" class="table">
		<form method="POST" action="/professor/inserirAtividade.php">
			<input type="hidden" name="idAtividade" value="<?=$idAtividade;?>">

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

				<center>
			<table class="table" border="1">
				<fieldset>
					<legend>Problemas cadastrados nessa atividade</legend>

			<?php 

				

					$sql = "select * from Problema left join Problema_Atividade on Problema.id = Problema_Atividade.id_problema where Problema_Atividade.id_atividade > 0;";
					$resultadoPA = $conexao->prepare($sql);
					
					$resultadoPA->execute();

					foreach ($resultadoPA as $chave) {
				?>
				<tr>
			         
			         <td><?=$chave['desc_Problema'];?></td>
			         <td><?=$chave['classificacao'];?></td>
			         <td> 
			        <p>Marque esse problema: </p>
			        <form action="/professor/tirarProblemaAtividade.php" method="POST">
			        	<input type="hidden" name="idProblema" value="<?=$chave['id'];?>">
			        	<input type="hidden" name="idAtividade" value="<?=$idAtividade;?>">
			        	<input type="submit" value="Deletar Problema Dessa Atividade">
			        </form>

			          </td>

			       </tr>

				<?php
					}
				?>

			</fieldset>

			</table>
			</center>

				
		
		

</body>
</html>

