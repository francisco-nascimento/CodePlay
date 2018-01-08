

<?php

  include 'imports.php';

  
?>

 <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="/index.php">CodePlay</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Alunos</a>
            </li>
            <li class="nav-item">
              <center>
              <a class="nav-link js-scroll-trigger" href="problemas.php">Problemas já cadastrados</a>
              </center>
            </li>
             <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/professor/cadastrarProblemas.php" > Cadastrar Problemas </a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/listagem.php" > Lista de Alunos </a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#">Usuario: <br> <?= $_SESSION['nome']?></a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/loginCadastro/logoff.php" > LogOff </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>