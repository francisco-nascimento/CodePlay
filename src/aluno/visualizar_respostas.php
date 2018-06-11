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
		<title>Code && Play - Visualizar respostas</title>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"> 
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<style type="text/css" media="all">
#box-toggle {
	width:500px;
	margin:0 ;
	text-align:justify;
	font:12px/1.4 Arial, Helvetica, sans-serif;
	}
#box-toggle .tgl {margin-bottom:30px;}
#box-toggle span {
	display:block;
	cursor:pointer;
	font-weight:bold;
	font-size:14px;
	color:#c30;
	margin-top:15px;
	}
</style>

	<script type="text/javascript">
		jQuery.fn.toggleText = function(a,b) {
		return   this.html(this.html().replace(new RegExp("("+a+"|"+b+")"),function(x){return(x==a)?b:a;}));
		}

		$(document).ready(function(){
			$('.tgl').before('<span>'+ $('#assunto1').html() + '</span>');
			$('.tgl').css('display', 'none')
			$('span', '#box-toggle').click(function() {
				$(this).next().slideToggle('slow')
				.siblings('.tgl:visible').slideToggle('fast');

				$(this).toggleText('Exibir','Esconder')
				.siblings('span').next('.tgl:visible').prev()
				.toggleText('Exibir','Esconder')
			});
		})
	</script>
	  	
	</head>
	<body>
  			<div class="table-users">
	      	<table cellspacing="0">

		<?php
		$assuntoDAO = new AssuntoDAO($conexao);
		$assuntos = $assuntoDAO->listAll();

		$respostaDAO = new RespostaAlunoDAO($conexao);
		$situacaoItemDAO = new SituacaoItemBlocoDAO($conexao);

		foreach ($assuntos as $assunto) {
		?>
			<tr>
				<td class="title2" colspan="2">
				Assunto: <?=$assunto->descricao?>
				</td>
			</tr>
		<?php 
			$situacoes = $situacaoItemDAO->getByAlunoAssunto($_SESSION["id"], $assunto->id);
			$i = 1;

			foreach ($situacoes as $situacao) {
				
				$respostas = $respostaDAO->getBySituacaoItem($situacao->id);

				if (isset($respostas) && count($respostas) > 0){
					$problema = $respostas[0]->problema;
				?>
					<tr>
						<td class="title3" colspan="2">
						Problema <?=$i++?>: <?=$problema->desc_Problema?>
						</td>
					</tr>
				<?php
					foreach($respostas as $resposta){
				?>
					<tr>
						<td class="title2">
						Resposta enviada
						</td>
						<td class="title2">
						Análise do professor
						</td>
					</tr>
					<tr>
						<td>
						Resposta enviada em <?=$resposta->data_Alteracao?>
						<pre class="code-resp"><?=$resposta->desc_resposta?></pre>
						</td>
						<td>
							<pre class="code-gab">Feedback: <?=$resposta->feedback?><br/>
Solução correta? <?=$resultado?><br/>
Pontuação: <?=$resposta->pontuacao_obtida?></pre>
						</td>
					</tr>

				<?php
					}
				}
			}
		}
		?>
			</table>
	</div>
	</body>
</html>
