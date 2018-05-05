<!DOCTYPE html>
<html lang="pt">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Code && Play - Problema</title>

    

    <?php
      require ($_SERVER['DOCUMENT_ROOT'].'/imports.php');
      //include ($_SERVER['DOCUMENT_ROOT'].'/imports.php');
    ?>

    

  </head>

  <body id="page-top">
    <!-- Navegação -->
   



    
    <!-- Header -->

     <?php

     

      include ($_SERVER ['DOCUMENT_ROOT'].'/verifica.php');



      
      ?>
    

    <br><br>

    <table>

    <?php

    //include ($_SERVER['DOCUMENT_ROOT'].'/conexao.php');
  

  

   $resultado = $conexao->prepare("select desc_Problema, classificacao from Problema where id = 1");
   //$resultado->bindParam(1,$id);
   $resultado->execute();

   foreach ($resultado as $linha) {
     # code...
   

?>

    <h1><?=$linha['desc_Problema']?></h1>
   
<?php
    }
?>

  <div id="blocklyDiv" style="height: 480px; width: 600px;"></div>

  
    <?php

      require ($_SERVER['DOCUMENT_ROOT'].'/util/blocos.php');

    ?>
  </xml>
   
</table>
  </body>

</html>
