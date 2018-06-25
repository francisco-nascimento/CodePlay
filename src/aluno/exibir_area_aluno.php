<?php 
  require ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');
  require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');
  require ($_SERVER["DOCUMENT_ROOT"].'/professor/carregarDadosAlunos.php');

  $IMG_PATH = "../img/";
  $paginaResponderProblema = "responderProblema.php";

  $id_usuario = $_SESSION["id"];
  $alunoDAO = new AlunoDAO($conexao);
  $areaAlunoDAO = new AreaAlunoDAO($conexao);
  $itemBlocoDAO = new ItemBlocoDAO($conexao);

  $config_session = unserialize($_SESSION["config"]);
  $MAX_ORDEM = intval($config_session->numero_problemas_fase);
  $qtdProblemas = $config_session->numero_problemas_fase * count($config_session->assuntos);
  
  $aluno = $alunoDAO->getById("Aluno", $id_usuario);
  $area_atual = $areaAlunoDAO->getByAluno($id_usuario);
  
  function getURLVideoExemplo($id_assunto){
  	switch ($id_assunto) {
  		case 1: 
  			$url = "https://www.youtube.com/embed/wCFV-VqbQug";
  			break;
  		case 2:
  			$url = "https://www.youtube.com/embed/2YXenHCQhrQ";
  			break;
  		case 3:
  			$url = "";
  			break;		
  		default:
  			$url = "";
  			break;
  	}
  	return $url;
  }

?>

<!DOCTYPE html>
<html lang="pt" >
	<head>
	  <meta charset="UTF-8">
	  <title>Code && Play - Listar Alunos</title>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">
	  $(function() {
    $(".video").click(function () {
      var theModal = $(this).data("target"),
      videoSRC = $(this).attr("data-video"),
      videoSRCauto = videoSRC + "?modestbranding=1&rel=0&controls=2&showinfo=0&html5=1&autoplay=1&playsinline=0";
      $(theModal + ' iframe').attr('src', videoSRCauto);
      $(theModal + ' button.close').click(function () {
        $(theModal + ' iframe').attr('src', videoSRC);
      });
    });
  });

</script>
</head>
	<body>
		<br>
		<div class="table-users">
	  	<div class="header">Área do aluno</div>

	  	<?php
	  	   if ($area_atual){
	  	?>

		<div class="table-users">
				<table>
				 <?php
				 // desativando a obrigatoriedade de alterar senha
//					if (strcmp($aluno->situacao, "0") == 0){
				 ?>
<!-- 			        <tr>
			           <th class="title2">
			           	Antes de iniciar, é necessário alterar a senha. <br/>
			           	<a href="/aluno/alterar_senha.php">Alterar senha</a>
			           </th>
			       </tr>
 -->
			       <?php
//			   		} else if (strcmp($aluno->situacao, "2") == 0){
				?>
<!-- 				<iframe src="https://docs.google.com/forms/d/e/1FAIpQLSd1Xi7fA8G0yudzEhRXoMwD_ofGXHWTA1F9niYyYz8FcFL_Ag/viewform?embedded=true" width="700" height="300" frameborder="0" marginheight="0" marginwidth="0" onsubmit="javascript:alert('submit... ');">Carregando…</iframe> -->
				<?php
//					} else {
						$fase = 1;
				?>
				<tr>
				 	<td class="title2">Fase <?=$fase++;?>: Pesquisa inicial - <a href="https://goo.gl/forms/OfMXaaykGuVTEHL92" target="_blank">Clique aqui para responder</a>
				 	</td>
				</tr> 

				<?php

				    $blocos = $area_atual->blocos;
				    $numProblemas = 0;

				    foreach ($blocos as $bloco) {
				    	$assunto = $bloco->assunto;
				    	if ($aluno->nivel < $numProblemas) {
				    		break;
				    	}

				    	
				 ?>
				 <!-- Bloco da area  -->
		          <tr>
		            <th class="title2">Fase <?=$fase++;?>: <?=$assunto->descricao?>
		            &nbsp;&nbsp;
		            <?php $url = getURLVideoExemplo($assunto->id);
		            if ($url !== '') { 
		            ?>
				  <button class="title2 video" data-video="<?=getURLVideoExemplo($assunto->id)?>" data-toggle="modal" data-target="#videoModal<?=$assunto->id?>">Exemplo <?=$assunto->id?></button>
				  <div class="modal fade" id="videoModal<?=$assunto->id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				    <div class="modal-dialog">
				      <div class="modal-content">
				        <div class="modal-body">
				          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				          <iframe width="100%" height="315" frameborder="0"  src="" allowFullScreen></iframe>
				        </div>
				      </div>
				    </div>
				  </div>
				
				  	<?php
					} // if url
					?>
		            </th>
		          </tr>
		          <tr>
		            <td align="middle" valign="center">
		            	<?php 
		            	//var_dump($bloco);
		            		$itensBloco = $itemBlocoDAO->getByBloco($bloco->id);
		            		for ($i = 1; $i <= $MAX_ORDEM; $i++){
		            		// foreach ($itensBloco as $item) {

		            			$item = $itensBloco[$i-1];
		            			if (isset($item)){
			            			$ordem = $item->ordem;
			            			$status = $item->situacao->status;
			            			$id_problema = $item->id_problema;
			            			$pontosProblema = $item->situacao->pontuacao_possivel; 
			            			$urlPaginaResponder = $paginaResponderProblema . "?id=" . $id_problema;
			            		} else {
			            			$status = 0;
			            			$ordem = $i;
			            			$pontosProblema = 0;
			            		}

		            			$sufixoImg ='';
		            			switch ($status) {
		            			 	case 0:
		            			 		$sufixoImg = '-off';
		            			 		$urlPaginaResponder = '';
		            			 		break;
		            			 	case 1:
		            			 		$sufixoImg = '-on';
		            			 		break;
		            			 	case 2:
		            			 		$sufixoImg = '-ok';
		            			 		$urlPaginaResponder = '';
		            			 		break;
		            			 	case 3:
		            			 		$sufixoImg = '-notok';
		            			 		break;
		            			 	case 4:
		            			 		$sufixoImg = '-cancel';
		            			 		$urlPaginaResponder = '';
		            			 		break;
		            			 	case 5:
		            			 		$sufixoImg = '-wait';
		            			 		//$urlPaginaResponder = '';
		            			 		break;
		            			 	default:
		            			 		break;
		            			} 
		            			$nomeImagem = $IMG_PATH . "icon-" . $ordem . $sufixoImg . ".png";
		            			$idImagem = "problema" . $numProblemas++;
		            			?>
		            			<a href="<?=$urlPaginaResponder?>">
		            				<span class="icone2">
		            					<span class="hint"><?=$pontosProblema?> pts</span>
			            				<img src="<?=$nomeImagem?>">
		            				</span>
		            			</a>
		            			<?php
		            		} // for - itens bloco
		            	?>
		          </tr>
		          <?php
				    	
				    } // for blocos
				    if ($aluno->nivel >= $qtdProblemas) {
		          ?>
		          <tr>
				 	<td class="title2">Fase <?=$fase++;?>: Pesquisa Final - <a href="https://goo.gl/forms/EXI5xa7WMIlebUvS2" target="_blank">Clique aqui para responder</a>
				 	</td>
				 </tr> 
				 <?php
				 	}
				 ?>

				</table>
		</div>
		<?php
			// } // fim do if de alterar senha -- alterar senha comentado
		} else {
			?>
			<div class="title2">Não há problemas liberados para você. Fale com o professor. </div>
			<?php
		}
		?>
    	</div>  

	</body>
</html>