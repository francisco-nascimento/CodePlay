<?php
  include ('imports.php');
?>
<head>
  <link rel="shortcut icon" type="image/x-icon" href="/codeplay/img/favicon.ico">
</head>
<nav class="navbar navbar-expand-lg navbar-light" id="navPrincipal">
  <div class="container">
      <a id="codePlay" href="/codeplay/index.php">Code && Play</a>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Alunos
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="/codeplay/professor/importarAlunos.php">Importar alunos</a>
            <a class="dropdown-item" href="/codeplay/professor/listarAlunos.php"> Pesquisar Alunos</a>
            <a class="dropdown-item" href="/codeplay/professor/listarPorRanking.php">Ranking</a>
          </div>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Atividades
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="/codeplay/professor/cadastrarProblema.php">Cadastrar Problemas</a>            
            <a class="dropdown-item" href="/codeplay/professor/listarProblemas.php">Listar Problemas</a>
            <a class="dropdown-item" href="/codeplay/professor/acompanhar_submissoes.php">Acompanhar submissões</a>
          </div>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Usuário: <?=$_SESSION["nome"];?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="/codeplay/professor/listarAlunos.php">Alterar Dados</a>
          </div>
        </li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a class="nav-link" href="/codeplay/loginCadastro/logoff.php">
            LogOff
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>