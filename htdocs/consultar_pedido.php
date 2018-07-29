<?php
header("Access-Control-Allow-Origin: *");
$dsn = 'mysql:dbname=test;host=localhost:3306';
$user = 'root';
$password = '';

$entrada="Andrea";

$db = new PDO($dsn, $user, $password);

  $stmt = $db->prepare("CALL consultar_pedido()");
  
  $rs = $stmt->execute();
   $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
 echo json_encode($rows);
  
?>