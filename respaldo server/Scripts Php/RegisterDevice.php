<?php 
 require_once 'DbOperation.php';
 $response = array(); 
 
 if($_SERVER['REQUEST_METHOD']=='POST'){
 
  $body = json_decode(file_get_contents("php://input"), true);
  
     $email=$body['email'];
  $token=$body['token'];
  $numerocel=$body['numerocel'];
 $contrasena=$body['contrasena'];
       
 
 //$token = $_POST['token'];
 //$email = $_POST['email'];
 //$numerocel = $_POST['numerocel'];
// $contrasena = $_POST['contrasena'];
 
 $db = new DbOperation(); 
 
 $result = $db->registerDevice($email,$token,$numerocel,$contrasena);
 
 if($result == 0){
 $response['ingresar'] = "registrar"; 
 $response['message'] = 'user is going to register';
 }elseif($result == 2){
 $response['ingresar'] = "incorrecto"; 
 $response['message'] = "incorrect pass";
 }
 elseif($result == 3){
 $response['ingresar'] = "correcto"; 
 $response['message'] = 'correct pass';
 }
 elseif($result == 4){
 $response['ingresar'] = false; 
 $response['message'] = 'incorrect password';
 }
 
 
 else{
 $response['error'] = true;
 $response['message']='Device not registered';
 }
 }else{
 $response['error']=true;
 $response['message']='Invalid Request...';
 }
 
 echo json_encode($response);