<!DOCTYPE html>
<html>
	<head>
		<title>Cadastrar Problema</title>
		<script src="/blockly/blockly_compressed.js"></script>
  		<script src="/blockly/blocks_compressed.js"></script>
  		<script src="/blockly/javascript_compressed.js"></script>
  		<script src="/blockly/msg/js/en.js"></script>
	</head>
	<body>
		<?php

			require ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');
			

		?>

		<div class="container">
			<br> <br><br><br><br><br>
			<table>
			<form action="recebeProblema.php" method="post" name="formulario"> 
			<!-- <input type="hidden" name="id" value="1"> -->
				<tr>
					<center>
						<td rowspan="2"><label>Pergunta</label><br>
						<textarea class="textarea" name="descricao"></textarea></td>
					</center>
				</tr>
				<tr>
				<td rowspan="2">
					<label>Classificação</label><br>
				
				<select name="dificuldade" required="require">
					<option value="">Selecione o nível da questão</option>
					<option value="Facil">Fácil</option>
					<option value="Media">Média</option>
					<option value="Dificil">Difícil</option>
				</select>
				</td>
				</tr>
				<tr>
					<td>
						<label>Resposta:</label>
					</td>
				</tr>
				<tr>
	

 

 
<td>
  <div id="blocklyDiv" style="height: 480px; width: 600px;"></div>

  <xml id="toolbox" style="display: none">
    <category name="Logic">
      <block type="controls_if"></block>
      <block type="logic_compare"></block>
      <block type="logic_operation"></block>
      <block type="logic_negate"></block>
      <block type="logic_boolean"></block>
    </category>
    <category name="Loops">
      <block type="controls_repeat_ext">
        <value name="TIMES">
          <block type="math_number">
            <field name="NUM">10</field>
          </block>
        </value>
      </block>
      <block type="controls_whileUntil"></block>
    </category>
    <category name="Math">
      <block type="math_number"></block>
      <block type="math_arithmetic"></block>
      <block type="math_single"></block>
    </category>
    <category name="Text">
      <block type="text"></block>
      <block type="text_length"></block>
      <block type="text_print"></block>
    </category>
  </xml>
</td>
  <xml id="startBlocks" style="display: none">
  	</xml>
  	<input type="hidden" name="gabarito">
<td>
  	 <p>
    <button onclick="showCode();">Show JavaScript</button>
    <button onclick="runCode();">Run JavaScript</button>
    <button onsubmit="enviar();"> Enviar resposta </button>
  </p>
 </td>



</tr>

</form>

</table>
    

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

    function enviar(){

   		Blockly.JavaScript.INFINITE_LOOP_TRAP = null;
    	var code = Blockly.JavaScript.workspaceToCode(demoWorkspace);
    	document.formulario.resposta.value = code;

    }
  </script>

</body>
</html>
