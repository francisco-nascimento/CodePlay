<?php

//Recebendo os parametros do usuario

$senha = $_POST["senha"];
$professor = $_POST["tipoUsuario"];
$email = $_POST["email"];
$sql = "verifique o sql";

require ($_SERVER['DOCUMENT_ROOT'].'/conexao.php');
require ($_SERVER["DOCUMENT_ROOT"].'/aluno/areaAluno.php');
require ($_SERVER["DOCUMENT_ROOT"].'/aluno/AreaAlunoDAO.php');

//Verificado se quem está logando é aluno ou um professor

if ($professor == 1) {

	$sql = "select * from Professor where email = ?";

}else{

	$sql = "select * from Aluno where email = ?";
		
}

	$stmt = $conexao->prepare($sql);

	$stmt->bindParam(1, $email);

	$stmt->execute();	

	if (!is_null($stmt)) {

		foreach ($stmt as $key) {
				$usuario["nome"] = $key["nome"];
				$usuario["email"] = $key["email"];
				$usuario["id"] = $key["id"];
				$usuario["matricula"] = $key["matricula"];
				$usuario["senha"] = $key["senha"];
				$usuario["situacao"] = $key["situacao"];
				$usuario["id_turma"] = $key["id_turma"];		 
			}
		if(password_verify($senha, $usuario["senha"])){

			/* define o limitador de cache para 'private' */

			session_cache_limiter('private');
			$cache_limiter = session_cache_limiter();

			/* define o prazo do cache em 30 minutos */
			session_cache_expire(30);
			$cache_expire = session_cache_expire();

			/* Inicia a sessão */

			session_start();

			$_SESSION["id"] = $usuario["id"];

			$_SESSION["USUARIO_LOGADO"] = 'P';

			$_SESSION["situacao"] = $usuario["situacao"];

			$_SESSION["matricula"] = $usuario["matricula"];

			$_SESSION["nome"] = $usuario["nome"];

			$_SESSION["email"] = $usuario["email"];	

			if ($professor == 1) {
				$_SESSION["USUARIO_LOGADO"] = 'P';
			}else{
				$_SESSION["USUARIO_LOGADO"] = 'A';
				$_SESSION["idTurma"] = $usuario["id_turma"];

				$turmaConfigDAO = new TurmaConfiguracaoDAO($conexao);
				$config = $turmaConfigDAO->getByTurma($usuario["id_turma"]);
				$_SESSION["config"] = serialize($config);
			}
			// if (strcmp($usuario["situacao"], "0") == 0) {

			// 		header("Location: /aluno/alterar_senha.php");

			// }
			if ($usuario["situacao"] == null || strcmp($usuario["situacao"], "")) {

				header("Location: ".'/index.php');

			}

		}else{
			header("Location: /loginCadastro/loginCadastro.php?msg=1");
		}
	}



?>