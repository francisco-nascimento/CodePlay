<?php 

    require ('../verifica.php');
    require ('imports.php');

?>
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
            <form action="listarAlunosTurma.php" action="GET">
             <input type="hidden" name="idturma" value="<?=$linha["id"];?>">
             <button type="submit" class="btn btn-sm btn-warning">Editar Turma</button>
           </form>
           <form action="deletarTurma.php" action="GET" onsubmit="return confirme()">
             <input type="hidden" name="idturma" value="<?=$linha["id"];?>">
             <button type="submit" class="btn btn-sm btn-danger"> Deletar Turma </button>
           </form>
           <form action="atividadesTurma.php" action="GET">
             <input type="hidden" name="descTurma" value="<?=$linha['desc_Turma'];?>">
             <input type="hidden" name="idTurma" value="<?=$linha["id"];?>">
             <button type="submit" class="btn btn-sm btn-primary"> Atividades nesta turma </button>
           </form>
          
         </td>
         
           
         
<?php } ?>
      </tr>
      <tr>
        <td colspan="3">
        <center>
          <a href="criarTurma.php" style="color: #fff">
          <button class="btn btn-success btn-sm">
            Criar nova turma
          </button>
          </a>
        </center>
        </td>
      </tr>
   </table>
</div>
  
  

</body>

</html>
