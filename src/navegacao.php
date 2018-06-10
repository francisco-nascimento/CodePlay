<?php
  require ($_SERVER["DOCUMENT_ROOT"].'/util/autorizador-professor.php');
  include $_SERVER['DOCUMENT_ROOT']."/imports.php";
?>
<head>
  <link rel="shortcut icon" type="image/x-icon" href="/img/favicon.ico">
</head>
<nav class="navbar navbar-expand-lg navbar-light" id="navPrincipal">
  <div class="container">
    <a id="codePlay" href="/index.php">Code && Play</a>
    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link" href="#about">
          Sobre
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" href="/loginCadastro/loginCadastro.php">
          Logar <!-- ou Criar conta -->
        </a> 
      </li>
    </ul>
  </div>
</nav>