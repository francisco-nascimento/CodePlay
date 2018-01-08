<!DOCTYPE html>
<html lang="pt" >

<head>
  <meta charset="UTF-8">
  <title>Problemas</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
 
  
 
</head>

<body>

  <?php 

    require ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');
    require ($_SERVER["DOCUMENT_ROOT"].'/imports.php');

   ?>

   <br><br><br><br><br>

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

  require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');

   $resultado = $conexao->query("select nome, matricula, situacao from Aluno");

  foreach($resultado as $linha){ 

?>
      <tr>
         <?="<td>".$linha['nome']."</td>";?>
         <?="<td>".$linha['matricula']."</td>";?>
         
         <?php

          if ($linha['situacao'] == 1) {
         ?>

         <td>Ativo</td>

         <?php 
          }else{
        ?>

        <td>Inativo</td>

        <?php 
          }
       ?>
         
      </tr>

      <?php 
          }
       ?>
       
   </table>
</div>
  
</body>

</html>



