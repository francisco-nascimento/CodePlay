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

  function pesquisarAlunos($con, $nome, $turma){
  	if (!isset($nome) && !isset($turma)){
  		return null;
  	}
  	$sql = "SELECT * FROM Aluno where ";
    $param = '';
  	if (strcasecmp($turma,"-1") != 0){
  		$sql .= " id_turma = ? ";
  		$param = $turma;
  	} else {
  		$sql .= " upper(nome) like ? ";
  		$param = "%".strtoupper($nome) . "%";
  	}
  	$stmt = $con->prepare($sql);
	$stmt->bindValue(1, $param);
	$stmt->execute();
	return $stmt->fetchAll();
  }

  function gerarSelectTurmas($con){
  	$sql = "SELECT t.id, t.desc_Turma, p.nome FROM Turma t, Professor p " .
    "where t.id_professor = p.id order by t.desc_Turma";
	$stmt = $con->prepare($sql);
	$stmt->execute();
	$html_select = "<SELECT name ='pesq-turma' id='pesq-turma' readonly=true>";
	$html_select .= "<option value='-1'>Selecione uma turma</option>";
	while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
		$html_select .= "<option value='$linha[id]'>$linha[desc_Turma] ($linha[nome])</option>";
	}
	$html_select .= "</select>";
	return $html_select;
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
    		$('#opt-pesq1').change(function(){
    			if (this.checked){
    				$('#pesq-turma').removeAttr("disabled");
    				$('#pesq-turma').focus();
    				$('#pesq-nome').val('');
    			} else {
    				$('#pesq-turma').attr("disabled", true);
    				$('#pesq-turma').val("-1");
    			}
    		});
    		$('#pesq-nome').click(function(){
    			$('#pesq-nome').removeAttr("readonly");
    			$('#pesq-turma').val("-1");
    			$('#opt-pesq2').prop("checked", true);
    			$('#pesq-nome').focus();
    		});
    		$('#pesq-turma').click(function(){
    			$('#pesq-turma').removeAttr("readonly");
    			$('#pesq-nome').val("");
    			$('#opt-pesq1').prop("checked", true);
    			$('#pesq-turma').focus();
    		});
    		$('#opt-pesq2').change(function(){
    			if (this.checked){
    				$('#pesq-nome').removeAttr("disabled");
    				$('#pesq-turma').val("-1");
    				$('#pesq-nome').focus();
    			} else {
    				$('#pesq-nome').attr("disabled", true);
    				
    			}
    		});
    		$('button#btn-pesquisar').click(function(){
        		if ($('#pesq-turma').val() == '-1' &&
        			$('#pesq-nome').val() == ''){
        			alert('Preencha um dos campos de pesquisa');
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
	  	<div class="header">Pesquisar alunos</div>
		<div class="table-users">
			<form method="POST">
				<table>
          <tr>
            <th class="title1">Preencha um dos filtros para pesquisar</th>
          </tr>
					<tr>
						<td>
							<input type="radio" name="opt-pesq" id="opt-pesq1">
						
							<label>Turma: </label>
							<?=gerarSelectTurmas($conexao);?>
							<BR/>
							<input type="radio" name="opt-pesq" id="opt-pesq2">
							<label>Nome: </label>
							<input type="text" name="pesq-nome" id="pesq-nome" readonly="true">
						</td>
					</tr>
					<tr>
						<td >
						<button class="bt-ok" name="btn-pesquisar" id="btn-pesquisar" value="1">Pesquisar</button>
						</td>
					</tr>
				</table>
			</form>
		</div>
		<?php
		if (isset($_POST["btn-pesquisar"])){
			$resultado = pesquisarAlunos($conexao, $_POST["pesq-nome"], $_POST["pesq-turma"]);
		?>
  		<div class="table-users">
	      	<table cellspacing="0">
	      		<tr><td colspan="4">Resultado da pesquisa de alunos: </td></tr>
	      		<tr>
		         	<th>Nome</th>
		         	<th>Matrícula</th>
		         	<th>Situação</th>
		         	<th>Editar dados</th>
	      		</tr>
				<?php

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
    	<?php 
	        }
       	?>  
	</body>
</html>



