<!DOCTYPE html>
<html>
	<head>
		<title>Responder Problema</title>
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

    function testaResposta(){
      var gabarito = document.formulario.resposta.value;
      var code = Blockly.JavaScript.workspaceToCode(demoWorkspace);
      if ((code != "" && code != null) && (gabarito != "" && gabarito != null)){

        document.formulario.respostaAluno.value = code;

            if (code == gabarito) {
              alert("Acertou Mizeravi");

              document.formulario.correcao.value = 1;

              return true;
              
            }else{
              alert("Erroooooooooou");
              
              document.formulario.correcao.value = 0;

              return true;
              
            }

      }else{

        alert("Preencha a resposta");
        return false;

      }
    }
    
  </script>
		
	</head>
	
	<?php
		require ($_SERVER["DOCUMENT_ROOT"].'/blocosJS.php');
	?>

  <?php

  require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');

    $idAtividade = $_GET["idAtividade"];
    $idProblema = $_GET["idProblema"];

    $sql = "SELECT * FROM Problema WHERE id = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(1, $_GET["idProblema"]);
    $stmt->execute();

    $descProblema;
    $assunto;

    foreach ($stmt as $key) {
      $descProblema = $key["desc_Problema"];
      $assunto = $key["assunto"];
    }

    $sql = "SELECT * FROM Gabarito WHERE id_Problema = ?";
    $stmt = $conexao->prepare($sql);
    $stmt->bindValue(1, $_GET["idProblema"]);
    $stmt->execute();

    $descGabarito;
    $assunto;

    foreach ($stmt as $key) {
      $descGabarito = $key["desc_Gabarito"];
      
    }


  ?>
		
		<br>
		<br>
		<br>
	

	</script>
	<body>
		<?php

			require ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');
			

		?>

    <button onclick="testaResposta();">testar resposta</button>
		
    <table class="table">

	<form name="formulario" onsubmit="return testaResposta();" class="form form-control" action="/aluno/insereRespostaProblemaAtividade.php" method="POST">

      <input type="hidden" name="resposta" required="required" value="<?=$descGabarito;?>">
      <input type="hidden" name="respostaAluno">
      <input type="hidden" name="correcao">
      <input type="hidden" name="idAtividade" value="<?=$idAtividade?>">
      <input type="hidden" name="idProblema" value="<?=$idProblema?>">

      <tr>
        <th>Descrição do Problema</th> <th>Assunto</th>
      </tr>
      <tr>
        <td><?=$descProblema;?></td> <td><?=$assunto;?></td>
      </tr>
      

     
      <tr>
        <td colspan="2">
        <center>
      <?php 

      	require ($_SERVER["DOCUMENT_ROOT"].'/util/blocos.php');

       ?>
        </td>
        </center>
       </tr>
      <button type="submit" class="btn btn-sm btn-success">Responder Problema</button>
    </form>
    </table>
		

  

</body>
</html>
