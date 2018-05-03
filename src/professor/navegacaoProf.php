<head>
  <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico">
</head>
<?php
  include ($_SERVER["DOCUMENT_ROOT"].'/imports.php'); 
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
  <div class="container">
    <a class="navbar-brand js-scroll-trigger" href="/index.php">Code && Play</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      Menu
      <i class="fa fa-bars"></i>
    </button> -->
<nav class="navbar navbar-expand-lg navbar-light" id="navPrincipal">
  <div class="container">
      <a id="codePlay" href="/index.php">Code && Play</a>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Cadastro
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="/professor/listarAlunos.php">Alunos Cadastrados</a>
            <a class="dropdown-item" href="/professor/cadastrarAluno.php">Cadastrar Alunos</a>
            <a class="dropdown-item" href="/professor/cadastrarProblema.php">Cadastrar Problemas</a>
            <a class="dropdown-item" href="/professor/turmas.php">Cadastrar Turmas</a>
          </div>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Atividades
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            
            <a class="dropdown-item" href="/professor/listarProblemas.php">Listar Problemas Cadastrados</a>
            <a class="dropdown-item" href="/professor/listarAtividades.php">Listar Atividades</a>
          </div>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Usuário: <?=$_SESSION["nome"];?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="/professor/listarAlunos.php">Alterar Dados</a>
          </div>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link" href="/loginCadastro/logoff.php">
            LogOff
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<!--     <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">
          <ul class="navMenu">
            <li class="nav-item">
              <a href="#">
                Alunos
              </a>
            <ul>
              <li class="nav-item">
                <a href="/professor/listarAlunos.php" class="nav-link js-scroll-trigger">
                  Alunos Cadastrados
                </a>
              </li>
              <li class="nav-item">
                <a href="/professor/cadastrarAluno.php" class="nav-link js-scroll-trigger">
                  Cadastrar Aluno
                </a>
              </li>
              <li class="nav-item">
                <a href="/professor/turmas.php" class="nav-link js-scroll-trigger">
                  Turmas
                </a>
              </li>
            </ul>
          </li>              
        </ul>
        <li class="nav-item">
          <ul class="navMenu">
            <li class="nav-item">
              <a href="#">
                Professor
              </a>
              <ul>
                <li class="nav-item">
                  <a href="/professor/cadastrarProblema.php" class="nav-link js-scroll-trigger">
                    Cadastrar Problema
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/professor/listarProblemas.php" class="nav-link js-scroll-trigger">
                    Listar Problemas Cadastrados
                  </a>
                </li>
                <li class="nav-item">
                  <a href="/professor/listarAtividades.php" class="nav-link js-scroll-trigger">
                    Lista de Atividades
                  </a>
                </li>
              </ul>
            </li>              
          </ul>
        </li>
        &nbsp;
        <li class="nav-item">
          <ul class="navMenu">
            <li class="nav-item">
              <a href="#">Usuario: <?=$_SESSION["nome"];?>
            </a>
              <ul>
                <li class="nav-item">
                  <a href="/professor/cadastrarProblema.php" class="nav-link js-scroll-trigger">
                    Alterar dados
                  </a>
                </li>
              </ul>
            </li>
          <li class="nav-item">
            <a class="nav-link js-scroll-trigger" href="/loginCadastro/logoff.php" > LogOff </a>
          </li>
        </ul>

    </div>
  </div>
</nav> -->