<!DOCTYPE html>
<html>
	<head>
		<title>Cadastrar Problema</title>
    <link rel="stylesheet" type="text/css" href="/util/meu.css">
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
      if (code != "" && code != null) {
      document.formulario.resposta.value = code;
      document.formBanco.resposta.value = code;
      }else{
        window.alert("Preencha a resposta do Problema!");
        return false;
      }
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
		
    <table class="table">

	<form name="formulario" onsubmit="return recebeResposta();" class="form form-control" action="/professor/recebeProblema.php" method="POST">
      <input type="hidden" name="resposta" required="required">
      <tr>
        <th>Descrição do Problema *</th> <th> Classificação do Problema* </th> <th>Assunto do Problema*</th>
      </tr>

      

      <tr>
        <td>
          <textarea name="descricao" required="required" placeholder="Digite Aqui"></textarea>
        </td>
        <td>
            <select name="classificacao" required="required">
            	<option value="">Selecione a dificuldade</option>
            	<option value="fácil">Fácil</option>
            	<option value="médio"> Médio</option>
            	<option value="difícil"> Difícil</option>
            
            </select>

        </td>
        <td>
            <input type="text" name="assunto" required="required" placeholder="Escreva aqui">
        </td>

      </tr>
      <tr>
        <td colspan="3">
        <center>
      <?php 

      	require ($_SERVER["DOCUMENT_ROOT"].'/util/blocos.php');

       ?>
        </td>
        </center>
       </tr>
      <button type="submit" class="btn btn-sm btn-success">Enviar Problema</button>
    </form>
    </table>
		

  

</body>
</html>
