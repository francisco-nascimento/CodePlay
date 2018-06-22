<?php 
  require ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');
  require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');
  require ($_SERVER["DOCUMENT_ROOT"].'/aluno/areaAluno.php');
  require ($_SERVER["DOCUMENT_ROOT"].'/aluno/AreaAlunoDAO.php');

  function gerarSelectTurmas($con, $selecao){
    $turmaDAO = new TurmaDAO($con);
    $turmas = $turmaDAO->listAll();
    $html_select = "<SELECT name ='pesq-turma' id='pesq-turma' readonly=true>";
    $html_select .= "<option value=''>Todas as turmas</option>";
    foreach($turmas as $turma){
      $idTurma = $turma->id;
      $nomeTurma = $turma->desc_Turma;
      $nomeProfessor = $turma->nome;
      $selected = $idTurma === $selecao ? 'selected' : '';
      $html_select .= "<option value='$idTurma' ". $selected . ">$nomeTurma ($nomeProfessor)</option>";
    }
    $html_select .= "</select>";
    return $html_select;
  }

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Code && Play - Ranking</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  </head>
  <body>
    <br><br><br>
    <div class="table-ranking">
      <div class="header">Ranking</div>
      <fieldset>
      <div>
        <form method="POST" action="">
          Turma: <?=gerarSelectTurmas($conexao, $_POST['pesq-turma']);?>
          <button type="submit">Filtrar</button>
        </form>
      </div>        
      </fieldset>
        <table cellspacing="0">
          <tr class="title2">
            <td>Aluno</td>
            <td>Pontuação</td>
          </tr>
          <?php

            if (isset($_POST['pesq-turma'])){
              $id_turma = $_POST['pesq-turma'];
            }
            if (intval($id_turma) > 0){
              $resultado = $conexao->prepare("select nome, pontuacao from Aluno where id_turma = " . $id_turma . " order by pontuacao desc, nome limit 50");              
            } else {
              $resultado = $conexao->prepare("select nome, pontuacao from Aluno order by pontuacao desc, nome limit 50");
            }
            $resultado->execute();
            $pos = 1;
            foreach($resultado as $linha){ 
          ?>
          <tr>
            <td><?=$pos++ . '. ' . $linha['nome'];?></td>
            <td>
              <?php
                $pontuacao = $linha['pontuacao'];
                if ($pontuacao == 0) {
                echo "0";
                } else {
                  echo "$pontuacao";
                  }
              ?>
            </td>
          <?php 
            } 
          ?>
          </tr>
        </table>
      </div>
  </body>
</html>
