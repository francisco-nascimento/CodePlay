<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Blockly Demo: Generating JavaScript</title>
  <script src="blockly_compressed.js"></script>
  <script src="blocks_compressed.js"></script>
  <script src="javascript_compressed.js"></script>
  <script src="msg/js/en.js"></script>
  <link rel="stylesheet" type="text/css" href="tela.css">

<?php
session_start();
require 'conexao.php';
if (!isset($_SESSION['login'])){
  ?>
  <script type='text/javascript'> window.alert('Vá se logar antes de responder!');</script>
  <?php
  header('Location: login.php');
}
?>


</head>
<body>

  <?php

    if ($_SESSION['login'] == 'admin') {
        ?>

        <h1>Usuario Administrador</h1>

        <?php
    }else{
      ?>
      <h1>Usuario Padrão</h1>
      <?php
    }

  ?>

  <form action="logout.php" method="POST">
    <input type="submit" value="Log off">
  </form>


  <h1>Pontuação: 48000</h1>

  <h1>Questão 4004</h1>

  <p> Junte os blocos de uma maneira que imprima a palavra caracol 5 vezes</p>

  <p>
    <button onclick="showCode()">Show JavaScript</button>
    <button onclick="runCode()">Run JavaScript</button>
  </p>

  <div id="blocklyDiv" style="height: 480px; width: 600px;"></div>

  <xml id="toolbox" style="display: none">
    
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
   
    <category name="Text">
      <block type="text"></block>
      <block type="text_length"></block>
      <block type="text_print"></block>
    </category>
  </xml>

  <xml id="startBlocks" style="display: none">

    <variables></variables>
  <block type="controls_repeat_ext" id="j{,d=V5R/%36CP#M=}Ah" x="188" y="38">
    <value name="TIMES">
      <shadow type="math_number" id="h/Ks)Raitx_8-Tqm!=y5">
        <field name="NUM">5</field>
      </shadow>
    </value>
    <statement name="DO">
      <block type="text_print" id="CLxWr.x8-@IbeAem/5G@">
        <value name="TEXT">
          <shadow type="text" id="3h;^4L0Z{kIpkw{U_aUh">
            <field name="TEXT">Caracol</field>
          </shadow>
        </value>
      </block>
    </statement>
  </block>

    
  </xml>

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
  </script>

</body>
</html>
