<?php 
  require ('../verifica.php');
  require ('../conexao.php');

	require ('../aluno/areaAluno.php');
	require ('../aluno/AreaAlunoDAO.php');

  const IMG_PATH = "../img/";
?>
<!DOCTYPE html>
<html lang="pt" >
	<head>
		<meta charset="UTF-8">
		<title>Code && Play - Analisar respostas dos alunos</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"> 
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			
    		$('btn-voltar').click(function(){
        		if ($('#pesq-turma').val() == '-1'){
        			alert('Selecione uma turma');
        			return false;
        		}
        		if ($('#pesq-assunto').val() == '-1'){
        			alert('Selecione um assunto');
        			return false;
        		}  
        		this.submit();
    		});    		
		});
	</script>
	  	
	</head>
	<body>
		<?php
		$id_situacao = $_GET['id_sit'];

		if (isset($id_situacao)){

			$respostaDAO = new RespostaAlunoDAO($conexao);
			$gabaritoDAO = new GabaritoDAO($conexao);

			$respostas = $respostaDAO->getBySituacaoItem($id_situacao);
			$id_aluno = $respostas[0]->aluno->id;
			$problema = $respostas[0]->problema;
        	$gabarito = $gabaritoDAO->getByProblema($problema->id);

		?>
		<div class="table-users">
			<div class="title2">
				Aluno: <?=$respostas[0]->aluno->nome?><br/>					Assunto: <?=$problema->assunto->descricao?>
			</div>
			<div class="title3">
				Problema: <?=$problema->desc_Problema?> <br/>
				<pre class="code-gab"><?=$gabarito->desc_Gabarito?></pre>
			</div>
  			<div class="table-users">
	      	<table cellspacing="0">
	      		<?php
	      		foreach($respostas as $resposta){ 
	      			$status = $resposta->resposta_correta;
	      			$checkedSim = $status == 1 ? "checked" : "";
	      			$checkedNao = $status == -1 ? "checked" : "";
	      			$disabled = $status == 0 ? "" : "disabled='true'";
	      		?>
		        <tr>
		        	<th colspan="2">
		        		Resposta enviada em <?=$resposta->data_Alteracao?>
		        		<br/>
		        		Valendo: <?=$resposta->pontuacao_possivel?> pontos
		        	</th>
	      		</tr>
	      		<tr>
		        	<td colspan="2">
		        		<pre class="code-resp"><?=$resposta->desc_resposta?></pre>
		        	<form method="POST" action="acompanhar_submissoes.php">
		        		<input type="hidden" name="id_resposta" value="<?=$resposta->id?>">
	       				<input type="hidden" name="pesq-assunto" value="<?=$_GET['id_ass']?>">
	       				<input type="hidden" name="pesq-turma" value="<?=$_GET['id_tur']?>"">
		        	<table>
		        		<tr>
		        			<td>
		       			Solução correta? <br/>
		       			<input type="radio" name="avaliacao" value="1" <?=$checkedSim?> <?=$disabled?>> Sim 
		       			&nbsp;&nbsp;&nbsp;&nbsp;
		       			<input type="radio" name="avaliacao" value="0" <?=$checkedNao?> <?=$disabled?>> Não
		       			<br/>
		       			<button class="btn btn-sm btn-success" name="btn-salvar-feedback" value="1">Salvar</button>
		       			</td>
		       			<td>Feedback: <br/>
		       				<textarea rows="3" cols="50" <?=$disabled?>><?=$resposta->feedback?></textarea>
		       			</td>
		       			</tr>
		       		</table>
		       		</form>
		       	</tr>
		    	<?php 
			        }
		       	?>  
		       	<tr>
		       		<td>
		       			<form method="POST" action="acompanhar_submissoes.php">
		       				<input type="hidden" name="pesq-assunto" value="<?=$_GET['id_ass']?>">
		       				<input type="hidden" name="pesq-turma" value="<?=$_GET['id_tur']?>"">
		       				<button type="submit" class="bt-ok">
		       					<img class="icone" src="<?=IMG_PATH?>icon-seta-back2.png"> 
		       				Voltar</button>
		       			</form>
		       		</td>
		       	</tr>
			</table>
		</div>
	</div>
    	<?php 
	        }
       	?>  
	</body>
</html>
