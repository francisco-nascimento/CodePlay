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
	
		
   		<fieldset class="default">
   		<legend>Problemas já cadastrados</legend>
<<<<<<< HEAD
			<table border="1" cellspacing="0">
=======
<<<<<<< HEAD
			<table border="1" cellspacing="0">
=======
			<table border="1" class="table" cellspacing="0">
>>>>>>> Wesley
>>>>>>> 278f2521d59d0cd2a5955ea54ab44e9259316153
		


				<tr>
				<form method="GET" action="/professor/descricao.php">
					<th colspan="2"> Descrição da Atividade:
				
						<input type="hidden" name="idAtividade" value="<?=$idAtividade?>">
						<input type="text" name="descAtividade" value="<?=$descAtividade?>">
					</th>
					<th>
						<input type="submit" value="Alterar Descrição">
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
							<input type="submit" value="Retirar Problema">	
						</form>
						
					</td>
				</tr>
				<?php 
				}
				?>

			
			
			</table>
			</fieldset>
		
			</center>

<<<<<<< HEAD
		<table border="1">
=======
<<<<<<< HEAD
		<table border="1">
=======
		<table border="1" class="table">
>>>>>>> Wesley
>>>>>>> 278f2521d59d0cd2a5955ea54ab44e9259316153
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
<<<<<<< HEAD
						<input type="hidden" name="descAtividade" value="<?=$descAtividade;?>">
=======
<<<<<<< HEAD
						<input type="hidden" name="descAtividade" value="<?=$descAtividade;?>">
=======
						
>>>>>>> Wesley
>>>>>>> 278f2521d59d0cd2a5955ea54ab44e9259316153
						<input type="submit" value="Adicionar Problema">
					</form>
					
				</td>
			</tr>
			<?php 
			}
			?>
			

		</table>
		
		

</body>
</html>