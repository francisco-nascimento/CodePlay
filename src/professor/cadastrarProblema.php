<!DOCTYPE html>
<html>
	<head>
		<title>Cadastrar Problema</title>
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
      document.formulario.resposta.value = code;
      document.formBanco.resposta.value = code;
    }
    
  </script>
		
	</head>
	
	<?php
		require ($_SERVER["DOCUMENT_ROOT"].'/blocosJS.php');
	?>
		
		<br>
		<br>
		<br>
	

	</script>
	<body>
		<?php

			require ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');
			

		?>
		<br>
		<br>
		<br>

	<form name="formulario" onsubmit="recebeResposta();" action="/professor/recebeProblema.php" method="POST">
      <input type="hidden" name="resposta">

      <textarea name="descricao"></textarea>

      <select name="classificacao">
      	<option value="">Selecione a dificuldade</option>
      	<option value="fácil">Fácil</option>
      	<option value="médio"> Médio</option>
      	<option value="difícil"> Difícil</option>
      	
      </select>

      <?php 

      	require ($_SERVER["DOCUMENT_ROOT"].'/util/blocos.php');

       ?>
      <input type="submit" name="enviarResposta" value="Enviar Problema">
    </form>

		

  

</body>
</html>
