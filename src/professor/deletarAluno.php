<?php
    require ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');
	require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');
	$aluno = $_GET["id"];
    
  	const IMG_PATH = "../img/";

	// $sql = "DELETE FROM Aluno_Turma WHERE id_aluno = ?;";

	// $stmt = $conexao->prepare($sql);
	// $stmt->bindValue(1, $aluno);
	// $stmt->execute();

	try { 

	$sql = "DELETE FROM RespostaAluno WHERE id_Aluno = ?";
	$stmt = $conexao->prepare($sql);
	$stmt->bindValue(1, $aluno);
	$stmt->execute();

	$sql = "SELECT id_situacaoitem FROM ItemBloco WHERE id_bloco in (select b.id from BlocoArea b, AreaAluno a where b.id_areaaluno = a.id and a.id_aluno = ?)";
	$stmt = $conexao->prepare($sql);
	$stmt->bindValue(1, $aluno);
	$stmt->execute();	
    $res = $stmt->fetchAll();
    foreach ($res as $value) {
    	$array1[] = $value['id_situacaoitem'];
    }

    if (count($array1) > 0) {
		$str_idsituacao = join(",", $array1);
		$sql = "DELETE FROM SituacaoItemBloco where id in (" . $str_idsituacao . ")";
		$stmt = $conexao->query($sql);
		$stmt->execute();
	}
	$sql = "DELETE FROM ItemBloco WHERE id_bloco in (select b.id from BlocoArea b, AreaAluno a where b.id_areaaluno = a.id and a.id_aluno = ?)";
	$stmt = $conexao->prepare($sql);
	$stmt->bindValue(1, $aluno);
	$stmt->execute();

	$sql = "DELETE FROM BlocoArea WHERE id_areaaluno = (select id from AreaAluno where id_aluno = ?)";
	$stmt = $conexao->prepare($sql);
	$stmt->bindValue(1, $aluno);
	$stmt->execute();

	$sql = "DELETE FROM AreaAluno WHERE id_Aluno = ?";
	$stmt = $conexao->prepare($sql);
	$stmt->bindValue(1, $aluno);
	$stmt->execute();

	$sql2 = "DELETE FROM Aluno WHERE id = ?";
	$stmt2 = $conexao->prepare($sql2);
	$stmt2->bindValue(1, $aluno);
	$stmt2->execute();

	$msg = "Aluno excluído com sucesso";
} catch(Exception $e){
	$msg = "Não foi possível excluir o aluno. Procure o administrador do sistema.";
}

?>
<!DOCTYPE html>
<html lang="pt" >
	<head>
	  <meta charset="UTF-8">
	  <title>Code && Play - Listar Alunos</title>
	  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	</head>
	<body>
		<div class="table-users">
	  	<div class="header">Exclusão de alunos</div>
	  	<div class="title2"><?=$msg?></div>
		  <a href="/professor/listarAlunos.php" class="title3">
		    <img class="icone" src="<?=IMG_PATH?>icon-seta-back2.png"></button>
		    Voltar
		  </a>

	  </div>
	</body>
</html>



