
<?php
	
 

  
  $senha = $_POST["senha"];
  $professor = $_POST["tipoUsuario"];
  $sql;
  $email;

  try{

	include ($_SERVER['DOCUMENT_ROOT'] .'/conexao.php');



	if ($professor == 1) {
		
		$email = $_POST["email"];
	
		$sql = "select * from Professor where email = ? ";

	}else{

		$email = $_POST["email"];

		$sql = "select * from Aluno where email = ? ";
	}

	$stmt = $conexao->prepare($sql);

	$stmt->bindParam(1, $email);

	$stmt->execute();	

	$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
	
	foreach($resultado as $linha){
	
		if(password_verify($senha, $linha["senha"])){

			session_start();
			
			
			
			$_SESSION["email"]=$linha["email"];
			$_SESSION["nome"]=$linha["nome"];
			$_SESSION["USUARIO_LOGADO"] = 'P';
			$_SESSION["id"]= $linha["id"];
			$_SESSION["matricula"]=$linha["matricula"];

			if ($professor == 1) {
				$_SESSION["USUARIO_LOGADO"] = 'P';
			}else{
				$_SESSION["USUARIO_LOGADO"] = 'A';
			}
			


			header("Location: ".'/index.php');

		}else{

			print "<script> alert('Login ou senhas Incorreto(s)!');</script>";
			header("Location: loginCadastro.php");
		}
	}
	}	catch(PDOException $e){
		echo $e->getMessage();
	}
?>
