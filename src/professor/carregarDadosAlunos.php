<?php
session_start();
require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');
require ($_SERVER["DOCUMENT_ROOT"].'/aluno/areaAluno.php');
require ($_SERVER["DOCUMENT_ROOT"].'/aluno/AreaAlunoDAO.php');

function exibirDadosAlunos($con, $filename, $nome_turma){

   $dados = array();
   $i = 0;
   if (strcmp($filename['tmp_name'], '') !== 0){
      $file = fopen($filename['tmp_name'], "r");
      while(($linha = fgetcsv($file)) != FALSE){
         $array = explode(";",$linha[0]);
         if (sizeof($array) < 3 || !isset($array[0])){
            continue;
         }
         $dados[$i] = $array;
         $i++;
      }
   }
   return $dados;
}

function salvarDadosAlunos($con, $filename, $nome_turma, $id_professor, $qtd_problemas, $max_tentativas, $controle_tempo, $tempo, $ids_assuntos){
   $senhaPadrao = "codeplay123";
   $senhaCriptografada = password_hash($senhaPadrao, PASSWORD_DEFAULT);

   $dao = new AreaAlunoDAO($con);
   $alunoDAO = new AlunoDAO($con);
   $turmaDAO = new TurmaDAO($con);
   $turmaConfigDAO = new TurmaConfiguracaoDAO($con);
   $turmaConfigFasesDAO = new TurmaConfiguracaoFasesDAO($con);

   $id_turma = $turmaDAO->save($nome_turma, $id_professor);

   $turmaConfigDAO->save($id_turma, $qtd_problemas, $max_tentativas, $controle_tempo, $tempo);
   $id_turmaconfig = $turmaConfigDAO->getLastId('TurmaConfiguracao');

   $assuntos = array();
   $i = 0;
   foreach ($ids_assuntos as $id_assunto) {
      $turmaConfigFasesDAO->save($id_turmaconfig, $id_assunto);
      $assunto = new Assunto();
      $assunto->id = $id_assunto;
      $assuntos[$i] = $assunto;
      $i++;
   }

   if (strcmp($filename['tmp_name'], '') !== 0){
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

         // inserir blocos
         $blocos = array();
         $i = 0;
         foreach($assuntos as $item){
            $blocos[$i] = new BlocoArea($item);
            $i++;
         }
         $areaAluno->blocos = $blocos;
         $dao->save($areaAluno);

      }
      fclose($file);
   }
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