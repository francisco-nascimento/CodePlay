<?php

class Aluno{
	public $id;
	public $nome;
	public $email;
	public $pontuacao;
}

class Problema {
	public $id;
	public $desc_Problema;
	public $professor;
	public $assunto;
	public $classificacao;
}

class AreaAluno {

	// atributos
	public $blocos; // BlocoArea blocos[];
	public $aluno; // Aluno aluno;

	public function __constructor(){
		$this->aluno = new Aluno();
		$this->blocos = array();
	}

	function criar($con){
		try {
			$sql = "insert into AreaAluno (id_aluno) values (?)";
			$stmt = $conexao->prepare($sql);
			$stmt->bindValue(1, $aluno->id);
			$stmt->execute();			
			return true;
		}catch(PDOException $e){
			echo $e->getMessage();
			return false;
		}
	}

	function pesquisar($con, $aluno){
		try {
			$sql = "select * from AreaAluno where id_aluno = ?";
			$stmt = $conexao->prepare($sql);
			$stmt->bindValue(1, $aluno->id);
			$stmt->execute();			
			return true;
		}catch(PDOException $e){
			echo $e->getMessage();
			return false;
		}
			
	}

}

class BlocoArea {
	public $assunto; // Assunto assunto;
	public $itens; // ItemBlocoAluno[]; 

	public function BlocoArea($assunto){
		$this->assunto = $assunto;
		$this->itens = array();
	}

}

class ItemBlocoAluno {

	public $problema; // Problema problema;
	public $situacao; // SituacaoItemBloco situacaoItem;
	public $ordem; // [1..6]

	public function ItemBlocoAluno($problema, $situacao, $ordem){
		$this->problema = $problema;
		$this->situacao = $situacao;
		$this->ordem = $ordem;
	}

}

class SituacaoItemBloco{

	public $status; // int status: // 0 - Inativo, 1 - Nao resolvido, 2 - ResolvidoSucesso, 3 - ResolvidoErro
	public $qtdTentativas; // int quantidadeTentativas;
	public $pontuacaoPossivel; // int pontuacaoPossivel;
	public $pontuacaoObtida; // int pontuacaoObtida;
	public $dataUltimaSubmissao; // Date dataUltimaSubmissao;

	public function SituacaoItemBloco(){
		$this->status = 0;
		$this->qtdTentativas = 0;
		$this->pontuacaoPossivel = 0;
		$this->pontuacaoObtida = 0;
	}
}
?>