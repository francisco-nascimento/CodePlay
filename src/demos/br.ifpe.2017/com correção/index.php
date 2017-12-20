<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Resolvendo problemas e pondo tbm no banco de dados</title>
  <?php
    require "imports.php";
  ?>
  <style>
    body {
      background-color: #fff;
      font-family: sans-serif;
    }
    h1 {
      font-weight: normal;
      font-size: 140%;
    }
  </style>
</head>
<body>
  

  <p>
    <form name="formulario" onsubmit="recebeResposta();" action="imprime.php" method="POST">
      <input type="hidden" name="resposta">
      <input type="submit" name="enviarResposta" value="Testar resposta">
    </form>
    <form name="formBanco" action="inserir.php" method="POST" onsubmit="recebeResposta();">
        <input type="hidden" name="resposta">
        <input type="submit" name="inserir resposta" value="INserir no banco">
    </form>
    <button onclick="showCode()">Show JavaScript</button>
    <button onclick="runCode()">Run JavaScript</button>
  </p>

  <div id="blocklyDiv" style="height: 480px; width: 600px;"></div>
  <form action="testaResposta.php" method="POST">
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

  <xml id="startBlocks" style="display: none">
    
  <script>
    var demoWorkspace = Blockly.inject('blocklyDiv',
        {media: '../../media/',
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

</body>
</html>
