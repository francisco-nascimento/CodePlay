<!DOCTYPE html>
<html>
<head>
	<title>Problemas a responder</title>
</head>
<script type="text/javascript">

	function verificaChecks() {
	var aChk = document.getElementsByName("idsProb");  
	var count = 0;
	for (var i=0;i<aChk.length;i++){  
		if (aChk[i].checked == true){  
			
			count = count + 1;
			
		} 
	}
	if (count > 10 || count < 1) {
		alert("Preencha entre 1 e 10 Problemas para sua Atividade!");
		return false;
	}
} 
</script>
<body>

	<?php

			require ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');
			require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');
			
			

		?>

		
		<br><br><br><br>

		<table border="1" class="table">
		<form action="/professor/criarAtividades.php" name="formulario" method="GET" onsubmit="return verificaChecks();">

			<tr>
				<th colspan="2">
					<label>Desctição para a atividade: </label>
					<input maxlength="50000" required="required" type="text" name="descAtividade">
				</th>
				<th>
				<p>
					* Insira de 1 a 10 problemas na sua atividade.
				</p>
					
				</th>
			</tr>
		
		
				<tr>
					<td>
						Descrição
					</td>
					<td>
						Ultima alteração
					</td>
					<td>
						Marcar
					</td>
				</tr>

				
				<?php
					
					

				   $resultado = $conexao->prepare("select * from Problema where id_Professor = ?");
				   $resultado->bindValue(1, $_SESSION["id"]);
				   $resultado->execute();

				  foreach($resultado as $linha){ 

				?>
			      <tr>
			         
			         <td><?=$linha['desc_Problema'];?></td>
			         <td><?=$linha['data_Alteracao'];?></td>
			         <td> 

			         <input type="checkbox" name="idsProb" value="<?=$linha["id"];?>">

			          </td>

			       </tr>

				<?php 
					
					} 
				?>
				<tr>
					<td colspan="3">
					<center>
						<button class="btn btn-sm btn-success" type="submit">
							Criar Atividade
						</button>
					</center>
					</td>
				</tr>
				</form>
				
		</table>
		

</body>
</html>

