<?php 

	try{

			
			$conexao = new PDO('mysql:host=localhost;dbname=Codeplay', "root", "@ndr0!D");

			$conexao->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

			$matricula = $_POST["matricula"];
			$nome = $_POST["nome"];
			$senha = $_POST["senha"];
			$email = $_POST["email"];



			$inserirAluno = "insert into Aluno (matricula, nome, senha, email) values (?,?,?,?)";
		
			$inserirProfessor = "insert into Professor (matricula, nome, senha, email) values (?,?,?,?)";
			
			if($_POST['tipoUsuario'] == 1){

				$stmt = $conexao->prepare($inserirProfessor);
				session_start();
				$_SESSION["nome"] = $nome;
				$senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);
				$_SESSION["email"] = $email;

				$stmt->bindValue(1, $matricula);
				$stmt->bindValue(2, $nome);
				$stmt->bindValue(3, $senhaCriptografada);
				$stmt->bindValue(4, $email);

				$stmt->execute();

				header("Location: ../");


			}else{
				$stmt = $conexao->prepare($inserirAluno);
			
			
				session_start();
				$_SESSION["nome"] = $nome;
				$senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);
				$_SESSION["email"] = $email;
				
				$stmt->bindValue(1, $matricula);
				$stmt->bindValue(2, $nome);
				$stmt->bindValue(3, $senhaCriptografada);
				$stmt->bindValue(4, $email);
				
				$stmt->execute();

				header("Location: ../");

			}

				

	}catch(PDOException $e){
			echo $e->getMessage();
		}




// var_dump($matricula);

?>
