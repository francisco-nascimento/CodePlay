<!DOCTYPE html>
<html lang="pt" >

<head>
  <meta charset="UTF-8">
  <title>Listar Alunos -  Code && Play</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
 
  <link rel="stylesheet" href="css/style.css">
 
</head>

<body>

  <?php 

    require 'verifica.php';

   ?>

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



