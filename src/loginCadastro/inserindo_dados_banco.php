<?php 

	try{
			
		require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');

		$matricula = $_POST["matricula"];
		$nome = $_POST["nome"];
		$senha = $_POST["senha"];
		$email = $_POST["email"];
		$situacao = 1;

		$sql = "insert into Professor (matricula, nome, senha, email, situacao) values (?,?,?,?,?)";
			

			$stmt = $conexao->prepare($sql);
			
			
			$senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);
			
				
			$stmt->bindValue(1, $matricula);
			$stmt->bindValue(2, $nome);
			$stmt->bindValue(3, $senhaCriptografada);
			$stmt->bindValue(4, $email);
			$stmt->bindValue(5, 1);
				
			$stmt->execute();

			header("Location: /loginCadastro/loginCadastro.php");

				

	}catch(PDOException $e){
			echo $e->getMessage();
	}
?>