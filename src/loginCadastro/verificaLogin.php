<?php
	
 

  
  $senha = $_POST["senha"];
  $professor = $_POST["tipoUsuario"];
  $email = $_POST["email"];
  $sql;

  include ($_SERVER['DOCUMENT_ROOT'] .'/conexao.php');

  if ($professor == 1) {

		
	
		$sql = "select * from Professor where email = ? ";

	

	}else{

		
		$sql = "select * from Aluno where email = ? ";

		
	}

  try{

	$stmt = $conexao->prepare($sql);

	$stmt->bindParam(1, $email);

	$stmt->execute();	

	$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	foreach($resultado as $linha){

		if (!isset($linha["email"])) {
			$msg = "Login ou senha incorretos!";

			header("Location: teste.php?".$msg);
		}
	
		if(password_verify($senha, $linha["senha"])){

			session_start();

			$_SESSION["USUARIO_LOGADO"] = 'P';

			$_SESSION["id"]= $linha["id"];

			$_SESSION["USUARIO_LOGADO"];
			$_SESSION["matricula"] = $linha["matricula"];
			

			if ($professor == 1) {
				$_SESSION["USUARIO_LOGADO"] = 'P';
			}else{
				$_SESSION["USUARIO_LOGADO"] = 'A';
				
				$_SESSION["situacao"] = $linha["situacao"];

				$sql1 = "select a.id, at.id_turma from Aluno as a left join Aluno_Turma as at on a.id = at.id_aluno where at.id_aluno = ?;";

				$stmt1 = $conexao->prepare($sql1);
				$stmt1->bindValue(1, $_SESSION["id"]);

				$stmt1->execute();

				foreach ($stmt1 as $chave) {
					if ($chave["id_turma"] != null || strcmp($chave["id_turma"], "") != 0) {
						
						$_SESSION["idTurma"] = $chave["id_turma"];

					}
				}
			}
			

			
			
			$_SESSION["email"] = $linha["email"];
			$_SESSION["nome"] = $linha["nome"];

			


			if ($linha["situacao"] == 0) {

					header("Location: /aluno/primeiroLogin/primeiroLogin.php");

			}elseif ($linha["situacao"] == null || strcmp($linha["situacao"], "")) {

				header("Location: ".'/index.php');

			}

			

		}else{
			header("Location: loginCadastro.php");
		}
	}
	}	catch(PDOException $e){
		echo $e->getMessage();
	}
?>