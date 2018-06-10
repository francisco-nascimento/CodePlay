<?php 
  require ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');
  $id_turma = $_SESSION["idTurma"];
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
    <div class="table-users">
      <div class="header">Ranking</div>
        <table cellspacing="0">
          <tr>
            <th>Aluno</th>
            <th>Pontuação</th>
          </tr>
          <?php
            require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');
            $stmt = $conexao->prepare("select nome, pontuacao from Aluno where id_turma = ? order by pontuacao desc, nome limit 50");
            $stmt->bindValue(1, $id_turma);            
            $stmt->execute();
            $res = $stmt->fetchAll();
            foreach($res as $linha){ 
          ?>
          <tr>
            <td><?=$linha['nome'];?></td>
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
