<!DOCTYPE html>
<html>
	<head>
		<title>Cadastrar Problema</title>
    <link rel="stylesheet" type="text/css" href="/util/meu.css">

	</head>
		
		<br>
		<br>
		<br>
	

	</script>
	<body>
		<?php

			require ($_SERVER["DOCUMENT_ROOT"].'/verifica.php');

      $msg = $_GET["msg"];
			

		?>

    <p>
      <?=$msg;?>
    </p>
		
    <form action="/professor/inserirAluno.php" method="POST">
      <div class="form-group">
        <label for="exampleInputEmail1">Matricula do Aluno</label>
        <input type="text" id="exampleInputEmail1" required="required" minlength="13" maxlength="13" name="matricula" aria-describedby="Matricula" placeholder="Digite a Matricula">
      </div>
      <button class="btn btn-primary">Cadastrar Aluno</button>
    </form>
</body>
</html>
