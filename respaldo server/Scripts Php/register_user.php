<?php
require 'Utils.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	
	$postData = json_decode(file_get_contents("php://input"), true); // Read the post data as it is in JSON format
	
	$registering_email= $postData["email"];
	
    $user_account_state = Utils::is_email_registered($registering_email); // Return -1 if account has not been created, 1 if it has been verified or 0 if it has not
	
	var_dump($user_account_state);

	$email_crypt = $registering_email;//crypt($registering_email,$registering_email);
	//$res = hash_equals($email_crypt, crypt($registering_email,$email_crypt ));
	
	if($user_account_state == -1){ // Account not created

		//$is_user_stored =  Utils::insert_account($registering_email, "tokentest", 55345345 , "hash"); // We must store the data of the new account
		//if($is_user_stored)
			Utils::send_email($registering_email,$email_crypt); // If the user was entered successfully, send a confirmation email
	}
	else if($user_account_state == 0){
		// Send notification to phone that account is already created , just need to verify email
		Utils::send_email($registering_email,$email_crypt); // Send a confirmation email again	
	}
	else{
		// Login process
		echo "login";
		
	}
	
	

	
	
/*     if ($is_user_registered) {

	        print json_encode(array(
            "estado" => 1,
            "mensaje" => "Ya esta"
        )); */
/*         $datos["estado"] = 1;
        $datos["menu"] = $menu;

        print json_encode($datos); */
/*     } else {
        print json_encode(array(
            "estado" => 2,
            "mensaje" => "Ha ocurrido un error"
        ));
    } */	
}