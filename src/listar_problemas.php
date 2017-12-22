<!DOCTYPE html>
<html lang="pt" >

<head>
  <meta charset="UTF-8">
  <title>Problemas</title>
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">

  
      <link rel="stylesheet" href="css/style.css">

  
</head>

<body>

  <?php 

    require 'verifica.php';

   ?>

  <div class="table-users">
   <div class="header">Questões a serem resolvidas</div>

      <table cellspacing="0">
      <tr>
         <th>Professor</th>
         <th>Questões</th>
         <th>Classificação</th>
      </tr>
   <?php

  require 'conecao.php';

   $resultado = $conexao->query("select profe.nome, proble.desc_Problema, proble.classificacao from Professor as profe left join Problema as proble on profe.id = proble.id_Professor");

  foreach($resultado as $linha){ 

?>
      <tr>
         <?="<td>".$linha['nome']."</td> ";?>
         <?="<td><a href=''>".$linha['desc_Problema']."</a></td> ";?>
         <?="<td>".$linha['classificacao']."</td> ";}?>
      </tr>
   </table>
</div>
  
  

</body>

</html>
