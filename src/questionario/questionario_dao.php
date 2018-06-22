<?php
  require ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');
  require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');

  require ($_SERVER["DOCUMENT_ROOT"].'/aluno/areaAluno.php');
  require ($_SERVER["DOCUMENT_ROOT"].'/aluno/AreaAlunoDAO.php');
  require_once ($_SERVER["DOCUMENT_ROOT"].'/questionario/questionario-classes.php');

  class QuestSentencaDAO extends DAO {

	    public function __construct($pdo) {
        parent::__construct($pdo);
      }

      public function listAll(){
   		  $sql = "select * from QuestSentence where situacao = 1";
		    $stmt = $this->db->query($sql);
        $stmt->execute();
        $sentencas = $stmt->fetchObject('QuestSentence');
        $stmt->closeCursor();
        return $sentencas;   	
      }

  }

  class QuestOpcaoRespostaDAO extends DAO {

      public function __construct($pdo) {
        parent::__construct($pdo);
      }

  }

  class BlocoAreaDAO extends DAO {

  private $assuntoDAO;
//  private $itemBlocoDAO;

  public function __construct($pdo) {
        parent::__construct($pdo);
        $this->assuntoDAO = new AssuntoDAO($pdo);
//        $this->itemBlocoDAO = new ItemBlocoDAO($pdo);
    }
  
   public function getByArea($id_area) {
        $stmt = $this->db->prepare("SELECT * FROM BlocoArea WHERE id_areaaluno = ?");
        $stmt->bindValue(1, $id_area);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_OBJ);
        foreach ($res as $obj) {
          $this->loadAttributes($obj);
        }
        return $res;
   }

   public function getByAlunoAssunto($id_aluno, $id_assunto) {
      $sql = "select b.* from BlocoArea b, AreaAluno a where " . 
    "b.id_areaaluno = a.id and a.id_aluno = ? and b.id_assunto = ?";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(1, $id_aluno);
        $stmt->bindValue(2, $id_assunto);
        $stmt->execute();
        $obj = $stmt->fetchObject('BlocoArea');
        $this->loadAttributes($obj);
        $stmt->closeCursor();
        return $obj;
   }

   

  class QuestSentencaOpcaoDAO extends DAO {

      private $sentencaDAO;
      private $opcaoRespostaDAO;

      public function __construct($pdo) {
        parent::__construct($pdo);
        $this->sentencaDAO = new QuestSentencaDAO($pdo);
        $this->opcaoRespostaDAO = new QuestOpcaoRespostaDAO($pdo);
      }

      public function listBy(){
        $sql = "select * from QuestSentencaOpcao so, QuestSentenca s, QuestOpcaoRespostaDAO oresp where so.id_sentence = s.id and so.id_opcaoresposta = oresp.id and s.situacao = 1 and oresp.situacao = 1";
        $stmt = $this->db->query($sql);
        $stmt->execute();
        $sentencas = $stmt->fetchObject('QuestSentence');
        $stmt->closeCursor();
        return $sentencas;    
      }

      public function loadAttributes($obj){
        if($obj){
          $obj->sentenca = $this->sentencaDAO->getById("QuestSentenca", 
            $obj->id_setenca);
          $obj-> = $this->sentencaDAO->getById("QuestSentenca", 
            $obj->id_setenca);
        }
   }
  }  

  