<!DOCTYPE html>
<html>
<head>
	<title>Problemas a responder</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
	<style type="text/css">
		.containerEU {
  			flex-direction: row | row-reverse | column | column-reverse;
		}
	</style>
</head>
<body>

	<?php

			require ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');
			require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');
			$idAtividade = $_GET["idAtividade"];
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
	
		<p>
			<?=$_GET["msg"];?>
		</p>
		
   		<fieldset class="default">
   		<legend>Problemas já cadastrados</legend>

			
			<table border="1" class="table" cellspacing="0">
				<tr>
				<form method="GET" action="/professor/descricao.php">
					<th colspan="2"> Descrição da Atividade:
				
						<input type="hidden" name="idAtividade" value="<?=$idAtividade?>">
						<input type="text" name="descAtividade" value="<?=$descAtividade?>">
					</th>
					<th>
						<button type="submit" class="btn btn-warning btn-sm"> Alterar Descrição</button>
					</th>
				</form>


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

				$sql = "select p.id, p.desc_Problema, p.classificacao from Problema as p right join Problema_Atividade as pa on p.id = pa.id_Problema where pa.id_atividade = ?;";
				$stmt = $conexao->prepare($sql);
				$stmt->bindValue(1, $idAtividade);
				$stmt->execute();

				foreach ($stmt as $key) {

				?>
				<tr>
					<td>
						<?=$key["desc_Problema"];?>
					</td>
					<td>
						<?=$key["classificacao"];?>
					</td>
					<td>
						<form action="/professor/tirarProblemaAtividade.php" method="GET">
							<input type="hidden" name="idProblema" value="<?=$key['id']?>">
							<input type="hidden" name="idAtividade" value="<?=$idAtividade?>">
							<button type="submit" class="btn btn-danger btn-sm"> Retirar Problema	</button>
							   
						</form>
						
					</td>
				</tr>
				<?php 
				}
				?>

			
			
			</table>
			</fieldset>
		
			</center>
		<table border="1" class="table">


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
			$sql = "select * from Problema where id not in(select id_problema from Problema_Atividade  where id_atividade = ?);";

			$stmt = $conexao->prepare($sql);
			$stmt->bindValue(1, $idAtividade);
			$stmt->execute();
			foreach ($stmt as $key) {

			?>
			<tr>
				
				<td>
					<?=$key["desc_Problema"]?>
				</td>
				<td>
					<?=$key["classificacao"]?>
				</td>
				<td>
					<form action="/professor/inserirAtividade.php" method="GET">
						<input type="hidden" name="idProb" value="<?=$key["id"]?>">
						<input type="hidden" name="idAtividade" value="<?=$idAtividade;?>">
						<button type="submit" class="btn btn-success btn-sm"> Adicionar Problema	</button>
					</form>
					
				</td>
			</tr>
			<?php 
			}
			?>
			

		</table>
		
		

</body>
</html>