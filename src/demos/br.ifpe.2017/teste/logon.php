<?php

session_start();

$usuario = $_POST['usuario'];
$senha = $_POST['senha']; 

require('conexao.php');
  $query = $conexao->query("select nome, senha from usuario where nome = '$usuario' and senha = '$senha'");
  if($query == true) {
    echo "<script> alert('Login feito com sucesso!'; </script>";
    $_SESSION['login'] = $usuario;
    header('location: index.php');
   }else{
    unset ($_SESSION['login']);
    header('location: login.php');
  }


?>