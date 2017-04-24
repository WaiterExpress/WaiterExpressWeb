<?php

class DbOperation
{
    //Database connection link
    private $con;

    //Class constructor
    function __construct()
    {
        //Getting the DbConnect.php file
        require_once dirname(__FILE__) . '/DbConnect.php';

        //Creating a DbConnect object to connect to the database
        $db = new DbConnect();

        //Initializing our connection link of this class
        //by calling the method connect of DbConnect class
        $this->con = $db->connect();
    }

    //storing token in database 
    
	
	public function registerDevice($email,$token,$numerocel,$contrasena){
        if(!$this->isEmailExist($email) and !$this->isnumerocelexist($numerocel)){
         $stmt = $this->con->prepare("INSERT INTO usuarios (email,token,numerocel,contrasena) VALUES (?,?,?,?) ");
            $stmt->bind_param("ssis",$email,$token,$numerocel,$contrasena);
            if($stmt->execute())
                return 0; //return 0 means success
            return 1; //return 1 means failure
        }else{
			
			
			
			
			if(strcmp($this->contrasena($email),$contrasena)){ return 2; }  
				 
				 else{
					 return 3;
				 }
				
			
			
          //returning 2 means email already exist
        }
    }
	
	
	
	

	
	

	
	 private function isnumerocelexist($numerocel){
        $stmt = $this->con->prepare("SELECT id FROM usuarios WHERE numerocel = ?");
        $stmt->bind_param("i",$numerocel);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        $stmt->close();
        return $num_rows > 0;
    }
	
	 public function contrasena($email){
        $stmt = $this->con->prepare("SELECT contrasena FROM usuarios WHERE email = ?");
        $stmt->bind_param("s",$email);
        $stmt->execute(); 
        $result = $stmt->get_result()->fetch_assoc();
		if($result!=false){
		$result =  implode("",$result);
		return $result;
		}
		return false;
        //return array($result['contrasena']);        
    }
	

    //the method will check if email already exist 
    private function isEmailexist($email){
        $stmt = $this->con->prepare("SELECT id FROM usuarios WHERE email = ?");
        $stmt->bind_param("s",$email);
        $stmt->execute();
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
        $stmt->close();
        return $num_rows > 0;
    }

    //getting all tokens to send push to all usuarios
    public function getAllTokens(){
        $stmt = $this->con->prepare("SELECT token FROM usuarios");
        $stmt->execute(); 
        $result = $stmt->get_result();
        $tokens = array(); 
        while($token = $result->fetch_assoc()){
            array_push($tokens, $token['token']);
        }
        return $tokens; 
    }

    //getting a specified token to send push to selected device
    public function getTokenByEmail($email){
        $stmt = $this->con->prepare("SELECT token FROM usuarios WHERE email = ?");
        $stmt->bind_param("s",$email);
        $stmt->execute(); 
        $result = $stmt->get_result()->fetch_assoc();
        return array($result['token']);        
    }

    //getting all the registered usuarios from database 
    public function getAllusuarios(){
        $stmt = $this->con->prepare("SELECT * FROM usuarios");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result; 
    }
}