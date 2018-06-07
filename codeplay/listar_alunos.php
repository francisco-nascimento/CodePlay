<?php
  require 'verifica.php';
  $host = $_SERVER['SERVER_NAME'].':'.$_SERVER['SERVER_PORT'];

?>
<!DOCTYPE html>
<html lang="pt" >

<head>

</head>

<body>

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

  require 'conexao.php';

   $resultado = $conexao->query("select nome, matricula, situacao from Aluno");

  foreach($resultado as $linha){ 

?>
      <tr>
         <?="<td>".$linha['nome']."</td>";?>
         <?="<td>".$linha['matricula']."</td>";?>
         <?="<td>".$linha['situacao']."</td>";?>
      </tr>

      <?php 
          }
       ?>
       
   </table>
</div>
  
</body>

</html>



