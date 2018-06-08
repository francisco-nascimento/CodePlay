<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="../vendor/js/jqBootstrapValidation.js"></script>
<script src="../vendor/js/contact_me.js"></script>
<!-- Custom scripts for this template -->
<script src="../vendor/js/freelancer.min.js"></script>
<script src="../blockly/blockly_compressed.js"></script>
<script src="../blockly/blocks_compressed.js"></script>
<script src="../blockly/javascript_compressed.js"></script>
<script src="../blockly/msg/js/en.js"></script>
<!-- Plugin JavaScript -->
<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="../vendor/bootstrap/js/bootstrap.min.js" rel="stylesheet">
<!-- Fontes personalizadas para este modelo -->
<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
<!-- Estilos personalizados para este modelo -->
<link href="../vendor/bootstrap/css/freelancer.min.css" rel="stylesheet">
<!-- MenuNav -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<!-- FimMenuNav -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Montserrat:400,700'>
<?php   

    $arquivo = '/codeplay/';
    $login = 'loginCadastro/loginCadastro.php';
    if(!isset($_SESSION["USUARIO_LOGADO"]) && strcmp($arquivo, $login) == 0){
 ?>
    <link href="vendor/bootstrap/css/styleLogin.css" rel="stylesheet">  
    <link rel="stylesheet" type="text/css" href="Login_V1_files/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="Login_V1_files/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="Login_V1_files/animate.css">
    <link rel="stylesheet" type="text/css" href="Login_V1_files/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="Login_V1_files/select2.min.css">
    <link rel="stylesheet" type="text/css" href="Login_V1_files/util.css">
    <link rel="stylesheet" type="text/css" href="Login_V1_files/main.css">
    <?php
}
?>
<!-- Bootstrap core CSS -->
<link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!-- Fontes personalizadas para este modelo -->
<link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="../vendor/bootstrap/js/freelancer.min.js" rel="stylesheet" type="text/css">
<link href="../vendor/bootstrap/css/dropdown.css" rel="stylesheet" type="text/css">
<?php
    $paginas = array();
    $paginas[$i++] = '/professor/listarProblemas.php';
    $paginas[$i++] = '/professor/listarAlunos.php';
    $paginas[$i++] = '/professor/cadastrarProblema.php';
    $paginas[$i++] = '/professor/importarAlunos.php';
    $paginas[$i++] = '/aluno/exibir_area_aluno.php';
    $paginas[$i++] = '/aluno/responderProblema.php';
    $paginas[$i++] = '/aluno/listarPorRanking.php';
    $paginas[$i++] = '/professor/listarPorRanking.php';
    $paginas[$i++] = '/professor/acompanhar_submissoes.php';
    $paginas[$i++] = '/professor/analisar_respostas.php';
    $paginas[$i++] = '/professor/gerar_atividades_aluno.php';
    $paginas[$i++] = '/aluno/problemas/telas/listar_problemas.php';


    $cond_incluir_link = FALSE;
    foreach ($paginas as $pag) {
        if (strcasecmp($arquivo, $pag) == 0) {
            $cond_incluir_link = TRUE;
            break;
        }
    }

    if($cond_incluir_link){

?>
<!-- Style da listagem de problemas -->
<link href="../vendor/bootstrap/css/style.css" rel="stylesheet" type="text/css">
<?php
}
?>