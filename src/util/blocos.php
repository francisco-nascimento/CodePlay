
<!-- <td>

<form name="formBanco" action="/professor/teste.php" method="POST" onsubmit="recebeResposta();">
        <input type="hidden" name="resposta">
        <input type="submit" name="inserir resposta" value="INserir no banco">
</form> -->

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
<td>
   <xml id="startBlocks" style="display: none">
    </xml>
    <input type="hidden" name="gabarito">

</td>

<td>
     <p>
   <!--  <button onclick="showCode();">Show JavaScript</button>
    <button onclick="runCode();">Run JavaScript</button>
    <button type="submit"> Enviar resposta </button> -->
  </p>
 </td>

 <script>
    var demoWorkspace = Blockly.inject('blocklyDiv',
        {media: '/blockly/media/',
         toolbox: document.getElementById('toolbox')});
    Blockly.Xml.domToWorkspace(document.getElementById('startBlocks'),
                               demoWorkspace);

    
  </script>