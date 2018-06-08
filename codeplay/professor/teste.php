<?php

	
	require ('../conexao.php');
			$idAtividade = $_GET["id"];
			$sql = "select * from Atividade where id = ?";
			$stmt = $conexao->prepare($sql);
			$stmt->bindValue(1, $idAtividade);
			$stmt->execute();




			$descAtividade;
			

			foreach ($stmt as $key) {
				
				$descAtividade = $key["desc_Atividade"];
				

			}
			echo "$descAtividade<br>";

			

			$idsProbBD;

			$sql = "select id_problema from Problema_Atividade where id_atividade = ?";
			$stmt = $conexao->prepare($sql);
			$stmt->bindValue(1, $idAtividade);
			$stmt->execute();


			$count = 0;
			foreach ($stmt as $key) {
				

				$idsProbBD[$count] = $key["id_problema"];
				$count = $count + 1;
			}
			echo var_dump($idsProbBD)."<br>";
			echo var_dump($_GET)."<br>";

			$sql = "select p.id, p.desc_Problema, p.classificacao from Problema as p inner join Problema_Atividade as PA on p.id = PA.id_problema where PA.id_atividade = ?";
						$result = $conexao->prepare($sql);
						$result->bindValue(1, $idAtividade);
						$result->execute();
				$probAtv;
				
				$count = 0;
				foreach ($result as $chave) {

					$probAtv[$count] = $chave["id"];
					$count = $count+1;
				}

				echo var_dump($probAtv)."<br>";

				for ($i=0; $i < $idsProbBD.lenght(); $i++) { 
					if ($idsProbBD["$i"] == $probAtv["$i"]) {
						echo "Iguais"."<br>";
					}else {
						echo "Diferenres"."<br>";
					}
				}


?>