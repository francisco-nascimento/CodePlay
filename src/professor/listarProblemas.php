<?php 

  require ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');
  require ($_SERVER["DOCUMENT_ROOT"].'/imports.php');

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Code && Play - Listar Problemas</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <!-- <link rel="stylesheet" href="../css/style.css"> -->
</head>
<body>
<br><br><br>
  <div class="table-users">
   <div class="header">Questões a serem resolvidas</div>

      <table cellspacing="0">
      <tr>
         <th>Professor</th>
         <th>Questões</th>
         <th>Classificação</th>
         <th>Opções</th>
      </tr>
   <?php

  require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');


   $resultado = $conexao->prepare("select proble.id, profe.nome, proble.desc_Problema, proble.classificacao from Professor as profe right join Problema as proble on profe.id = proble.id_Professor where profe.id = ? limit 100");

   $resultado->bindValue(1, $_SESSION["id"]);
   $resultado->execute();


  foreach($resultado as $linha){ 

?>
      <tr>
         <td><?=$linha['nome'];?></td>
         <td><a href=''><?=$linha['desc_Problema'];?></a></td>
         <td><?=$linha['classificacao'];?></td>

         <td>
           <form action="/professor/deletarProblema.php" action="GET">
             <input type="hidden" name="idProb" value="<?=$linha["id"];?>">
             <button type="submit" class="btn btn-sm btn-danger"> Deletar Problema </button>
           </form>
         </td>
      <?php 
            
          } 
      ?>
      </tr>
   </table>
</div>
  
  

</body>

</html>
