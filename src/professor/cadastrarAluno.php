<?php

	require ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');
  require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');
  require ($_SERVER["DOCUMENT_ROOT"].'/aluno/areaAluno.php');
  require ($_SERVER["DOCUMENT_ROOT"].'/aluno/AreaAlunoDAO.php');

  function exibirMensagem(){
  	if (strcasecmp($_GET["msg"], '1') == 0){
  		echo "<div class='msgerror'>Já existe um aluno com matrícula ou e-mail cadastrado.</div>";
  	} else if (strcasecmp($_GET["msg"], '2') == 0){
  		echo "<div class='title3'>Aluno cadastrado com sucesso.</div>";
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
      $selected = $idTurma === $_POST['pesq-turma'] ? 'selected' : '';
      $html_select .= "<option value='$idTurma' ". $selected . ">$nomeTurma ($nomeProfessor)</option>";
    }
    $html_select .= "</select>";
    return $html_select;
  }
			
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Code && Play - Adicionar aluno a uma turma</title>
    <link rel="stylesheet" type="text/css" href="/util/meu.css">

	</head>
	<body>
		
    <p>
    </p>
	<body>
      <div class="table-ranking">
        <div class="header">Adicionar aluno a uma turma</div>
        	<form action="/professor/inserirAluno.php" method="POST">
        	<table>
        		<tr>
        			<td colspan="2">
        				<?=exibirMensagem();?>
        			</td>
        		</tr>
          	<tr>
            	<td width="25%"><label>Matrícula:</label>
            	</td>
            	<td><input type="text" required="required" name="matricula" aria-describedby="Matricula" value="<?=$_POST['matricula']?>" >
            	</td>
	        </tr>
	        <tr>
            	<td width="25%"><label>Nome:</label>
            	</td>
            	<td><input type="text" required="required" name="nome" aria-describedby="Nome" size="40" value="<?=$_POST['nome']?>">
            	</td>
	        </tr>
	        <tr>
            	<td width="25%"><label>E-mail:</label>
            	</td>
            	<td><input type="text" required="required" name="email" aria-describedby="E-mail"  size="40" value="<?=$_POST['email']?>">
            	</td>
	        </tr>
	        <tr>
            	<td width="25%"><label>Turma:</label>
            	</td>
            	<td>
            		<?=gerarSelectTurmas($conexao);?>
            	</td>
	        </tr>
          <tr>
            <td colspan="2">
              <button type="submit" class="bt-ok">Salvar</button> 
            </td>
          </tr>

    </tr>
  </table>
      </form>
      </div>
  </body>
</html>