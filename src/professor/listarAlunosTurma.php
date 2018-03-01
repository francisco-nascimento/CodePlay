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
			$idTurma = $_GET["idturma"];
			$sql = "select * from Turma where id = ?";
			$stmt = $conexao->prepare($sql);
			$stmt->bindValue(1, $idTurma);
			$stmt->execute();




			$descTurma;
			

			foreach ($stmt as $key) {
				
				$descTurma = $key["desc_Turma"];
				

			}

			

			$idsProbBD;

			$sql = "select id_Aluno from Aluno_Turma where id_Turma = ?";
			$stmt = $conexao->prepare($sql);
			$stmt->bindValue(1, $idTurma);
			$stmt->execute();

		?>

		
		<br><br><br><br>
	
		<p>
			<?=$_GET["msg"];?>
		</p>
		
   		<fieldset class="default">
   		<legend>Alunos desta Turma</legend>
			<table border="1" class="table" cellspacing="0">
		


				<tr>
				<form method="GET" name="formDesc" action="/professor/descricaoTurma.php">
					<th colspan="2"> Descrição da Turma:
				
						<input type="hidden" name="idTurma" value="<?=$idTurma?>">
						<input type="text" name="descTurma" value="<?=$descTurma?>">
					</th>
					<th>
						<button type="submit" class="btn btn-warning btn-sm"> Alterar Descrição</button>
					</th>
				</form>


				</tr>
		
				<tr>
					<td>
						Nome do Aluno
					</td>
					<td>
						Matricula
					</td>
					<td>
						Opções
					</td>
				</tr>

				<?php 

				$sql = "select a.id, a.nome, a.matricula from Aluno as a right join Aluno_Turma as at on a.id = at.id_aluno where at.id_turma = ?";
				$stmt = $conexao->prepare($sql);
				$stmt->bindValue(1, $idTurma);
				$stmt->execute();

				foreach ($stmt as $key) {

				?>
				<tr>
					<td>
						<?=$key["nome"];?>
					</td>
					<td>
						<?=$key["matricula"];?>
					</td>
					<td>
						<form action="/professor/tirarAlunoTurma.php" name="formTirar" method="GET">
							<input type="hidden" name="idAluno" value="<?=$key['id']?>">
							<input type="hidden" name="descTurma">
							<input type="hidden" name="idTurma" value="<?=$idTurma?>">
							<button type="submit" class="btn btn-danger btn-sm"> Retirar Aluno	</button>
							   
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
						Nome
					</td>
					<td>
						Matricula
					</td>
					<td>
						Opções
					</td>
			</tr>
			<?php

			$sql = "select * from Aluno where id not in(select id_aluno from Aluno_Turma where id_turma = ?) and id_professor = ?";

			$stmt = $conexao->prepare($sql);
			$stmt->bindValue(1, $idTurma);
			$stmt->bindValue(2, $_SESSION["id"]);
			$stmt->execute();
			foreach ($stmt as $key) {

			?>
			<tr>
				
				<td>
					<?=$key["nome"]?>
				</td>
				<td>
					<?=$key["matricula"]?>
				</td>
				<td>
					<form action="/professor/inserirAlunoTurma.php" name="formInserir" method="GET">
						<input type="hidden" name="idAluno" value="<?=$key["id"]?>">
						<input type="hidden" name="idTurma" value="<?=$idTurma;?>">
						<input type="hidden" name="descTurma">
						
						<button type="submit" class="btn btn-success btn-sm"> Adicionar Aluno	</button>
					</form>
					
				</td>
			</tr>
			<?php 
			}
			?>
			

		</table>
		
		

</body>
</html>