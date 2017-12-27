<?php

require '../../../conexao.php';

	$id = $_POST['id'];

   $resultado = $conexao->prepare("select proble.desc_Problema, proble.classificacao from Problema as proble where proble.id = ?");
   $resultado -> bindParam(1,$id);
   $resultado-> execute();

?>