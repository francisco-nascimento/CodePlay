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
}

class AreaAlunoDAO extends DAO {
	
	public function getById($id) {
        $stmt = $this->db->query("SELECT * FROM AreaAluno WHERE id = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();
        $area = $stmt->fetchObject('AreaAluno');
        $stmt->closeCursor();
        return $area;
   }

   public function save($areaAluno){
   		// inserir AreaAluno
   		$sql = "insert into AreaAluno (id_aluno) values (?)";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(1, $areaAluno->aluno->id);
		$stmt->execute();
		
		// Inserir BlocoArea
		$areaAluno->id = $this->getLastId("AreaAluno");

		$blocoDAO = new BlocoAreaDAO($this->db);

		foreach ($areaAluno->blocos as $bloco){
			$blocoDAO->save($bloco, $areaAluno);
		}
   }

}

class BlocoAreaDAO extends DAO {
	
	public function getById($id) {
        $stmt = $this->db->query("SELECT * FROM BlocoArea WHERE id = ?");
        $stmt->bindValue(1, $id);
        $stmt->execute();
        $obj = $stmt->fetchObject('BlocoArea');
        $stmt->closeCursor();
        return $obj;
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
   public function save($itembloco, $bloco){
   		// inserir SituacaoItemBloco
   		$situacaoDAO = new SituacaoItemBlocoDAO($this->db);
   		$situacaoDAO->save();
   		$id_situacaoitem = $this->db->lastInsertId(); 

   		$sql = "insert into ItemBloco (id_bloco, id_problema, ordem,  id_situacaoitem) values (?,?,?,?)";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(1, $bloco->id);
		$stmt->bindValue(2, $itembloco->problema->id);
		$stmt->bindValue(3, $itembloco->ordem);
		$stmt->bindValue(4, $id_situacaoitem);
		$stmt->execute();			   	
   }

}

class SituacaoItemBlocoDAO extends DAO{
   public function save(){
   		$sql = "insert into SituacaoItemBloco (status) values (?)";
		$stmt = $this->db->prepare($sql);
		$stmt->bindValue(1, 0);
		$stmt->execute();			   	
   }
}

class ProblemaDAO extends DAO{

	public function selecionarPorNivel($nivel) {
        $stmt = $this->db->prepare("SELECT * FROM Problema where ". 
        	"classificacao = ? order by RAND() LIMIT 1");
        $stmt->bindValue(1, $nivel);
        $stmt->execute();
        $obj = $stmt->fetchObject('Problema');
        $stmt->closeCursor();
        return $obj;
   }

}

?>