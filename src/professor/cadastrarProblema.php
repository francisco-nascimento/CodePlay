<?php
  require ($_SERVER["DOCUMENT_ROOT"].'/util/autorizador-professor.php');

  require ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');

  require ($_SERVER["DOCUMENT_ROOT"].'/blocosJS.php');
  require ($_SERVER["DOCUMENT_ROOT"].'/util/analyzeJSCode.php');

  function gerarSelectAssuntos($con){
    $sql = "SELECT id, descricao FROM Assunto";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $html_select = "<SELECT name ='sel-assunto' id='sel-assunt'>";
    $html_select .= "<option value='-1'>Selecione um assunto</option>";
    while($linha = $stmt->fetch(PDO::FETCH_ASSOC)){
      $html_select .= "<option value='$linha[id]'>$linha[descricao]</option>";
    }
    $html_select .= "</select>";
    return $html_select;
  }
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Code && Play - Cadastrar Problema</title>
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
        // window.LoopTrap = 1000;
        // Blockly.JavaScript.INFINITE_LOOP_TRAP =
        //     'if (--window.LoopTrap == 0) throw "Infinite loop.";\n';
        var code = Blockly.JavaScript.workspaceToCode(demoWorkspace);
        // Blockly.JavaScript.INFINITE_LOOP_TRAP = null;
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
        }else{
          window.alert("Preencha a resposta do Problema!");
          return false;
        }
      }
    </script>
	</head>
	<body>
      <div class="table-users">
        <div class="header">Cadastro de Problemas</div>
          <form name="formulario" onsubmit="return recebeResposta();"
           class="form form-control" action="/professor/recebeProblema.php" method="POST">
           <input type="hidden" name="resposta" required="required">
        <table>
          <tr>
            <th width="25%" colspan="2"><label>Descrição*</label><br/>
              <textarea name="descricao" rows="3" cols="80" required="required" placeholder="Descreva o enunciado do problema"></textarea>
            </th>
          </tr>
          <tr>
            <th><label>Assunto *</label>
              <br/>
              <?=gerarSelectAssuntos($conexao);?>
            </th>            
            <th>
              <label>Classificação*</label><br/>
              <select name="classificacao" required="required">
                <option value="">Selecione a dificuldade</option>
                <option value="F">Fácil</option>
                <option value="M"> Médio</option>
                <option value="D"> Difícil</option>
              </select>
            </th>
          </tr>
          <tr>
            <th colspan="2">
              Resolva o problema usando Blockly<br/>
              <?php 
                require ($_SERVER["DOCUMENT_ROOT"].'/util/blocos.php');
              ?>
            </th>
          </tr>
          <tr>
            <td colspan="2">
              <button type="button" onclick="javascript:showCode()" class="btn btn-sm btn-success">Exibir JS</button> &nbsp;&nbsp;&nbsp;
              <button type="button" onclick="javascript:runCode()" class="btn btn-sm btn-success">Executar JS</button>&nbsp;&nbsp;&nbsp;
              <button type="submit" class="bt-ok">Salvar</button> 
            </td>
          </tr>

    </tr>
  </table>
      </form>
      </div>
  </body>
</html>