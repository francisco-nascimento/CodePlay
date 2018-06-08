<?php
// session_start();
require ('../conexao.php');
require ('../aluno/areaAluno.php');
require ('../aluno/AreaAlunoDAO.php');

function criarTurma($pdo, $nome_turma, $id_professor){   
   $sql = "INSERT INTO Turma(desc_Turma, id_professor) VALUES (?, ?)";
   $stmt = $pdo->prepare($sql);
   $stmt->bindValue(1, $nome_turma);
   $stmt->bindValue(2, $id_professor);
   $stmt->execute();

   $select = $pdo->query("select MAX(id) as id from Turma");
   $result = $select->fetch(PDO::FETCH_ASSOC);
   $id_turma = $result['id'];
   return $id_turma;
}

function getLastIdAluno($con){
   $select = $con->query("select MAX(id) as id from Aluno");
   $result = $select->fetch(PDO::FETCH_ASSOC);
   $id_aluno = $result['id'];
   return $id_aluno;
}

function exibirDadosAlunos($con, $filename, $nome_turma){

   $dados = array();
   $i = 0;
   $file = fopen($filename['tmp_name'], "r");
   while(($linha = fgetcsv($file)) != FALSE){
      $array = explode(";",$linha[0]);
      if (sizeof($array) < 3 || !isset($array[0])){
         continue;
      }
      $dados[$i] = $array;
      $i++;
   }
   return $dados;
}

function salvarDadosAlunos($con, $filename, $nome_turma, $id_professor){
   $senhaPadrao = "codeplay123";
   $senhaCriptografada = password_hash($senhaPadrao, PASSWORD_DEFAULT);

   $id_turma = criarTurma($con, $nome_turma, $id_professor);

   $dao = new AreaAlunoDAO($con);
   $alunoDAO = new AlunoDAO($con);

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
      $situacao = '0';

      $alunoDAO->save($matricula, $nome, $email, $senhaCriptografada, $situacao, $id_turma, $_SESSION['id']);

      $id_aluno = $alunoDAO->getLastId("Aluno");
      // Gerar objeto AreaAluno
      $areaAluno = new AreaAluno();
      $aluno = new Aluno();
      $aluno->id = $id_aluno;
      // $aluno->id = ;
      $areaAluno->aluno = $aluno;

      $assuntoDAO = new AssuntoDAO($con);
      $assuntos = $assuntoDAO->listAll();

      // inserir blocos
      $blocos = array();
      foreach($assuntos as $item){
         $blocos[$i] = new BlocoArea($item);
         $i++;
      }
      $areaAluno->blocos = $blocos;
      $dao->save($areaAluno);

   }
   fclose($file);
   return $id_turma;
}

function pesquisarAlunos($con, $nome, $turma){
   if (!isset($nome) && !isset($turma)){
      return null;
   }
   $sql = "SELECT * FROM Aluno where ";
    $param = '';
   if (strcasecmp($turma,"-1") != 0){
      $sql .= " id_turma = ? ";
      $param = $turma;
   } else {
      $sql .= " upper(nome) like ? ";
      $param = "%".strtoupper($nome) . "%";
   }
   $stmt = $con->prepare($sql);
   $stmt->bindValue(1, $param);
   $stmt->execute();
   return $stmt->fetchAll(PDO::FETCH_OBJ);
}
?>