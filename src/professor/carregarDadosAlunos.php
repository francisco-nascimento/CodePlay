<?php

session_start();
require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');

$file_alunos = $_FILES['file_alunos'];
$nome_turma = $_POST['nome_turma'];

if(isset($file_alunos)){
   salvarDadosAlunos($conexao, $file_alunos, $nome_turma);   
}

function criarTurma($pdo, $nome_turma){   
   $sql = "INSERT INTO Turma(desc_Turma) VALUES (?)";
   $stmt = $pdo->prepare($sql);
   $stmt->bindValue(1, $nome_turma);
   $stmt->execute();

   $select = $pdo->query("select MAX(id) as id from Turma");
   $result = $select->fetch(PDO::FETCH_ASSOC);
   $id_turma = $result['id'];
   return $id_turma;
}

function salvarDadosAlunos($con, $filename, $nome_turma){
   $senhaPadrao = "codeplay123";
   $senhaCriptografada = password_hash($senhaPadrao, PASSWORD_DEFAULT);

   $id_turma = criarTurma($con, $nome_turma);

   $file = fopen($filename['tmp_name'], "r");
   while(($linha = fgetcsv($file)) != FALSE){
      $array = explode(";",$linha[0]);
      if (sizeof($array) < 3 || !isset($array[0])){
         continue;
      }
      // echo "$array[0] - $array[1] - $array[2]<BR/>";

      $matricula = $array[0];
      $senha = $senhaCriptografada;
      $nome = $array[1];
      $email = $array[2];
      $situacao = '2';

      $sql = "insert into Aluno(matricula, nome, email, senha, situacao, id_turma) values(?,?,?,?,?,?)";

      $stmt = $con->prepare($sql);
      $stmt->bindValue(1, $matricula);
      $stmt->bindValue(2, $nome);
      $stmt->bindValue(3, $email);
      $stmt->bindValue(4, $senhaCriptografada);
      $stmt->bindValue(5, $situacao);
      $stmt->bindValue(6, $id_turma);

      $stmt->execute();
   }
   fclose($file);

}
?>