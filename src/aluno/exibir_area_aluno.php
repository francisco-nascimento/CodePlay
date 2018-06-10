<?php 
  require ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');
  require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');
  require ($_SERVER["DOCUMENT_ROOT"].'/professor/carregarDadosAlunos.php');

  $IMG_PATH = "../img/";
  $paginaResponderProblema = "responderProblema.php";

  $id_usuario = $_SESSION["id"];
  $areaAlunoDAO = new AreaAlunoDAO($conexao);
  $itemBlocoDAO = new ItemBlocoDAO($conexao);
  $area_atual = $areaAlunoDAO->getByAluno($id_usuario);
  $qtdProblemas = 10;
 // var_dump($area_atual);

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
		<br>
		<div class="table-users">
	  	<div class="header">Área do aluno</div>
	  	<?php
	  	   if ($area_atual){
	  	?>
		<div class="table-users">
			<form method="POST">
				<table>
				 <?php
				    $blocos = $area_atual->blocos;
				    $numProblemas = 0;
				    foreach ($blocos as $bloco) {
				    	// print_r($bloco);
				    	// echo "<br>";
				    	$assunto = $bloco->assunto->descricao;
				 ?>
				 <!-- Bloco da area  -->
		          <tr>
		            <th class="title2"><?=$assunto?></th>
		          </tr>
		          <tr>
		            <td align="middle" valign="center">
		            	<?php 
		            		$itensBloco = $itemBlocoDAO->getByBloco($bloco->id);
		            		for ($i = 1; $i <= MAX_ORDEM; $i++){
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
		            		}
		            	?>
		          </tr>
		          <?php
				    	
				    }

		          ?>
				</table>
			</form>
		</div>
		<?php
		} else {
			?>
			<div class="title2">Não há problemas liberados para você. Fale com o professor. </div>
			<?php
		}
		?>
    	</div>  
	</body>
</html>