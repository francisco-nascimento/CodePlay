<!-- imports block js-->
<script src="/blockly/blockly_compressed.js"></script>
<script src="/blockly/blocks_compressed.js"></script>
<script src="/blockly/javascript_compressed.js"></script>
<script src="/blockly/msg/js/en.js"></script>
 <!-- Bootstrap core JavaScript -->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.js"></script>

    <!-- Plugin JavaScript -->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="/js/jqBootstrapValidation.js"></script>
    <script src="/js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    

    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fontes personalizadas para este modelo -->
    <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Estilos personalizados para este modelo -->
    <link href="/css/freelancer.min.css" rel="stylesheet">

<?php 
    
    

    $arquivo = $_SERVER['PHP_SELF'];

    $login = '/loginCadastro/loginCadastro.php';
    $listagemProb = '/professor/listarProblemas.php';
    $listagemAlunos = '/professor/listarAlunos.php';



    if(!isset($_SESSION["USUARIO_LOGADO"]) && strcmp($arquivo, $login) == 0){


 ?>

    <link href="/css/styleLogin.css" rel="stylesheet">

    <?php 

}

     ?>

    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fontes personalizadas para este modelo -->
    <link href="/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">



    <link href="/js/freelancer.min.js" rel="stylesheet" type="text/css">

    <?php

    if(strcasecmp($arquivo, $listagemProb) == 0 || strcasecmp($arquivo, $listagemAlunos) == 0){


 ?>

     <!-- Style da listagem de problemas -->
    <link href="/css/style.css" rel="stylesheet" type="text/css">


    <?php 

}

     ?>

   
   