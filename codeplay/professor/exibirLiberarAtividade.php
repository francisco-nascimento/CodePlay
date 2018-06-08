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
   <div class="header">Turmas Cadastradas</div>

      <table cellspacing="0" class="table table-bordered">
      <tr>
         <th>Descrição</th>
         <th>Opções</th>
      </tr>
   <?php

  require ('../conexao.php');

   $resultado = $conexao->prepare("select * from Turma where id_Professor = ?");
   $resultado->bindValue(1, $_SESSION["id"]);
   $resultado->execute();

  foreach($resultado as $linha){ 
    

?>
      <tr>
         <td><?=$linha['desc_Turma'];?></td>
         <td>
            <form action="/codeplay/professor/liberarAtividade.php" action="GET">
             <input type="hidden" name="idturma" value="<?=$linha["id"];?>">
             <input type="hidden" name="idAtv" value="<?=$_GET["idAtividade"];?>">
          

                  <label>Insira uma data limite</label>
                    <input type="date" class="form-control" name="dataLimite" required="">
                  
             <button type="submit" class="btn btn-sm btn-warning">Liberar Atividade</button>
           </form>
         </td>
<?php } ?>
      </tr>
      <tr>
        <td colspan="3">
          </a>
        </center>
        </td>
      </tr>
   </table>
</div>
  
  

</body>

</html>
