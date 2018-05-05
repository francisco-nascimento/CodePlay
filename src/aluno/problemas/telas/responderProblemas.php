<!DOCTYPE html>
<html>
<head>
	<title>Code && Play - Responder Problema</title>
	<?php
		require ($_SERVER["DOCUMENT_ROOT"].'/blocosJS.php');
	?>
	<script>
		    var demoWorkspace = Blockly.inject('blocklyDiv',
		        {media: '/blockly/media/',
		         toolbox: document.getElementById('toolbox')});
		    Blockly.Xml.domToWorkspace(document.getElementById('startBlocks'),
		                               demoWorkspace);

		   
		    function recebeResposta(){
		      var code = Blockly.JavaScript.workspaceToCode(demoWorkspace);
		      document.formulario.resposta.value = code;
		      document.formBanco.resposta.value = code;
		    }
    
  </script>
</head>
<body>
<br><br><br><br>

	<?php

			require ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');

			require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');

			$stmt = $conexao->prepare("select id, desc_Problema, classificacao from Problema where id = ?");
			$id = $_GET["id"];

			$stmt->bindParam(1, $id);
			$stmt->execute();
			$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

			

			foreach ($resultado as $linha) {
				
			

	?>

	<table>
		<tr>
			<td>
				Descrição: <?=$linha["desc_Problema"];?>
			</td>
			<td>
				Classificação: <?=$linha["classificacao"];?>
			</td>
		</tr>
		<tr>
			<td colspan="2">
				 <?php 

			      	require ($_SERVER["DOCUMENT_ROOT"].'/util/blocos.php');

			     ?>
			</td>
			<td>
				<form name="formulario" onsubmit="recebeResposta();" action="/aluno/problemas/php/teste.php" method="POST">
      				<input type="hidden" name="resposta">
      				<input type="hidden" name="id" value="<?=$id;?>">
      				<input type="submit" value="Testar Resposta">
      			</form>
			</td>
		</tr>
	</table>

<?php
	}
?>



</body>
</html>