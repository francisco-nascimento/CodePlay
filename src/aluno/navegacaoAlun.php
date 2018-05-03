
<head>
  <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico">
</head>

<?php

  include ($_SERVER["DOCUMENT_ROOT"].'/imports.php');

  
?>


 <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="/index.php">Code && Play</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
              <li class="nav-item">
              <ul class="menuEU">
                      <li class="nav-item"> <center><a href="#">Alunos</a> </center>
                          <ul>
                                <li class="nav-item">
                                    <center>
                                      <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger" href="ranking.php">Ranking</a>
                                      </li>
                                    </center>
                                </li>
                                <li class="nav-item">
                                  <center>
                                      <a class="nav-link js-scroll-trigger" href="/aluno/problemas/telas/listar_problemas.php">Ver problemas</a>
                                  </center>
                                </li>
                          </ul>
                    </li>              
              </ul>
            </li>
            <li class="nav-item">
              <ul class="menuEU">
                      <li class="nav-item"> <center><a href="#">Turma</a> </center>
                          <ul>
                                <li class="nav-item">
                                    <center>
                                      <li class="nav-item">
                                        <a class="nav-link js-scroll-trigger" href="ranking.php">Ranking da turma</a>
                                      </li>
                                    </center>
                                </li>
                                <li class="nav-item">
                                  <center>
                                      <a class="nav-link js-scroll-trigger" href="/aluno/problemas/telas/listar_problemas.php">Ver problemas</a>
                                  </center>
                                </li>
                                <li class="nav-item">
                                    <center>
                                      <a href="/aluno/listarAtividade.php" class="nav-link js-scroll-trigger">
                                        Ver Atividades
                                      </a>
                                    </center>
                                </li>
                          </ul>
                    </li>              
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/aluno/primeiroLogin/alteraDados.php">Usuario: <br> <?= $_SESSION['nome']?></a>
            </li>
             <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/loginCadastro/logoff.php" > LogOff </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <br><br><br><br>