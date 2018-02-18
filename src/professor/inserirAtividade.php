<?php 

	//var_dump($_GET);

	$atv[20];
	$count = 0;

	foreach ($_GET as $linha) {
		
		$atv[$count] = $linha;
		$count = $count + 1;

	}

	var_dump($atv)


?>