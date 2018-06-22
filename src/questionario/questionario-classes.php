<?php
// Classes basicas Questionario
  require ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');
  require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');
  require ($_SERVER["DOCUMENT_ROOT"].'/aluno/areaAluno.php');

class QuestSentenca extends Entity {
	public desc_sentenca;
	public situacao;

}

class QuestOpcaoResposta  extends Entity {
	public desc_opcaoresposta;
	public situacao;
}

class QuestSentencaOpcao {
	public sentenca;
	public opcaoresposta;
}

class RespostaQuestionario {
	public aluno;
	public sentencaopcao;
}

?>