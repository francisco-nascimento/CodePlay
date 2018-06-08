<?php 
require ($_SERVER["DOCUMENT_ROOT"].'/conexao.php');

function verificaEmail($email, $conexao){

		$sql = "select email from Professor where email = ?";

		$stmt1 = $conexao->prepare($sql);

		$stmt1->bindValue(1, $email);
		
		$stmt1->execute();

		$true = 1;

		$false = 0;


		$emailP = "a preencher";
		foreach ($stmt1 as $key) {

			$emailP = $key;
			
		}

		if (strcasecmp($email, $emailP) == 0) {
			return $true;
		}else{
			return $false;
		}
}

$matricula = $_POST["matricula"];
$nome = $_POST["nome"];
$senha = $_POST["senha"];
$email = $_POST["email"];
$situacao = 1;

	

	if (verificaEmail($email, $conexao) == 1) {
			$msg = "Email ou Matricula Já cadastrados";
			header("Location: /loginCadastro/loginCadastro.php?msg=$msg");
	}else{

		try{
				
			

			

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
	}
?>