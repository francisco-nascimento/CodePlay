<?php 
  require ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');
  require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');
  require ($_SERVER["DOCUMENT_ROOT"].'/professor/carregarDadosAlunos.php');
  $IMG_PATH = $_SERVER["DOCUMENT_ROOT"] . "/img/";

  function exibirSituacaoLogin($situacao){
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
    $turmaDAO = new TurmaDAO($con);
    $turmas = $turmaDAO->listAll();
    $html_select = "<SELECT name ='pesq-turma' id='pesq-turma' readonly=true>";
    $html_select .= "<option value='-1'>Selecione uma turma</option>";
    foreach($turmas as $turma){
      $idTurma = $turma->id;
      $nomeTurma = $turma->desc_Turma;
      $nomeProfessor = $turma->nome;
      $html_select .= "<option value='$idTurma'>$nomeTurma ($nomeProfessor)</option>";
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
    		// $('button#btn-remover').click(function(){
      //   		var clickBtnValue = $(this).val();
      //   		var url = 'deletarAluno.php';
      //   		data =  {'idAluno': clickBtnValue};
      //       var conf = confirm('Confirma a exclusão do aluno?');
      //       if (conf){
      //     		$.get(url, data, function (response) {
      //         		location.reload();
      //     		});
      //       }
    		// });
    		// $('button#btn-editar').click(function(){
      //   		var clickBtnValue = $(this).val();
      //   		var url = 'alterar_aluno.php';
      //   		data =  {'id': clickBtnValue};
      //       alert('Teste');
      //   		$.post(url, data);
    		// });
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
        $("#check-all").click(function () {
          $(".check-class").prop('checked', $(this).prop('checked'));
        });
		});
	</script>
	</head>
	<body>
		<br>
		<div class="table-users">
	  	<div class="header">Pesquisar alunos</div>
		<div class="table-users">
        <fieldset>
          <legend class="title2">Preencha um dos filtros para pesquisar</legend>
          <form method="POST">
				  <table>
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
        </fieldset>
			
		</div>
		<?php
		if (isset($_POST["btn-pesquisar"])){

      $alunoDAO = new AlunoDAO($conexao);
			$resultado = $alunoDAO->pesquisarAlunos($_POST["pesq-nome"], $_POST["pesq-turma"]);
		?>
  		<div class="table-users">
          <form action="gerar_atividades_aluno.php" method="POST">
	      	<table cellspacing="0">
	      		<tr><td colspan="7">Resultado da pesquisa de alunos: </td></tr>
	      		<tr>
              <th><input type="checkbox" id="check-all" class="checkAll-class"></th>
		         	<th>Nome</th>
		         	<th>E-mail</th>
              <th>Situação</th>
		         	<th>Pontuação</th>
              <th>Atividades</th>
		         	<th>Editar dados</th>
	      		</tr>
				<?php

					foreach($resultado as $aluno){ 
				?>
	      		<tr>
              <td>
                <?php 
                  if ($aluno->nivel == 0){ 
                ?>
                  <input type="checkbox" name="alunos[]" class="check-class" id="selecao" value="<?=$aluno->id?>">
                  <?
                  } else {
                    echo "&nbsp;";
                  }
                ?>
              </td>
	         		<td><?=$aluno->nome;?></td>
	         		<td><?=$aluno->email?></td>
	         		<td><?=exibirSituacaoLogin($aluno->situacao)?></td>
              <td><?=$aluno->pontuacao?></td>
              <td><?=$aluno->nivel?></td>
	         		<td>
	         			<a href="/professor/alterar_aluno.php?id=<?=$aluno->id?>">
	         			<img src="../img/icone-editar.png" class="icone">
	         			</a>
                <a href="/professor/deletarAluno.php?id=<?=$aluno->id?>">
	         				<img src="../img/icone-remover.png" class="icone">
                </a>
	       			</td>
	    		</tr>
		    	<?php 
			        }
		       	?>  
          <tr><td colspan="7">Iniciar atividades para os alunos selecionados: <button type="submit" class="bt-ok" name="btn-iniciar" id="btn-iniciar">Iniciar</button></td></tr>            
			</table>
    </form>
		</div>
    	<?php 
	        }
       	?>  
	</body>
</html>



