<!DOCTYPE html>
<html lang="pt" >

<head>
  <meta charset="UTF-8">
  <title>Alunos</title>
  
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

   $resultado = $conexao->prepare("select id, nome, matricula, situacao from Aluno where id_professor = ?");
   $resultado->bindValue(1, $_SESSION["id"]);
   $resultado->execute();

  foreach($resultado as $linha){ 

?>
      <tr>
         <td><?=$linha['nome'];?></td>
         <td><?=$linha['matricula'];?></td>
         
         <?php

          if ($linha['situacao'] == 1) {
         ?>

         <td>Ativo</td>

         <td>
         <form method="GET" action="/professor/alterarAluno.php">
          <input type="hidden" name="idAluno" value="<?=$linha['id']?>">
          <button type="submit" class="btn btn-sm btn-primary">Alterar Dados do Aluno</button>
           
         </form>

          <form method="GET" action="/professor/deletarAluno.php">
          <input type="hidden" name="idAluno" value="<?=$linha['id']?>">
          <button type="submit" class="btn btn-sm btn-danger">Deletar Aluno</button>
           
         </form>
       </td>

         <?php 
          }else{
        ?>

        <td>Inativo</td>

        <td>
         <form method="GET" action="/professor/alterarMatriculaAluno.php">
          <input type="hidden" name="idAluno" value="<?=$linha['id']?>">
          <button type="submit" class="btn btn-sm btn-primary">Alterar Matricula do Aluno</button>
           
         </form>

          <form method="GET" action="/professor/deletarAluno.php">
          <input type="hidden" name="idAluno" value="<?=$linha['id']?>">
          <button type="submit" class="btn btn-sm btn-danger">Deletar Aluno</button>
           
         </form>
       </td>

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



