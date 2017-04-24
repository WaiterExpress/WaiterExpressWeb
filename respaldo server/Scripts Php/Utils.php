<?php

/**
 * This class provides the BD interaction utility required to register an user
 */
require 'Database.php';
require 'class.phpmailer.php';
require 'class.smtp.php';

class Utils
{
    function __construct()
    {
    }
	
	public static function is_email_registered($email)
    {
        $query = "SELECT account_state FROM usuarios WHERE email = '". $email."'";
        try {
			
            $command = Database::getInstance()->getDb()->prepare($query);
            $command->execute();
			$result_data = $command->fetchAll(PDO::FETCH_ASSOC);

			if(count($result_data)>0){  // If the account exists, we need to validate if it has been verfied or not
				$account_state = $result_data[0]['account_state'];
				return $account_state;		
			}
			return -1; // Account not created		
			//var_dump(count($result_data));			
			//return $result_data;//(count($result_data) > 0) ;
			
        } catch (PDOException $e) {
            return $e;//false;
        }
    }
	
	public static function insert_account($email, $token, $phone, $hash_pass)
    {
		$stmt = Database::getInstance()->getDb()->prepare("INSERT INTO usuarios (email,token,phone,hash_pass) VALUES ('$email','$token',$phone,'$hash_pass')");
		if($stmt->execute())
			return true; // success
		return false; //failure
	}
	
	
	public static function send_email($registering_email, $email_hash)
    {
		$mail = new PHPMailer;
		$mail->isSMTP();
		//Enable SMTP debugging
		// 0 = off (for production use)
		// 1 = client messages
		// 2 = client and server messages
		$mail->SMTPDebug = 0;		
		$mail->Debugoutput = 'html';
		$mail->Host = 'smtp.gmail.com';		
		$mail->SMTPSecure = 'ssl'; 
		$mail->Port = 465; 	
		$mail->SMTPAuth = true;
		$mail->Username = "waiterexpress12@gmail.com";
		$mail->Password = "WEXexpress12";
		$mail->setFrom('waiterexpress12@gmail.com', 'WEX');
		$mail->addAddress($registering_email, 'Nuevo usuario!!');
	
		$mail->Subject = 'Verificacion de usuario';
		$mail->isHTML(true);
		
		$msg = '';
		$msg .= 'Gracias por utilizar WEX!';
		$msg .= '<br/>';
		$msg .= '<br/>Su cuenta ha sido creada correctamente.';
		$msg .= '<br/>';
		$msg .= '<br/> Para verificarla, por favor <a href="';
		$msg .='http://52.38.158.11:80/i_wishdata/verify_account.php?';
		$msg .= 'e=';
	    $msg .= $registering_email;
		$msg .= '&h=';
	    $msg .= $email_hash;
		$msg .=' ">haga click aquí</a>.';
	
		$mail->Body = $msg;
	
		//send the message, check for errors
		if (!$mail->send()) {
			echo "Mailer Error: " . $mail->ErrorInfo;
		} else {
			echo "Message sent!";
		}
		
    }
		
	
	
}

?>