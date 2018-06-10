<?php
  require ($_SERVER["DOCUMENT_ROOT"].'/util/autorizador-professor.php');
  include ($_SERVER["DOCUMENT_ROOT"].'/imports.php');
?>
<head>
  <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico">
</head>
<nav class="navbar navbar-expand-lg navbar-light" id="navPrincipal">
  <div class="container">
      <a id="codePlay" href="/index.php">Code && Play</a>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Alunos
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="/professor/importarAlunos.php">Importar alunos</a>
            <a class="dropdown-item" href="/professor/listarAlunos.php"> Pesquisar Alunos</a>
            <a class="dropdown-item" href="/professor/listarPorRanking.php">Ranking</a>
          </div>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Atividades
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="/professor/cadastrarProblema.php">Cadastrar Problemas</a>            
            <a class="dropdown-item" href="/professor/listarProblemas.php">Pesquisar Problemas</a>
            <a class="dropdown-item" href="/professor/acompanhar_submissoes.php">Acompanhar submissões</a>
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