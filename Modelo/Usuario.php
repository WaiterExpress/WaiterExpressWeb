<?php
/**
 * Copyright (C) 2017 Luis Cortes Juarez
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2017, DevFy
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package DevfyFramework
 * @author  Luis Cortes | DevFy
 * @copyright   Copyright (c) 2017, DevFy. (http://www.devfy.net/)
 * @license http://opensource.org/licenses/MIT  MIT License
 * @link    http://www.devfy.net
 * @since   Version 1.0.0
 * @filesource
 */

namespace Modelo;

class Usuario
{

	private $usuario;
	private $clave;
	private $cedula;
	private $nombre;
	private $apellidos;
	private $correo;
	private $con;

	public function __construct(){
 		if (!isset($_SESSION)) session_start();
		$this->con = new Conexion();
	}

	public function set($atributo, $contenido){
		$this->$atributo = $contenido;
	}

	public function get($atributo){
		return $this->$atributo;
	}

	public function Encriptacion($Usuario, $Contrasena){
		$Salt 		= '$q%or@x&klmn#=0y1z2u34v5t678p9sw';
		$UserFilter	= strtoupper($Usuario);
		$User		= filter_var($UserFilter, FILTER_SANITIZE_STRING);
		$PassFilter	= strtoupper($Contrasena);
		$Pass		= filter_var($PassFilter, FILTER_SANITIZE_STRING);
		$Signo		= ':+';
		$PassHash	= serialize($User.$Signo.$Pass);
		$Password 	= hash('sha256', $Salt.$PassHash);
		$mac 		= hash_hmac('sha256', $Password, substr(bin2hex($Salt), -32));
		$base64 	= base64_encode($mac);
		return $base64;
	}

	public function ComprobarUsuario(){
		$this->usuario 	= filter_var($this->usuario, FILTER_SANITIZE_STRING);
		$this->clave 	= filter_var($this->clave, FILTER_SANITIZE_STRING);
		$this->clave  	= $this->Encriptacion($this->usuario, $this->clave);
		$datos 	= $this->con->ConsultaRetorno("CALL `sp_comprobar_usuario`('{$this->usuario}', '{$this->clave}')");
		$row 	= $datos->fetch_array();
		if($row['mensaje'] == 1){
			$_SESSION['usuario'] =  isset($this->usuario) ? $this->usuario : null;
			header("Location:". URL . "home" );
			exit;
		}else{
			echo '<div class="alert alert-danger" role="alert">
            <strong>&iexcl;Hay un problema!</strong> El usuario es incorrecto o no haz activado la cuenta de usuario.
          </div>';
		}
	}

	public function RegistrarUsuario(){
		$this->usuario 	= filter_var($this->usuario, FILTER_SANITIZE_STRING);
		$this->clave 	= filter_var($this->clave, FILTER_SANITIZE_STRING);
		$this->clave  	= $this->Encriptacion($this->usuario, $this->clave);
		$this->cedula 	= filter_var($this->cedula, FILTER_VALIDATE_INT);
		$this->nombre 	= filter_var($this->nombre, FILTER_SANITIZE_STRING);
		$this->apellidos= filter_var($this->apellidos, FILTER_SANITIZE_STRING);
		$this->correo 	= filter_var($this->correo, FILTER_VALIDATE_EMAIL);
		$datos 			= $this->con->Consultasimple("CALL `sp_insert_usuarios`('{$this->cedula}', '{$this->usuario}', '{$this->clave}', '{$this->nombre}', '{$this->apellidos}', '{$this->correo}')");
		echo '<div class="alert alert-success" role="alert">
            <strong>&iexcl;Excelente!</strong> La cuenta ha sido creada.
          </div>';
          header("Location:". URL );
			exit;
	}

	public function CierreSesion(){
		$_SESSION = array();
		session_unset();
		session_destroy();
		echo'<meta http-equiv="refresh" content="1;url='.URL.'"/>';
	}

	public function LoginDatos(){
		$sql 			= "CALL `sp_datos_persona`('{$_SESSION['usuario']}')";
		$datos 			= $this->con->ConsultaRetorno($sql);
		$usuario		= $datos->fetch_assoc();
		return $usuario;
	}

	public function SesionExiste(){
		
		// La sesion no puede estar vacia
		if(empty($_SESSION['usuario'])){
			header("Location: ". URL );
			exit();
		}

		// Regenerar los identificadores de sesión para sesiones nuevas
		if (isset($_SESSION['mark']) === false){
			session_regenerate_id(true);
			$_SESSION['mark'] = true;
		}
	}

	public function isLoginSesionUsuario(){
        if (isset($_SESSION['usuario'])) {
            header("Location: ". URL);
        }
	}

	public function ComprobarSesion(){
		// La sesion no puede estar vacia
		if(empty($_SESSION['usuario'])){
			return true;
		}
	}

	public function isLogin(){
		$this->SesionExiste();
		$datos = $this->LoginDatos();
		return $datos;
	}
}
