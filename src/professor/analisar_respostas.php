<?php 
  require ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');
  require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');

	require ($_SERVER["DOCUMENT_ROOT"].'/aluno/areaAluno.php');
	require ($_SERVER["DOCUMENT_ROOT"].'/aluno/AreaAlunoDAO.php');

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
		?>
		<div class="table-users">
			<div class="title2">
				Aluno: <?=$respostas[0]->aluno->nome?><br/>
				Assunto: <?=$respostas[0]->problema->assunto->descricao?><br/>
			</div>
  			<div class="table-users">
	      	<table cellspacing="0">
	      		<?php
	      		foreach($respostas as $resposta){ 
	      			$status = $resposta->situacao->status;
	      			$checkedSim = $status == 2 ? "checked" : "";
	      			$checkedNao = $status == 3 ? "checked" : "";
	      			$disabled = $status == 2 ? "disabled='true'" : "";
	      		?>
	      		<tr class="title2">
		        	<td colspan="2">
		         		Problema: <?=$resposta->problema->desc_Problema?>
		        	</td>
		        </tr>
		        <tr>
		        	<th>Gabarito</th>
		        	<th>Resposta do aluno</th>
	      		</tr>
	      		<tr>
		        	<td width="50%" align="left">
		        	<?php
		        	$gabarito = $gabaritoDAO->getByProblema($resposta->problema->id);
		        	?>
		        	<pre class="code"><?=$gabarito->desc_Gabarito?></pre>
		        	</td>
		        	<td align="left">
		        		<pre class="code"><?=$resposta->desc_resposta?></pre>
		        	</td>
		        </tr>
		        <tr>
		        	<form method="POST">
		        		<input type="hidden" name="id_situacao" value="<?=$id_sit?>">
		        		<input type="hidden" name="id_aluno" value="<?=$id_aluno?>">
		       		<th>
		       			Solução correta? <br/>
		       			<input type="radio" name="avaliacao" value="1" <?=$checkedSim?> <?=$disabled?>> Sim 
		       			&nbsp;&nbsp;&nbsp;&nbsp;
		       			<input type="radio" name="avaliacao" value="0" <?=$checkedNao?> <?=$disabled?>> Não
		       			<br/>
		       			<button class="btn btn-sm btn-success" name="btn-salvar-feedback">Salvar</button>
		       		</th>
		       		<th>Feedback: <br/>
		       			<textarea rows="3" cols="50"></textarea>
		       		</th>
		       		</form>
		       	</tr>
		    	<?php 
			        }
		       	?>  
		       	<tr>
		       		<td colspan="2">
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
