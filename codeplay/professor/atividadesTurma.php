<!DOCTYPE html>
<html lang="pt" >

<head>
  <meta charset="UTF-8">
  <title>Code && Play - Turmas Cadastradas</title>
  <script type="text/javascript">
    function confirme(){
      var a = prompt("Você tem certeza que quer excluir essa turma? 1 - SIM / 2 - NÃO");
      if (a == 1) {
        return true;
      }else{
        return false;
      }
    }
  </script>
</head>

<body>

  <?php 

    require ('../verifica.php');
    require ('imports.php');

   ?>
<br><br><br><br><br>
  <div class="table-users">
   <div class="header">Atividades para essa turma</div>

      <table cellspacing="0" class="table table-bordered">
      <tr>
         <th>Atividades de <?=$_GET['descTurma'];?></th>
         <th>Opções</th>
      </tr>
   <?php

  require ('../conexao.php');

   $resultado = $conexao->prepare("select a.*, a_t.id as id_a_t, a_t.data_limite from Atividade as a right join Atividade_Turma as a_t on a_t.id_Atividade = a.id where id_Turma = ?");
   $resultado->bindValue(1, $_GET["idTurma"]);
   $resultado->execute();

  foreach($resultado as $linha){ 
    

?>
      <tr>
         <td><?=$linha['desc_Atividade']?></td>
      </tr>
<?php } ?>
      
      <tr>
        <td colspan="3">
        <center>
          <a href="turmas.php" style="color: #fff">
          <button class="btn btn-success btn-sm">
            Voltar para Turmas
          </button>
          </a>
        </center>
        </td>
      </tr>
   </table>
</div>
  
  

</body>

</html>
