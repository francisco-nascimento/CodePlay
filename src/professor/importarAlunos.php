<?php 
  require ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');
  require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');
 // require ($_SERVER["DOCUMENT_ROOT"].'/professor/carregarDadosAlunos.php');
  require ($_SERVER["DOCUMENT_ROOT"].'/professor/selecionar_problemas.php');

  $IMG_PATH = $_SERVER["DOCUMENT_ROOT"] . "/img/";
  $id_professor = $_SESSION["id"];

  $file_alunos = $_FILES['file_alunos'];
  $nome_turma = $_POST['nome_turma'];

  if(isset($_POST['btn-confirmar'])){
     $id_turma = salvarDadosAlunos($conexao, $file_alunos, $nome_turma, $id_professor);   
  }

  if(isset($_POST['id_turma'])){
     gerarProblemasTurma($conexao, $_POST['id_turma']);
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

	<script type="text/javascript">
		$(document).ready(function(){
    		$('#btn-confirmar').click(function(){
        		if ($('#file_alunos').val() == '' ||
        			$('#nome_turma').val() == ''){
        			alert('Campos obrigatórios não informados');
        			return false;
        		}
        		this.submit();
    		});  
    // 		$('#btn-start').click(function(){
				// var clickBtnValue = $(this).val();
    //     		var url = 'importarAlunos.php';
    //     		data =  {'btn-start': clickBtnValue};
    //     		$.post(url, data);
    //     	});  		
		});
	</script>
	</head>
	<body>
		<br>
		<div class="table-users">
	  	<div class="header">Importar alunos</div>
  		<div class="table-users">
  			<table>
  				<tr>
  					<th class="title1">Carregar dados de uma turma</th>
  				</tr>
  				<tr>
  					<td>
			  			<form method="POST" enctype="multipart/form-data">
			  				<table>
			  					<tr>
			  						<th>
						  				<label>Nome da turma: * </label>
						  				<input type="text" name="nome_turma" id="nome_turma">
						  			<br/>
			  						<label>Arquivo com dados dos alunos *
			  						</label>
			  						<input type="file" name="file_alunos" id="file_alunos" > 
			  						<br/>
			  						(Formato CSV: matricula;nome;email;)
			  						</th>
			  					</tr>
			  					<tr>
			  						<td>
			  						<button class="bt-ok" id="btn-confirmar" name="btn-confirmar" type="submit">Carregar</button>
			  						</td>
			  					</tr>
			  				</table>
			  			</form>
  					</td>
  				</tr>
  			</table>
  		</div>
		<?php
		if (isset($_POST["btn-confirmar"])){
			$resultado = exibirDadosAlunos($conexao, $file_alunos, $nome_turma);
		?>
  		<div class="table-users">
	      	<table cellspacing="0">
	      		<tr><td colspan="4">
	      			<div class="title1">Alunos cadastrados</div>
	      			<span class="title2">Nome da turma: <?=$nome_turma;?></span><br/>
	      			<span class="title2">Quantidade de alunos: <?=count($resultado);?></span>
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
		       			<?php 
		       				if (isset($id_turma)){
		       					?>
		       					<form method="POST">
		       						<input type="hidden" value="<?=$id_turma?>" name="id_turma">
		       						<button type="submit" id="btn-start">Start turma</button>
		       					</form>
		       			<?php
		       				}
		       			?>
		       		</td>
		       	</tr>

			</table>
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


