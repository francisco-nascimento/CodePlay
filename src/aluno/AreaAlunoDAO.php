<?php
abstract class DAO {
   protected $db;
   public function __construct(PDO $db) {
      $this->db = $db;
   }
   public function setDb(PDO $db) {
     $this->db = $db;
   }
   public function getDb() {
      return $this->db;
   }

	public function getLastId($entity){
		$select = $this->db->query("select MAX(id) as id from " . $entity);
		$result = $select->fetch(PDO::FETCH_ASSOC);
		$id = $result['id'];
		return $id;
	}
	public function getById($tabela, $id) {
        $stmt = $this->db->prepare("SELECT * FROM ". $tabela . 
        	" WHERE id = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();
        $obj = $stmt->fetchObject($tabela);
        // $stmt->closeCursor();
        $this->loadAttributes($obj);
        return $obj;
   }
   public function loadAttributes($obj){

   }

}

class AreaAlunoDAO extends DAO {

	private $blocoDAO;

	public function __construct($pdo) {
        parent::__construct($pdo);
        $this->blocoDAO = new BlocoAreaDAO($pdo);
    }

   public function loadAttributes($obj){
      $obj->blocos = $this->blocoDAO->getByArea($obj->id);
   }

   public function save($areaAluno){
   		// inserir AreaAluno
   		$sql = "insert into AreaAluno (id_aluno) values (?)";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(1, $areaAluno->aluno->id);
		$stmt->execute();
		
		// Inserir BlocoArea
		$areaAluno->id = $this->getLastId("AreaAluno");

		// $blocoDAO = new BlocoAreaDAO($this->db);

		foreach ($areaAluno->blocos as $bloco){
			$this->blocoDAO->save($bloco, $areaAluno);
		}
   }

   public function getByAluno($id_aluno){
   		$sql = "select * from AreaAluno where id_aluno = ?";
		$stmt = $this->db->prepare($sql);
        $stmt->bindValue(1, $id_aluno);
        $stmt->execute();
        $area = $stmt->fetchObject('AreaAluno');
        $stmt->closeCursor();
        $this->loadAttributes($area);
        return $area;   	
   }

}

class BlocoAreaDAO extends DAO {

	private $assuntoDAO;
//	private $itemBlocoDAO;

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

   public function loadAttributes($obj){
	   	if($obj){
	      $obj->assunto = $this->assuntoDAO->getById("Assunto", 
	      	$obj->id_assunto);
	  	}
   }

   public function save($bloco, $areaAluno){
   		// inserir BlocoArea
   		$sql = "insert into BlocoArea (id_areaaluno, id_assunto) values (?,?)";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(1, $areaAluno->id);
		$stmt->bindValue(2, $bloco->assunto->id);
		$stmt->execute();	

		// inserir ItemBloco
		$bloco->id = $this->getLastId("BlocoArea");

		$itemDAO = new ItemBlocoDAO($this->db);

		foreach ($bloco->itens as $item){
			$itemDAO->save($item, $bloco);
		}

   }

}

class AssuntoDAO extends DAO {
	public function listAll(){
		$stmt = $this->db->query("SELECT * FROM Assunto");
        $stmt->execute();
        $obj = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $obj;	
	}

}

class ItemBlocoDAO extends DAO{

	private $problemaDAO;
	private $situacaoItemDAO;
	private $blocoAreaDAO;
	
	public function __construct($pdo) {
        parent::__construct($pdo);
        $this->blocoAreaDAO = new BlocoAreaDAO($pdo);
        $this->problemaDAO = new ProblemaDAO($pdo);
        $this->situacaoItemDAO = new SituacaoItemBlocoDAO($pdo);
    }

	public function save($itembloco, $bloco){
   		// inserir SituacaoItemBloco
   		$this->situacaoItemDAO->save();
   		$id_situacaoitem = $this->db->lastInsertId(); 

   		$sql = "insert into ItemBloco (id_bloco, id_problema, ordem,  id_situacaoitem) values (?,?,?,?)";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(1, $bloco->id);
		$stmt->bindValue(2, $itembloco->problema->id);
		$stmt->bindValue(3, $itembloco->ordem);
		$stmt->bindValue(4, $id_situacaoitem);
		$stmt->execute();			   	
   }

   public function getByBloco($id_bloco) {
        $stmt = $this->db->prepare("SELECT * FROM ItemBloco WHERE id_bloco = ? order by ordem");
        $stmt->bindValue(1, $id_bloco);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_OBJ);
        foreach ($res as $obj) {
        	$this->loadAttributes($obj);
        }
        return $res;
   }

   public function getByAssuntoOrdem($id_assunto, $ordem) {
        $stmt = $this->db->prepare("SELECT i.* FROM ItemBloco i, BlocoArea b WHERE i.id_bloco = b.id and b.id_assunto = ? and i.ordem = ?");
        $stmt->bindValue(1, $id_assunto);
        $stmt->bindValue(2, $ordem);
        $stmt->execute();
        $obj = $stmt->fetchObject("ItemBlocoAluno");
        $this->loadAttributes($obj);
        return $obj;
   }

   public function loadAttributes($obj){
   	 if (isset($obj)){
	      $obj->problema = $this->problemaDAO->getById("Problema", 
	      	$obj->id_problema);
	      $obj->situacao = $this->situacaoItemDAO->getById("SituacaoItemBloco", 
	      	$obj->id_situacaoitem);
	      $obj->bloco = $this->blocoAreaDAO->getById("BlocoArea", $obj->id_bloco);   	 	
   	 }
   }

   public function obterNextItemBloco($id_assunto, $ordemAtual){
		if ($ordemAtual == MAX_ORDEM){
			$id_assunto++;
			$proxOrdem = 1;
		} else {
			$proxOrdem = $ordemAtual+1;
		}
		// return $this->getByAssuntoOrdem($id_assunto, $proxOrdem);
		return array($id_assunto, $proxOrdem);

   }

   public function createNextProblem($itemBlocoAtual, $id_aluno){

   		$ret = $this->obterNextItemBloco($itemBlocoAtual->problema->assunto->id, $itemBlocoAtual->ordem);

   		$id_assunto = $ret[0];
   		$ordem = $ret[1];
   		$nivel = obterNivel($ordem);

   		// $id_assunto = $proxItem->problema->assunto->id;
   		if ($itemBlocoAtual->bloco->assunto->id != $id_assunto){
   			$bloco = $blocoAreaDAO->getByAlunoAssunto($id_aluno, $id_assunto);
   			$id_bloco = $bloco->id;
   		} else {
   			$id_bloco = $itemBlocoAtual->bloco->id;
   		}
   		
   		$problema = $this->problemaDAO->selecionarPorNivel($nivel, $id_assunto, $id_bloco);
   		$id_problema = $problema->id;

   		if (isset($problema)){
		   	$situacao = new SituacaoItemBloco();
		   	$situacao->status = 1;
		   	$situacao->definirPontuacao($ordem);
		   	$this->situacaoItemDAO->save($situacao);
		   	$id_situacaoitem = $this->situacaoItemDAO->getLastId("SituacaoItemBloco");

		   	$sql = "insert into ItemBloco (id_bloco, id_problema, ordem,  id_situacaoitem) values (?,?,?,?)";
			$stmt = $this->db->prepare($sql);
			$stmt->bindValue(1, $id_bloco);
			$stmt->bindValue(2, $id_problema);
			$stmt->bindValue(3, $ordem);
			$stmt->bindValue(4, $id_situacaoitem);
			$stmt->execute();			   	   			

			return true;
   		} else {
   			return false;
   		}
   }

   public function substituirProblema($itembloco){
   		$nivel = obterNivel($itembloco->ordem);
   		$id_assunto = $itembloco->problema->assunto->id;
   		$problema = $this->problemaDAO->selecionarPorNivel($nivel, $id_assunto, $itembloco->id_bloco);
   		$id_problema = $problema->id;
   		$sql = "update ItemBloco set id_problema = ? where id = ?";
 		$stmt = $this->db->prepare($sql);
        $stmt->bindValue(1, $id_problema);		
        $stmt->bindValue(2, $itembloco->id);
        $stmt->execute();
   }

   public function getByAlunoProblema($id_aluno, $id_problema){
   		$sql = "SELECT i.* FROM ItemBloco i, BlocoArea b, AreaAluno a where  i.id_problema = ? and i.id_bloco = b.id and b.id_areaaluno = a.id and a.id_aluno = ?";
 		$stmt = $this->db->prepare($sql);
        $stmt->bindValue(1, $id_problema);
        $stmt->bindValue(2, $id_aluno);
        $stmt->execute();
        $obj = $stmt->fetchObject('ItemBlocoAluno');
        $this->loadAttributes($obj);
        $stmt->closeCursor();
        return $obj;
   }


}

class SituacaoItemBlocoDAO extends DAO{
   public function save($situacao){
   		$sql = "insert into SituacaoItemBloco (status, pontuacao_possivel) values (?,?)";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(1, $situacao->status);
		$stmt->bindValue(2, $situacao->pontuacao_possivel);
		$stmt->execute();
   }
   public function update($situacao){
   		$sql = "update SituacaoItemBloco set status = ?, quantidade_tentativas = ?, pontuacao_possivel = ?, pontuacao_obtida = ?, data_ultima_submissao = CURRENT_TIMESTAMP where id = ?";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(1, $situacao->status);
		$stmt->bindValue(2, $situacao->quantidade_tentativas);
		$stmt->bindValue(3, $situacao->pontuacao_possivel);
		$stmt->bindValue(4, $situacao->pontuacao_obtida);
		$stmt->bindValue(5, $situacao->id);
		$stmt->execute();			   	
   }

   public function getByAlunoProblema($id_aluno, $id_problema){
   		$sql = "SELECT s.* FROM SituacaoItemBloco s, ItemBloco i, BlocoArea b , AreaAluno a where  i.id_situacaoitem = s.id and i.id_problema = ? and i.id_bloco = b.id and b.id_areaaluno = a.id and a.id_aluno = ?";
 		$stmt = $this->db->prepare($sql);
        $stmt->bindValue(1, $id_problema);
        $stmt->bindValue(2, $id_aluno);
        $stmt->execute();
        $obj = $stmt->fetchObject('SituacaoItemBloco');
        $stmt->closeCursor();
        return $obj;
   }
}

class ProblemaDAO extends DAO {

	private $assuntoDAO;

	public function __construct($pdo) {
        parent::__construct($pdo);
        $this->assuntoDAO = new AssuntoDAO($pdo);
    }

	public function selecionarPorNivel($nivel, $id_assunto, $id_bloco) {
        $stmt = $this->db->prepare("SELECT * FROM Problema where ". 
        	"id_assunto = ? and classificacao = ? and id not in (".
        	"select id_problema from ItemBloco where id_bloco = ?) " . 
        	"order by RAND() LIMIT 1");
        $stmt->bindValue(1, $id_assunto);
        $stmt->bindValue(2, $nivel);
        $stmt->bindValue(3, $id_bloco);
        $stmt->execute();
        $obj = $stmt->fetchObject('Problema');
        $this->loadAttributes($obj);
        $stmt->closeCursor();
        return $obj;
   }

   public function loadAttributes($obj){
   	if (isset($obj)){
		$obj->assunto = $this->assuntoDAO->getById("Assunto", 
      		$obj->id_assunto);   		
   	}
   }
}

class RespostaAlunoDAO extends DAO {
   public function save($resposta){
   		$sql = "insert into Resposta_Aluno (desc_resposta, id_aluno, id_problema) values (?,?,?)";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(1, $resposta->desc_resposta);
		$stmt->bindValue(2, $resposta->aluno->id);
		$stmt->bindValue(3, $resposta->problema->id);
		$stmt->execute();			   	
   }

}


class GabaritoDAO extends DAO {
	public function getByProblema($id_problema){
		$stmt = $this->db->prepare("SELECT * FROM Gabarito where id_problema = ?");
		$stmt->bindValue(1, $id_problema);
        $stmt->execute();
        $obj = $stmt->fetchObject("Gabarito");
        return $obj;	
	}
}

class AlunoDAO extends DAO {

  public function update($id_aluno, $pontuacao){
    $sql = "update Aluno set pontuacao = ? where id = ?";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(1, $pontuacao);
    $stmt->bindValue(2, $id_aluno);
    $stmt->execute();         
  }

	public function pesquisarAlunos($nome, $turma){
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
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(1, $param);
		$stmt->execute();
		$res = $stmt->fetchAll(PDO::FETCH_OBJ);
		return $res;
	}

}

?>