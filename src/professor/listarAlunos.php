<?php 
  require ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');
  require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');
  require ($_SERVER["DOCUMENT_ROOT"].'/professor/carregarDadosAlunos.php');
  $IMG_PATH = $_SERVER["DOCUMENT_ROOT"] . "/img/";

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
    		$('button#btn-remover').click(function(){
        		var clickBtnValue = $(this).val();
        		var url = 'deletarAluno.php';
        		data =  {'idAluno': clickBtnValue};
        		$.get(url, data, function (response) {
            		// Response div goes here.
            		alert("Aluno removido!");
            		location.reload();
        		});
    		});
    		$('button#btn-editar').click(function(){
        		var clickBtnValue = $(this).val();
        		var url = 'alterarAluno.php';
        		data =  {'idAluno': clickBtnValue};
        		$.get(url, data);
        		// var url = 'alterarAluno.php?idAluno=' + clickBtnValue;
        		// $
        		// window.open(url);
    		});
		});
	</script>
	</head>
	<body>
		<br>
		<div class="table-users">
	  		<div class="header">Lista de alunos cadastrados</div>
	      	<table cellspacing="0">
	      		<tr>
		         	<th>Nome</th>
		         	<th>Matrícula</th>
		         	<th>Situação</th>
		         	<th>Editar dados</th>
	      		</tr>
				<?php
					$resultado = $conexao->prepare("select id, nome, matricula, situacao from Aluno");
					$resultado->execute();
					foreach($resultado as $linha){ 
				?>
	      		<tr>
	         		<td><?=$linha['nome'];?></td>
	         		<td><?=$linha['matricula'];?></td>
	         		<td><?=exibirSituacao($linha['situacao'])?></td>
	         		<td>
	         			<button id="btn-editar" value="<?=$linha['id']?>">
	         			<img src="../img/icone-editar.png" class="icone">
	         			</button>
	           			<button id="btn-remover" value="<?=$linha['id']?>">
	         				<img src="../img/icone-remover.png" class="icone">
	         			</button>
	       			</td>
	    		</tr>
		    	<?php 
		        	}
		       	?>  
			</table>
		</div>

  		<div class="table-users">
  			<table>
  				<tr>
  					<th>Carregar dados de uma turma</th>
  				</tr>
  				<tr>
  					<td>
			  			<form method="POST" enctype="multipart/form-data">
			  				<table>
			  					<tr>
			  						<th>
						  				<label>Nome da turma: </label>
						  				<input type="text" name="nome_turma">
						  			<br/>
			  						<label>Arquivo com dados dos alunos
			  						</label>
			  						(Formato CSV: matricula;nome;email;)
			  						<br/>
			  						<input type="file" name="file_alunos" > 
			  						<br/>
			  						<button type="submit">Carregar</button>
			  						</th>
			  					</tr>
			  			</form>
  					</td>
  				</tr>
  			</table>
  		</div>
	</body>
</html>



