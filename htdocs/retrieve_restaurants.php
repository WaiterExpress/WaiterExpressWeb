<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: *");

if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
	
 
	
 //mysql server credentials 
 $dsn = 'mysql:dbname=rest;host=localhost:3306'; 
 $user = 'root';
 $password = '';

 //enable ssh access mysql xampp
 //GRANT ALL PRIVILEGES ON . TO root@'%' IDENTIFIED BY 'password';
//FLUSH PRIVILEGES;
 
 
 $database = new PDO($dsn, $user, $password);//initilizing the pdo connection.

 $stmt = $database->prepare("CALL retrieve_restaurants()");//adding the stored procedure to the pdo query
 $rs = $stmt->execute();
 $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
  echo json_encode($rows);
}
?>