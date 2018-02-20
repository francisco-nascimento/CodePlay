

<?php

  include ($_SERVER["DOCUMENT_ROOT"].'/imports.php');

  
?>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


 <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="/index.php">Code And Play</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="/professor/listarAlunos.php">Alunos</a>
            </li>
            <li class="nav-item">
              <ul class="menuEU">
                      <li class="nav-item"><a href="#">Professor</a>
                          <ul>
                                  <li class="nav-item">
                                    <center>
                                      <a href="/professor/cadastrarProblema.php" class="nav-link js-scroll-trigger">
                                        Cadastrar Problema
                                      </a>
                                    </center>
                                    </li>
                                  <li class="nav-item">
                                    <center>
                                      <a href="/professor/listarProblemas.php" class="nav-link js-scroll-trigger">
                                      Listar Problemas Cadastrados
                                      </a>
                                     </center>
                                  </li>
                                  <li class="nav-item">
                                    <center>
                                      <a href="/professor/listarAtividades.php" class="nav-link js-scroll-trigger">
                                        Lista de Atividades
                                      </a>
                                    </center>
                                  </li>
                                  <li class="nav-item">
                                    <center>
                                      <a href="/professor/turmas.php" class="nav-link js-scroll-trigger">
                                      Turmas
                                      </a>
                                    </center>
                                  </li>                    
                          </ul>
                    </li>              
              </ul>
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
    <br><br><br><br><br>