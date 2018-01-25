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
	

 

 

<?php
  require ($_SERVER['DOCUMENT_ROOT'].'/util/blocos.php');
?>





</tr>

</form>

</table>
    

  

</body>
</html>
