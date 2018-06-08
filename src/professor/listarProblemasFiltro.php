<?php 
  require ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');
  require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');
     function gerarSelectAssuntos($con){
        $sql = "SELECT id, descricao FROM Assunto";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $html_select = "<SELECT name ='sel-assunto' id='sel-assunt'>";
        $html_select .= "<option value='-1'>Selecione um assunto</option>";
        while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
          $html_select .= "<option value='$linha[id]'>$linha[descricao]</option>";
        }
        $html_select .= "</select>";
        return $html_select;
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Code && Play - Listar Problemas</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <!-- <link rel="stylesheet" href="/css/style.css"> -->
</head>
<body>
<br><br><br>
  <div class="table-users">
   <div class="header">Questões a serem resolvidas</div>

      <table cellspacing="0">
        <tr>
          <td colspan="5">
            <fieldset>
            <legend>Pesquisar por Nível ou assunto:</legend>
            <table  cellspacing="0">
              <form action="/professor/listarProblemasFiltro.php" method="POST">
                <tr>
                  <td><label>Assunto:</label></td>
                  <td><?=gerarSelectAssuntos($conexao);?></td>
                </tr>
                <tr>
                  <td><label>Nível:</label></td>
                  <td>
                    <select name="classificacao">
                      <option value="">Selecione a dificuldade</option>
                      <option value="F">Fácil</option>
                      <option value="M"> Médio</option>
                      <option value="D"> Difícil</option>
                    </select>
                  </td>
                  <td>
                    <button class="btn btn-sm btn-success" type="submit">Pesquisar</button>
                  </td>
                </tr>
              </form> 
              </fieldset>
            </table>
          </td>
        </tr>
      <tr>
         <th>Professor</th>
         <th>Assunto</th>
         <th>Questões</th>
         <th>Classificação</th>
         <th>Opções</th>
      </tr>
   <?php

  require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');

  $sql = "select proble.id, proble.id_assunto, profe.nome, proble.desc_Problema, proble.classificacao from Professor as profe right join Problema as proble on profe.id = proble.id_Professor where profe.id = ? limit 100";

  if (($_POST["sel-assunto"] != null || strcasecmp($_POST["sel-assunto"], "") != 0) && ($_POST["classificacao"] == null || strcasecmp($_POST["classificacao"], "") == 0)) {

    $sql = "select proble.id, proble.id_assunto, profe.nome, proble.desc_Problema, proble.classificacao from Professor as profe right join Problema as proble on profe.id = proble.id_Professor where profe.id = ? and proble.id_assunto = ? limit 100";
  $resultado = $conexao->prepare($sql);

   $resultado->bindValue(1, $_SESSION["id"]);
   $resultado->bindValue(2, $_POST["sel-assunto"]);
   
  }elseif (($_POST["sel-assunto"] == null || strcasecmp($_POST["sel-assunto"], "") == 0) && ($_POST["classificacao"] != null || strcasecmp($_POST["classificacao"], "") != 0)) {
    
     $sql = "select proble.id, proble.id_assunto, profe.nome, proble.desc_Problema, proble.classificacao from Professor as profe right join Problema as proble on profe.id = proble.id_Professor where profe.id = ? and proble.classificacao = ? limit 100";
  $resultado = $conexao->prepare($sql);

   $resultado->bindValue(1, $_SESSION["id"]);
   $resultado->bindValue(2, $_POST["classificacao"]);
  }elseif (($_POST["sel-assunto"] != null || strcasecmp($_POST["sel-assunto"], "") != 0) && ($_POST["classificacao"] != null || strcasecmp($_POST["classificacao"], "") != 0)) {
    
     $sql = "select proble.id, proble.id_assunto, profe.nome, proble.desc_Problema, proble.classificacao from Professor as profe right join Problema as proble on profe.id = proble.id_Professor where profe.id = ? and proble.classificacao = ? and proble.id_assunto limit 100";
  $resultado = $conexao->prepare($sql);

   $resultado->bindValue(1, $_SESSION["id"]);
   $resultado->bindValue(2, $_POST["classificacao"]);
   $resultado->bindValue(3, $_POST["sel-assunto"]);
  }


  
   $resultado->execute();


  foreach($resultado as $linha){ 

?>
      <tr>
         <td><?=$linha['nome'];?></td>
         <td><?=$linha['assunto'];?></td>
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
