<?php
	require ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');
	require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');
	require ($_SERVER["DOCUMENT_ROOT"].'/blocosJS.php');

	require ($_SERVER["DOCUMENT_ROOT"].'/aluno/areaAluno.php');
	require ($_SERVER["DOCUMENT_ROOT"].'/aluno/AreaAlunoDAO.php');

	$problemaDAO = new ProblemaDAO($conexao);
	$itemBlocoDAO = new ItemBlocoDAO($conexao);
	$blocoAreaDAO = new BlocoAreaDAO($conexao);
	$gabaritoDAO = new GabaritoDAO($conexao);
	$alunoDAO = new AlunoDAO($conexao);

	$id_problema = $_GET["id"];
	$problema = $problemaDAO->getById("Problema", $id_problema);
	$id_aluno = $_SESSION["id"];

	$mensagemSucesso = '';
	if(isset($_POST['btn-submit'])){
		$respostaAlunoDAO = new RespostaAlunoDAO($conexao);
		$aluno = new Aluno();
		$aluno->id = $id_aluno;

		$situacaoItemDAO = new SituacaoItemBlocoDAO($conexao);
		$situacao = $situacaoItemDAO->getByAlunoProblema($id_aluno, $id_problema);

		$resposta_js = $_POST['resposta'];
		$respostaAluno = new RespostaAluno();
		$respostaAluno->set($resposta_js, $aluno, $problema, $situacao->id);
		$respostaAlunoDAO->save($respostaAluno);

		$gabarito = $gabaritoDAO->getByProblema($id_problema);

		if (verificarResposta($resposta_js, $gabarito->desc_Gabarito)){
			$situacao->registrarSucesso();

			$itemBloco = $itemBlocoDAO->getByAlunoProblema($id_aluno, $id_problema);

			$aluno = $alunoDAO->getById("Aluno", $id_aluno);

			$nova_pontuacao = $aluno->pontuacao + $itemBloco->pontuacao_possivel;

			$alunoDAO->update($id_aluno, $nova_pontuacao);

			$id_assunto = $itemBloco->bloco->assunto->id;
			$ordem = $itemBloco->ordem;

			$itemBlocoDAO->createNextProblem($id_aluno, $id_assunto, $ordem);

		} else {
			$situacao->registrarFalha();
			// Modificar o problema
			$itemBloco = $itemBlocoDAO->getByAlunoProblema($id_aluno, $id_problema);

			$id_assunto = $itemBloco->bloco->assunto->id;
			$ordem = $itemBloco->ordem;

			if($situacao->status == 4){
				$itemBlocoDAO->createNextProblem($id_aluno, $id_assunto, $ordem);
			} else {
				$itemBlocoDAO->substituirProblema($itemBloco);
			}
		}
		$situacaoItemDAO->update($situacao);
		$mensagemSucesso = "Solução submetida com sucesso.";
	}

	function verificarResposta($resposta, $gabarito){
		// TODO: case 1: variaveis criadas em ordem diferente

		if (strcasecmp($resposta, $gabarito) == 0){
			return 1;	
		} else {
			return 0;
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Code && Play - Responder Problema</title>
	<script>
      var demoWorkspace = Blockly.inject('blocklyDiv',
          {media: '/blockly/media/',
           toolbox: document.getElementById('toolbox')});
      Blockly.Xml.domToWorkspace(document.getElementById('startBlocks'),
                                 demoWorkspace);

      function showCode() {
        // Generate JavaScript code and display it.
        Blockly.JavaScript.INFINITE_LOOP_TRAP = null;
        var code = Blockly.JavaScript.workspaceToCode(demoWorkspace);
        alert(code);
      }

      function runCode() {
        // Generate JavaScript code and run it.
        window.LoopTrap = 1000;
        Blockly.JavaScript.INFINITE_LOOP_TRAP =
            'if (--window.LoopTrap == 0) throw "Infinite loop.";\n';
        var code = Blockly.JavaScript.workspaceToCode(demoWorkspace);
        Blockly.JavaScript.INFINITE_LOOP_TRAP = null;
        try {
          eval(code);
        } catch (e) {
          alert(e);
        }
      }
      function recebeResposta(){
        var code = Blockly.JavaScript.workspaceToCode(demoWorkspace);
        alert(code);
        if (code != "" && code != null) {
        	document.formulario.resposta.value = code;
        }else{
          window.alert("Preencha a resposta do Problema!");
          return false;
        }
      }    

    function verificaResposta(){
      var gabarito = document.formulario.resposta.value;
      var code = Blockly.JavaScript.workspaceToCode(demoWorkspace);
      if ((code != "" && code != null) && (gabarito != "" && gabarito != null)){

        document.formulario.respostaAluno.value = code;

            if (code == gabarito) {
              alert("Acertou Mizeravi");

              document.formulario.correcao.value = 1;

              return true;
              
            }else{
              alert("Erroooooooooou");
              
              document.formulario.correcao.value = 0;

              return true;
              
            }

      }else{

        alert("Preencha a resposta");
        return false;

      }
    }

  </script>
</head>
<body>
	<br>
	<div class="table-users">
  		<div class="header">Submissão de resposta </div>
  		<?php
  		if (isset($mensagemSucesso) && $mensagemSucesso != ''){
		?>
			<div class="title1"><?=$mensagemSucesso?></div>
		<?  			
  		} else {
  		?>
		<table>
			<tr>
				<td class="title2">
					Descrição: <?=$problema->desc_Problema?>
				</td>
			</tr>
			<tr>
				<td class="title2">
					Assunto: <?=$problema->assunto->descricao?>
				</td>
			</tr>
			<tr>
				<td>		
				 <?php 
			      	require ($_SERVER["DOCUMENT_ROOT"].'/util/blocos.php');
			     ?>
			 	</td>
			 </tr>
			 <tr>
			 	<td>
				<form name="formulario" onsubmit="recebeResposta();" action="" method="POST">
	  				<input type="hidden" name="resposta">
	  				<input type="hidden" name="id_problema" value="<?=$id_problema;?>">
	  				<input type="hidden" name="classificacao" value="<?=$problema->classificacao?>">
	  			    <button type="submit" name="btn-submit" class="btn btn-sm btn-success">Submeter resposta</button>
	  			</form>
		  		</td>
		  	</tr>
  		</table>
  		<?php
  		}
  		?>
	</div>
</body>
</html>