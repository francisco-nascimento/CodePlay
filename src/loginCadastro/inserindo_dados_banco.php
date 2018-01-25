<?php 

	try{
			
		$conexao = new PDO('mysql:host=localhost;dbname=Codeplay', "root", "@luno1fpe");
		$conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		$matricula = $_POST["matricula"];
		$nome = $_POST["nome"];
		$senha = $_POST["senha"];
		$email = $_POST["email"];
		$situacao = 1;

		$inserirAluno = "insert into Aluno (matricula, nome, senha, email, situacao) values (?,?,?,?,?)";
		$inserirProfessor = "insert into Professor (matricula, nome, senha, email, situacao) values (?,?,?,?,?)";
			
		if($_POST['tipoUsuario'] == 1){

			$sql = $inserirProfessor;

		}else{

			$sql = $inserirAluno;

		}

			$stmt = $conexao->prepare($sql);
			
			
			$senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);
			
				
			$stmt->bindValue(1, $matricula);
			$stmt->bindValue(2, $nome);
			$stmt->bindValue(3, $senhaCriptografada);
			$stmt->bindValue(4, $email);
			$stmt->bindValue(5, 1);
				
			$stmt->execute();

			header("Location: loginCadastro.php");

				

	}catch(PDOException $e){
			echo $e->getMessage();
	}
?>