<!DOCTYPE html>
<html lang="pt">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CodePlay</title>

    <!-- Bootstrap core CSS -->
    <link href="../../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fontes personalizadas para este modelo -->
    <link href="../../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <?php
      require '../../../imports.php';
    ?>

    

  </head>

  <body id="page-top">
    <!-- Navegação -->
   



    
    <!-- Header -->

     <?php

      include '../../../verifica.php';
      
      ?>
    

    <br><br>

    <?php

      require '../php/questao.php';


      
    ?>

    <h1><?=$resultado['desc_Problema']?></h1>
   

   

  </body>

</html>
