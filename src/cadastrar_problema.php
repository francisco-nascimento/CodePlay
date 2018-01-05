<!DOCTYPE html>
<html>
	<head>
		<title>Cadastrar Problema</title>
	</head>
	<body>
		<div>
			<form action="recebeProblema.php" method="post">
			<!-- <input type="hidden" name="id" value="1"> -->
				<label>Pergunta</label><textarea class="textarea" name="descricao"></textarea>
				<label>Classificação</label>
				<select name="dificuldade">
					<option value="">Selecione o nível da questão</option>
					<option value="Facil">Fácil</option>
					<option value="Media">Média</option>
					<option value="Dificil">Difícil</option>
				</select>
				<label>Resposta</label><textarea class="textarea" name="gabarito"></textarea>
				<input type="submit" value="Submeter">
			</form>
		</div>
	</body>
</html>