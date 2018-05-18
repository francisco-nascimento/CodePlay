<?php
  require ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');
  require ($_SERVER["DOCUMENT_ROOT"].'/blocosJS.php');
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
    <div class="container-fluid">
      <br>
      <div class="row">
        <div class="col-sm-4">
          <form name="formulario" onsubmit="return recebeResposta();"
           class="form form-control" action="/professor/recebeProblema.php" method="POST">
            <input type="hidden" name="resposta" required="required">

              <label>Descrição do Problema *</label>
              <textarea name="descricao" required="required" placeholder="Digite Aqui"></textarea>
              <br>
              
              <label>Classificação do Problema *</label>
              <select name="classificacao" required="required">
                <option value="">Selecione a dificuldade</option>
                <option value="fácil">Fácil</option>
                <option value="médio"> Médio</option>
                <option value="difícil"> Difícil</option>
              </select>
              <br>

              <label>Assunto do Problema*</label>
              <input type="text" name="assunto" required="required" placeholder="Escreva aqui">
              <br>
              <button type="submit" class="btn btn-sm btn-success">Enviar Problema</button>
            </form>
        </div>
        <div class="col-sm-8" style="background-color:lavenderblush;">

        <center>
        Responder nessa parte abaixo.
        <br>
        <?php 
          require ($_SERVER["DOCUMENT_ROOT"].'/util/blocos.php');
        ?>
        </center>
        </div>
      </div>
    </div>
  </body>
</html>