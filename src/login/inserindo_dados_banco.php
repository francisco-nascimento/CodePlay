<?php 

	try{

			
			$conexao = new PDO('mysql:host=localhost;dbname=Pesquisa', "root", "1994");

			$conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			$inserirAluno = "insert into Aluno (nome, senha, email) values (?,?,?)";
		
			$inserirProfessor = "insert into Professor (nome, senha, email) values (?,?,?)";
			
			if($_POST['professor'] == 1){

			$stmt = $conexao->prepare($inserirProfessor);
			}else{
				$stmt = $conexao->prepare($inserirAluno);
			}
			
				session_start();
				$nome = $_POST["nome"];
				$_SESSION["nome"] = $nome;
				$senha = $_POST["senha"];
				$senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);
				$email = $_POST["email"];
				$_SESSION["email"] = $email;
				
				
				$stmt->bindValue(1, $nome);
				$stmt->bindValue(2, $senhaCriptografada);
				$stmt->bindValue(3, $email);
				
				



				$stmt->execute();

				header("Location: ../");

	}catch(PDOException $e){
			echo $e->getMessage();
		}




// var_dump($matricula);

?>
