<?php  

	$resposta = $_POST["resposta"];
	$id;
	include "conexao.php";


	
	$stmt = $conn->prepare('SELECT * FROM resposta WHERE id = 3');
    
    $stmt->execute(array('id' => $id));


    $row = $stmt->fetch();

    $respostaTeste = $row[1];

    if ( strcasecmp($resposta,$respostaTeste) == 0 ) {
    	echo "$respostaTeste";
    	echo "Acertou, mizerave!";
    }else{

    	echo "Errou... Resposta Certa:";
    	echo "$respostaTeste";
    	echo "Sua resposta : $resposta";
    
    }

    echo strcasecmp($resposta,$respostaTeste);
	
?>