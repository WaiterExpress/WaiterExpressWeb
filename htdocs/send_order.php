<?php

//Headers, These headers are need allowing a post request by the client.
header("Access-Control-Allow-Origin: *");//Header only need it for testing on the same pc with different servers
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: *");

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
 $inputdata=json_decode(file_get_contents('php://input'));	


 
 //mysql server credentials 
 $dsn = 'mysql:dbname=rest;host=localhost:3306'; 
 $user = 'root';
 $password = '';



 //enable ssh access mysql xampp
 //GRANT ALL PRIVILEGES ON . TO root@'%' IDENTIFIED BY 'password';
//FLUSH PRIVILEGES;
 //FIRST INSERT THE PEDIDO, THEM INSERT EACH ITEM OF THE PEDIDO ONE BY ONE
 

 

 $database = new PDO($dsn, $user, $password);//initilizing the pdo connection.

 $stmt = $database->prepare("CALL send_order(?,?)");//adding the stored procedure to the pdo query
 $stmt->bindValue(1, $inputdata->id_restaurante, PDO::PARAM_STR);
 $stmt->bindValue(2,$inputdata->id_usuario, PDO::PARAM_STR);
// $stmt->bindValue(1,$rest,PDO::PARAM_INT);//The restaurantID 
// $stmt->bindValue(2,$usernumber,PDO::PARAM_INT);
 $rs = $stmt->execute();
 
 $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
// $rows = $stmt->fetch();
 
 
 for($i= 0; $i<count($inputdata->id_productos);$i++){
	 
 $stmt = $database->prepare("CALL send_product(?,?,?)");//adding the stored procedure to the pdo query
 $stmt->bindValue(1, $rows[0]["LAST_INSERT_ID()"], PDO::PARAM_STR);
 $stmt->bindValue(2,$inputdata->id_productos[$i]->id, PDO::PARAM_STR);
 $stmt->bindValue(3,$inputdata->id_productos[$i]->cantidad, PDO::PARAM_STR);
 $rs = $stmt->execute();
 

	 
 }

 
  echo json_encode("se inserto con exito");
 //Test for debugging
 //echo var_dump($rows);
 //echo var_dump($inputdata);
 //echo var_dump($inputdata->id_productos[0]->id);
 //echo count($inputdata->id_productos);
 
}


else{
	echo json_encode("no se agrego con exito");
	
}
?>






{"id_usuario":1, "id_restaurante":"1","id_productos":[{"id":1,"cantidad":2},{"id":2,"cantidad":3}]}