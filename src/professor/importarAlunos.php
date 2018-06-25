<?php 
  require ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');
  require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');
  require ($_SERVER["DOCUMENT_ROOT"].'/professor/carregarDadosAlunos.php');
  // require ($_SERVER["DOCUMENT_ROOT"].'/professor/selecionar_problemas.php');

  $IMG_PATH = $_SERVER["DOCUMENT_ROOT"] . "/img/";
  $id_professor = $_SESSION["id"];

  $file_alunos = $_FILES['file_alunos'];
  $nome_turma = $_POST['nome_turma'];
  $qtd_problemas = $_POST['qtd_problemas'];
  $max_tentativas = $_POST['max_tentativas'];
  $controle_tempo = $_POST['controle_tempo'];
  $tempo = $_POST['tempo'];
  $assuntos = $_POST['sel-assunto'];

  if(isset($_POST['btn-confirmar'])){
     $id_turma = salvarDadosAlunos($conexao, $file_alunos, $nome_turma, $id_professor, $qtd_problemas, $max_tentativas, $controle_tempo, $tempo, $assuntos);
  }

  function gerarSelectAssuntos($con){
    $sql = "SELECT id, descricao FROM Assunto";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $html_select = "<SELECT name ='sel-assunto[]' id='sel-assunt' multiple>";
    while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
      $html_select .= "<option value='$linha[id]' selected>$linha[descricao]</option>";
    }
    $html_select .= "</select>";
    return $html_select;
  }

  function exibirSituacao($situacao){
  	switch ($situacao) {
  		case '1':
  			return "Ativo";
  			break;
  		case '2':
  			return "Inativo";
  			break;
  		default:
  			return "Pendente";
  	}
  }

?>
<!DOCTYPE html>
<html lang="pt" >
	<head>
	  <meta charset="UTF-8">
	  <title>Code && Play - Listar Alunos</title>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
		<div class="table-users">
	  	<div class="header">Criação de Turma</div>

		<?php
		if (isset($_POST["btn-confirmar"])){
			$resultado = exibirDadosAlunos($conexao, $file_alunos, $nome_turma);
			$qtdAlunos = count($resultado);
		    if (isset($id_turma) && $qtdAlunos > 0){
		?>
  		<div class="table-users">
	      	<table cellspacing="0">
	      		<tr><td colspan="4">
	      			<div class="title1">Alunos cadastrados</div>
	      			<span class="title2">Nome da turma: <?=$nome_turma;?></span><br/>
	      			<span class="title2">Quantidade de alunos: <?=$qtdAlunos?></span>
	      			</td></tr>
	      		<tr>
		         	<th>Nome</th>
		         	<th>Matrícula</th>
		         	<th>E-mail</th>
	      		</tr>
				<?php

					foreach($resultado as $linha){ 
				?>
	      		<tr>
	         		<td><?=$linha[0];?></td>
	         		<td><?=$linha[1];?></td>
	         		<td><?=$linha[2];?></td>
	    		</tr>
		    	<?php 
			        }
		       	?>
		       	<tr>
		       		<td colspan="3">
	   					<form method="POST" action="gerar_atividades_aluno.php" class="title3">
	   						<input type="hidden" value="<?=$id_turma?>" name="id_turma">
	   						Deseja iniciar as atividades destes alunos?

	   						<button type="submit" id="btn-start" class="bt-ok">Clique aqui para iniciar</button>
	   					</form>
		       		</td>
		       	</tr>
			</table>
		</form>
		</div>
    	<?php 
    			} else { // turma criada sem alunos
    				?>
	  			<div class="title2">Turma criada sem alunos. Para adicionar alunos, <a href="/professor/cadastrarAluno.php">clique aqui</a>. </div>
    				<?php
    			}
	        } else {
       	?>  
  		<div class="table-users">
  			<form method="POST" enctype="multipart/form-data">
  			<fieldset>
			<legend>Dados da Turma</legend> 
			<table>
				<tr>
					<td width="30%">
					Nome da turma:</td>
					<td>
					<input type="text" name="nome_turma" id="nome_turma" required="required"> 
					</td>
				</tr>
				<tr>
					<td>
					Arquivo com dados dos alunos:
					<br/>(Formato CSV: matricula;nome;email;)
					</td>
					<td>
					<input type="file" name="file_alunos" id="file_alunos" >
					</td>
				</tr>
			</table>
			  <legend>Configuração dos problemas</legend> 
			<table>
				<tr>
					<td width="30%">			  
			  		Quantidade de problemas por assunto:
			  		</td>
			  		<td>
			  		<input type="number" name="qtd_problemas" required="required" value="6" max="6" min="1">
			  		</td>
			  	</tr>
			  	<tr>
			  		<td>Assuntos:</td>
			  		<td><?=gerarSelectAssuntos($conexao);?></td>
				</tr>
				<tr>
					<td>Máximo de tentativas por problema:</td>
					<td><input type="number" value="3" max="5" min="1"  name="max_tentativas"></td>
				</tr>
				<tr>
					<td>Controle de tempo:</td>
					<td><input type="radio" name="controle_tempo" value="1">Sim 
					<input type="radio" name="controle_tempo" value="0" checked="checked">Não </td>
				</tr>
				<tr>
					<td>Tempo para cada problema (minutos):</td>
					<td><input type="number" name="tempo" value="5"></td>
				</tr>
				<tr>
					<td colspan="2">
					<button class="bt-ok" id="btn-confirmar" name="btn-confirmar" type="submit">Criar Turma</button>
					</td>
				</tr>
			</table>
			</fieldset>
		</form>
	</div>
	<?php
	}
	?>
	</body>
</html>
<?php
// unset($_POST);
?>


