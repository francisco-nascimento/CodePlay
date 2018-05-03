


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

			$sql = "select count(*) as problemas from Problema_Atividade where id_atividade = ?";
			$stmt = $conexao->prepare($sql);
			$stmt->bindValue(1, $idAtividade);
			$stmt->execute();

			$problemasAtv = 0;
			foreach ($stmt as $key) {
				$problemasAtv = $key["problemas"];
			}


						$sql2 = "select id_Problema from Problema_Atividade_Respondido where id_Aluno = ? and id_Atividade = ?";
						$stmt2 = $conexao->prepare($sql2);
						$stmt2->bindValue(1, $_SESSION["id"]);
						$stmt2->bindValue(2, $_GET["idAtividade"]);
						$stmt2->execute();

						$count = 0;

						$idsRespondidos;

						foreach ($stmt2 as $key2) {

							$idsRespondidos[$count] = $key2["id_Problema"];
							$count += 1;

						}
							
							
					?>

		
		<br><br><br><br>
	
		<p>
			<?=$_GET["msg"];?>
		</p>
   		
   		<table class="table responsive-table" border="1">

   			<tr>
   				
				
					<th colspan="2">
						<center>
						 	Descrição da Atividade: <?=$descAtividade;?>
						</center>
					</th>
				
				

				</tr>

   		<tr>
   			<th>Problemas nesta atividade:</th>
   		</tr>
   		<tr>
   			<td>
			<table class="table">

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

					<?php

						$cont = 0;
						$iguais = 0;
						
							foreach ($idsRespondidos as $linha) {
								if ($linha[$cont] == $key['id']) {

									$iguais = 1;
									

								}else{

									$cont = $cont + 1;

								}
							}

							if ($iguais == 1) {
								echo "<td> Problema Respondido! </td>";
							}else{

					?>

					<td>
						<form action="/aluno/responderProblemaAtividade.php" method="GET">
							<input type="hidden" name="idProblema" value="<?=$key['id']?>">
							<input type="hidden" name="idAtividade" value="<?=$idAtividade?>">
							<button type="submit" class="btn btn-danger btn-sm"> Responder Problema	
							</button>
							   
						</form>
					</td>

					<?php
					
					}

					
					
						

					?>
				
					
					
				</tr>
				<?php
			}

				?>

			
			
			</table>
			</center>
			</td>
				</table>
			</td>
		</tr>
		</table>
		

</body>
</html>