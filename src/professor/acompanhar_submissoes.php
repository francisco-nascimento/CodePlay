<?php 
  require ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');
  require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');

	require ($_SERVER["DOCUMENT_ROOT"].'/aluno/areaAluno.php');
	require ($_SERVER["DOCUMENT_ROOT"].'/aluno/AreaAlunoDAO.php');

  const IMG_PATH = "../img/";

	$alunoDAO = new AlunoDAO($conexao);
	$situacaoItemDAO = new SituacaoItemBlocoDAO($conexao);
	$itemBlocoDAO = new ItemBlocoDAO($conexao);
	$respostaAlunoDAO = new RespostaAlunoDAO($conexao);

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

  function gerarSelectTurmas($con){
  	$id_selected = $_POST['pesq-turma'];
    $turmaDAO = new TurmaDAO($con);
    $turmas = $turmaDAO->listAll();
    $html_select = "<SELECT name ='pesq-turma' id='pesq-turma' readonly=true>";
    $html_select .= "<option value='-1'>Selecione uma turma</option>";
    foreach($turmas as $turma){
      $idTurma = $turma->id;
      $nomeTurma = $turma->desc_Turma;
      $nomeProfessor = $turma->nome;
      $checked = '';
      if($id_selected === $idTurma){
      	$checked = "selected";
      }
      $html_select .= "<option $checked value='$idTurma'>$nomeTurma ($nomeProfessor)</option>";
    }
    $html_select .= "</select>";
    return $html_select;
  }

  function gerarSelectAssuntos($con){
  	$id_selected = $_POST['pesq-assunto'];
    $assuntoDAO = new AssuntoDAO($con);
    $assuntos = $assuntoDAO->listAll();
    $html_select = "<SELECT name ='pesq-assunto' id='pesq-assunto' readonly=true>";
    $html_select .= "<option value='-1'>Selecione um assunto</option>";
    foreach($assuntos as $assunto){
      $idAssunto = $assunto->id;
      $descricao = $assunto->descricao;
      $checked = '';
      if($id_selected === $idAssunto){
      	$checked = "selected";
      }
      $html_select .= "<option $checked value='$idAssunto'>$descricao</option>";
    }
    $html_select .= "</select>";
    return $html_select;
  }

  if (isset($_POST['btn-salvar-feedback'])){
  	$id_resposta = $_POST['id_resposta'];
  	$avaliacao = $_POST['avaliacao'];
  	

  	$resposta = $respostaAlunoDAO->getById("RespostaAluno", $id_resposta);
  	$situacao = $resposta->situacao;
  	$aluno = $resposta->aluno;
  	$id_aluno = $aluno->id;

  	// status atual ERRO
  	if ($situacao->status == 5 || $situacao->status == 3) {
  		if ($avaliacao == 1){
	 		$situacao->registrarAvaliacao(true);
	 		$resposta->resposta_correta = 1;

			$itemBloco = $itemBlocoDAO->getByAlunoProblema($id_aluno, $resposta->problema->id);

			$nova_pontuacao = $aluno->pontuacao + $resposta->pontuacao_possivel;

			$alunoDAO->update($aluno->id, $nova_pontuacao);

			$id_assunto = $itemBloco->bloco->assunto->id;
			$ordem = $itemBloco->ordem;

			$itemBlocoDAO->createNextProblem($aluno->id, $id_assunto, $ordem);
		} else {
			$resposta->resposta_correta = -1;
	 		$situacao->registrarAvaliacao(false);			
		}
  	}
  	$resposta->feedback = $_POST['feedback'];
  	$respostaAlunoDAO->update($resposta);
  	$situacaoItemDAO->update($situacao);

  }
?>

<!DOCTYPE html>
<html lang="pt" >
	<head>
		<meta charset="UTF-8">
		<title>Code && Play - Acompanhar submissões</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"> 
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			
    		$('button#btn-filtrar').click(function(){
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
		<br>
		<div class="table-users">
	  	<div class="header">Filtrar submissões</div>
		<div class="table-users">
			<form method="POST">
				<table>
					<tr>
						<td>
							<label>Turma: </label>
							<?=gerarSelectTurmas($conexao);?>
							<BR/>
							<label>Assunto: </label>
							<?=gerarSelectAssuntos($conexao);?>
							<BR/>							
							<label>Situação da submissão: </label>
						</td>
					</tr>
					<tr>
						<td >
						<button class="bt-ok" name="btn-filtrar" id="btn-filtrar" value="1">Filtrar</button>
						</td>
					</tr>
				</table>
			</form>
		</div>
		<?php
		if (isset($_POST["pesq-assunto"])){
			$id_assunto = $_POST['pesq-assunto'];
			$id_turma = $_POST['pesq-turma'];

			$resultado = $alunoDAO->pesquisarAlunos(NULL, $_POST["pesq-turma"]);
		?>
  		<div class="table-users">
	      	<table cellspacing="0">
	      		<tr class="title2">
		         	<td>Nome</td>
		         	<?php 
		         		for($i = 1; $i <= MAX_ORDEM; $i++){
		         			echo "<td>P$i</td>";
		         		}
		         	?>
	      		</tr>
				<?php

					foreach($resultado as $aluno){ 

						$situacoes = $situacaoItemDAO->getByAlunoAssunto($aluno->id, $id_assunto);
				?>
	      		<tr>
	         		<td><?=$aluno->nome;?></td>
	         		<?php
	         			for ($i = 0; $i < MAX_ORDEM; $i++) {

	         				$situacao = $situacoes[$i];
	         				if(isset($situacao)){
		            			$sufixoImg = NULL;
		            			switch ($situacao->status) {
		            			 	case 0:
		            			 	case 1:
		            			 		$sufixoImg = 'wait';
		            			 		break;
		            			 	case 2:
		            			 		$sufixoImg = 'correct';
		            			 		break;
		            			 	case 3:
		            			 	case 4:
		            			 		$sufixoImg = 'error';
		            			 		break;
		            			 	case 5:
		            			 		$sufixoImg = 'toeval';
		            			 		break;
		            			 	default:
		            			 		break;
		            			}
		            			$name_img = IMG_PATH . "icon-" . $sufixoImg . ".png";
			            	?> 		
			            		<td>
			   <a href="analisar_respostas.php?id_sit=<?=$situacao->id?>&id_ass=<?=$id_assunto?>&id_tur=<?=$id_turma?>">	<img src="<?=$name_img?>" class="icone">	
			   </a>
				</td>
							<?php     				
		         			} else {
		         				echo "<td>&nbsp;</td>";
		         			}
		         		}
		         	?>
<!-- 	         		<td><?=exibirSituacao($aluno->situacao)?></td>
	         		<td>
	         			<button id="btn-editar" value="<?=$linha['id']?>">
	         			<img src="../img/icone-editar.png" class="icone">
	         			</button>
	           			<button id="btn-remover" value="<?=$linha['id']?>">
	         				<img src="../img/icone-remover.png" class="icone">
	         			</button>
	       			</td>
 -->	    		</tr>
		    	<?php 
			        }
		       	?>  
			</table>
		</div>
    	<?php 
	        }
       	?>  
	</body>
</html>
