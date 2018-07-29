<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: *");


$consulta=json_decode(file_get_contents('php://input'));



 $dsn = 'mysql:dbname=test;host=localhost:3306';
 $user = 'root';
 $password = '';

 //enable ssh access mysql xampp
 //GRANT ALL PRIVILEGES ON . TO root@'%' IDENTIFIED BY 'password';
//FLUSH PRIVILEGES;
 
//SELECT general FROM `prueba` where general=valor;

 $db = new PDO($dsn, $user, $password);

   $stmt = $db->prepare("CALL prueba_consulta(?)");
  $stmt->bindValue(1, $consulta->{'color'}, PDO::PARAM_STR);
   $rs = $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
  echo json_encode($rows);
  
?>