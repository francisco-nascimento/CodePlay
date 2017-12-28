<?php

require '../../../conexao.php';

	

   $resultado = $conexao->prepare("select desc_Problema, classificacao from Problema where id = 1");
   //$resultado->bindParam(1,$id);
   $resultado->execute();

?>