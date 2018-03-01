
<?php
	
 

  
  $senha = $_POST["senha"];
  $professor = $_POST["tipoUsuario"];
  $email = $_POST["email"];
  $sql;
  $email;

  try{

	include ($_SERVER['DOCUMENT_ROOT'] .'/conexao.php');



	if ($professor == 1) {

		if (strlen($email) == 13) {
			$sql = "select * from Professor where matricula = ? ";		
		}else{
	
		$sql = "select * from Professor where email = ? ";

		}

	}else{

		if (strlen($email) == 13) {
			$sql = "select * from Aluno where matricula = ? ";		
		}else{

		$sql = "select * from Aluno where email = ? ";

		}
	}

	$stmt = $conexao->prepare($sql);

	$stmt->bindParam(1, $email);

	$stmt->execute();	

	$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	foreach($resultado as $linha){
	
		if(password_verify($senha, $linha["senha"])){

			session_start();

			$_SESSION["USUARIO_LOGADO"] = 'P';

			$_SESSION["id"]= $linha["id"];

			if ($professor == 1) {
				$_SESSION["USUARIO_LOGADO"] = 'P';
			}else{
				$_SESSION["USUARIO_LOGADO"] = 'A';
				$_SESSION["matricula"] = $linha["matricula"];
				$_SESSION["situacao"] = $linha["situacao"];

				if ($linha["situacao"] != 1) {
					header("Location: /aluno/primeiroLogin.php");
				}

				
			}
			
			
			
			$_SESSION["email"] = $linha["email"];
			$_SESSION["nome"] = $linha["nome"];
			
			
			$_SESSION["matricula"] = $linha["matricula"];

			
			


			header("Location: ".'/index.php');

		}else{
			header("Location: loginCadastro.php");
		}
	}
	}	catch(PDOException $e){
		echo $e->getMessage();
	}
?>
