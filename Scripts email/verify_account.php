<?php
require 'Utils.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
	
	


     //echo Database::getInstance()->getDb()->quote($registering_email);
	
	//$registering_email= "joaraya10.4@gmail.com";
	//Utils::send_email($registering_email,$registering_email); 
       
	//var_dump($registering_email_hash); 
    //var_dump($registering_email); 	
	   
	if(isset($_GET["e"]) && !empty($_GET["e"]) AND isset($_GET["h"]) && !empty($_GET["h"])){

		$registering_email= $_GET["e"];
		$registering_email_hash= $_GET["h"];
	
	
		$query = "SELECT * FROM usuarios WHERE email='".$registering_email."' AND account_state='0'";

		//$query = "SELECT * FROM usuarios WHERE email='".$registering_email."' AND hash='".$registering_email_hash."' AND account_state='0'";
		//var_dump($query); 
		
		try {
			
			$command = Database::getInstance()->getDb()->prepare($query);
			$command->execute();
			$result_data = $command->fetchAll(PDO::FETCH_ASSOC);

			if(count($result_data)>0){  // The account exists and needs to be activated in BD
				$query2 ="UPDATE usuarios SET account_state='1' WHERE email='".$registering_email."' AND account_state='0'";
				$command2 = Database::getInstance()->getDb()->prepare($query2);
				$command2->execute();
				echo '<div style=" padding: 3px; background: #EDEDED;border: 1px solid #DFDFDF; ">Your account has been activated, you can now login</div>';	
			}else{
				// No match -> invalid url or account has already been activated.
				echo '<div style="padding: 3px; background: #EDEDED;border: 1px solid #DFDFDF;">The url is either invalid or you already have activated your account.</div>';			
				//var_dump(count($result_data));	
			}		
		} catch (PDOException $e) {
			echo $e;
		}
		   
	}
	else{
		// Invalid approach
		echo '<div style="padding: 3px; background: #EDEDED;border: 1px solid #DFDFDF;">Invalid approach, please use the link that has been send to your email.</div>';
	} 
}