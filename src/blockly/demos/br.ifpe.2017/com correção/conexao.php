<?php


try {
  $conn = new PDO('mysql:host=localhost;dbname=blocklyIFPE', 'root', "Eus@uacad001");
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo 'ERROR: ' . $e->getMessage();
}


?>