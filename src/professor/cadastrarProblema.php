<?php
  require ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');

  require ($_SERVER["DOCUMENT_ROOT"].'/blocosJS.php');

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
	<body>
      <div class="table-users">
        <div class="header">Cadastro de Problemas</div>
          <form name="formulario" onsubmit="return recebeResposta();"
           class="form form-control" action="/professor/recebeProblema.php" method="POST">
           <input type="hidden" name="resposta" required="required">
        <table>
          <tr>
            <th width="25%"><label>Descrição*</label></th>
            <td>
              <textarea name="descricao" rows="4" cols="60" required="required" placeholder="Digite Aqui"></textarea>
            </td>
          </tr>
          <tr>
            <th>
              <label>Classificação*</label>
            </th>
            <td>
              <select name="classificacao" required="required">
                <option value="">Selecione a dificuldade</option>
                <option value="F">Fácil</option>
                <option value="M"> Médio</option>
                <option value="D"> Difícil</option>
              </select>
            </td>
          <tr>
            <th><label>Assunto *</label></th>
            <td>
              <?=gerarSelectAssuntos($conexao);?>
            </td>
          </tr>
          <tr>
            <th colspan="2">
              <center>Responder nessa parte abaixo. <br/>
              <?php 
                require ($_SERVER["DOCUMENT_ROOT"].'/util/blocos.php');
              ?>
              </center>
            </th>
          </tr>
          <tr>
            <th colspan="2">
              <button type="submit" class="btn btn-sm btn-success">Enviar Problema</button>
            </th>
          </tr>

    </tr>
  </table>
      </form>
      </div>
  </body>
</html>