<?php


try {
  $conn = new PDO('mysql:host=localhost;dbname=Pesquisa', 'root', "1994");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}


?>
