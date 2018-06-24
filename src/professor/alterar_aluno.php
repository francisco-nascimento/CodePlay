<?php

	require ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');
  require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');
  require ($_SERVER["DOCUMENT_ROOT"].'/aluno/areaAluno.php');
  require ($_SERVER["DOCUMENT_ROOT"].'/aluno/AreaAlunoDAO.php');

  const IMG_PATH = "../img/";

  $id_aluno = $_GET['id'];
  $alunoDAO = new AlunoDAO($conexao);

  $aluno = $alunoDAO->getById('Aluno', $id_aluno);
  $matricula = $aluno->matricula;
  $nome = $aluno->nome;
  $email = $aluno->email;
  $turma = $aluno->id_turma;
  $cod_mens = 0;


  if (isset($_POST['btn-salvar'])){
    $matricula = $_POST['matricula'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $turma = $_POST['pesq-turma'];
    $senhapadrao = $_POST['senhapadrao'];
    $id_aluno = $_POST['id'];
    
    if($senhapadrao === 1){
      $aluno->resetSenha();
    } else {
      $aluno->senha = NULL;
    }

    // verificando se o e-mail e matricula ja existe em outro aluno
    $aluno_pesq = $alunoDAO->getByMatriculaEmail($matricula, $email);
    if ($aluno_pesq->id !== $id_aluno){
      $cod_mens = 1;
    } else {
      $alunoDAO->updateAll($nome, $matricula, $email, $id_aluno, $turma, $aluno->senha);
      $cod_mens = 2;
    }

  }

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

  function exibirMensagem($cod_mens){
  	if ($cod_mens === 1){
  		echo "<div class='msgerror'>Já existe um aluno com matrícula ou e-mail cadastrado.</div>";
  	} else if ($cod_mens === 2){
  		echo "<div class='title3'>Aluno alterado com sucesso.</div>";
  	}
  }

  function gerarSelectTurmas($con, $par_turma){
    $turmaDAO = new TurmaDAO($con);
    $turmas = $turmaDAO->listAll();
    $html_select = "<SELECT name ='pesq-turma' id='pesq-turma' readonly=true>";
    $html_select .= "<option value='-1'>Selecione uma turma</option>";
    foreach($turmas as $turma){
      $idTurma = $turma->id;
      $nomeTurma = $turma->desc_Turma;
      $nomeProfessor = $turma->nome;
      $selected = $idTurma === $par_turma ? 'selected' : '';
      $html_select .= "<option value='$idTurma' ". $selected . ">$nomeTurma ($nomeProfessor)</option>";
    }
    $html_select .= "</select>";
    return $html_select;
  }
			
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Code && Play - Editar Aluno</title>
    <link rel="stylesheet" type="text/css" href="/util/meu.css">
	</head>
	<body>
		
    <p>
    </p>
	<body>
      <div class="table-ranking">
        <div class="header">Editar aluno</div>
            <?php

              exibirMensagem($cod_mens);
              if ($cod_mens !== 2) {
            ?>
        	<form action="" method="POST">
            <input type="hidden" name="id" value="<?=$aluno->id?>">
        	<table>
          	<tr>
            	<td width="25%"><label>Matrícula:</label>
            	</td>
            	<td><input type="text" required="required" name="matricula" aria-describedby="Matricula" value="<?=$matricula?>" >
            	</td>
	        </tr>
	        <tr>
            	<td width="25%"><label>Nome:</label>
            	</td>
            	<td><input type="text" required="required" name="nome" aria-describedby="Nome" size="40" value="<?=$nome?>">
            	</td>
	        </tr>
	        <tr>
            	<td width="25%"><label>E-mail:</label>
            	</td>
            	<td><input type="text" required="required" name="email" aria-describedby="E-mail"  size="40" value="<?=$email?>">
            	</td>
	        </tr>
	        <tr>
            	<td width="25%"><label>Turma:</label>
            	</td>
            	<td>
            		<?=gerarSelectTurmas($conexao, $turma);?>
            	</td>
	        </tr>
          <tr>
              <td width="25%"><label>Situação:</label>
              </td>
              <td><?=exibirSituacaoLogin($aluno->situacao)?></td>
          </tr>
          <tr>
              <td width="25%"><label>Alterar para senha padrão (codeplay123):</label>
              </td>
              <td>Sim <input type="radio" name="senhapadrao" value="1">&nbsp;&nbsp;&nbsp;&nbsp;
                Não <input type="radio" name="senhapadrao" checked value="0">
              </td>
          </tr>
          
          <tr>
            <td colspan="2">
              <button type="submit" class="bt-ok" name="btn-salvar">Salvar</button> 
            </td>
          </tr>
        </tr>
      </table>
      </form>
      <?php
      }
      ?>
      <a href="/professor/listarAlunos.php" class="title3">
        <img class="icone" src="<?=IMG_PATH?>icon-seta-back2.png"></button>
        Voltar
      </a>

      </div>
  </body>
</html>