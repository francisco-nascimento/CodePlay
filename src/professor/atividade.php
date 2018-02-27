<!DOCTYPE html>
<html>
<head>
	<title>Problemas a responder</title>
</head>
<script type="text/javascript">
	
	
function verificaChecks() {
	var aChk = document.getElementsByName("idsProb");
	var count = 0;
	for (var i = 0; i < aChk.length; i++){  
		if (aChk[i].checked == true){  
			
			var count = count + 1;

		} 
	}
	if (count < 1 || count > 10) {
		alert("Preencha entre 1 e 10 Problemas para sua atividade.");
		achk.focus();
		return false;
	}
} 
	

</script>
<body>

	<?php

			require ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');
			require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');

			$sql = "select * from Problema";
			$stmt=$conexao->query($sql);
		?>

		
		<br><br><br><br>

		<table border="1" class="table">
		<form action="/professor/criarAtividades.php" name="form" onsubmit="verificaChecks()" method="GET" class="form-control">
		
		
				<tr>
					<th colspan="2">
						<label>Descrição Da Atividade:</label> <input type="text" required="required" name="descricao">
					</th>
					<th>
						*Insira no maximo 10 Problemas na sua atividade.
					</th>
				</tr>
				<tr>
					<th>Adicionar Problemas:</th>
				</tr>
				<tr>
					<td>Descrição do Problema</td>
					<td>Classificação</td>
					<td>Marcar Problema</td>
				</tr>
				<?php
					foreach ($stmt as $key) {
					
				?>
			      <tr>
			         <td><?=$key["desc_Problema"]?></td>
			         <td><?=$key["classificacao"]?></td>
			         <td><input type="checkbox" name="idsProb" maxlength="10" value="<?=$key["id"];?>">
			         </td>
			       </tr>
			      <?php
			  }
			      ?>
				<tr>
					<td colspan="3">
					<center>
						<button type="submit"> Criar </button></a>
					</center>
					</td>
				</tr>
				</form>
				
				
		</table>
		

</body>
</html>

