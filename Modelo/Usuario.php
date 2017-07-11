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
use \Ayudante\Encriptacion as Encriptacion;
use \Ayudante\Url as Url;

class Usuario
{

	private $usuario;
	private $clave;
	private $cedula;
	private $nombre;
	private $apellidos;
	private $correo;
	private $con;
    private $hash;
	private $crypt;
	private $email;
	private $url;

	public function __construct()
	{
		if (!isset($_SESSION)) session_start();
		$this->con    	= new Conexion();
		$this->crypt 	= new Encriptacion();
		$this->url 		= new Url();
	}

	public function set($atributo, $contenido)
	{
		$this->$atributo = $contenido;
	}

	public function get($atributo)
	{
		return $this->$atributo;
	}

	public function ComprobarUsuario()
	{
        $this->hash  	= $this->crypt->encrypt_decrypt('encrypt', filter_var($this->clave, FILTER_SANITIZE_STRING));
		$datos 			= $this->con->ConsultaRetorno("CALL `sp_comprobar_login`('{$this->email}', '{$this->hash}')");
		$row   			= $datos->fetch_array();
		if($row['login'] == 1){
			$_SESSION['usuario'] =  isset($this->email) ? $this->email : null;
			switch ($row['id_roles']) {
				case 0:
					header("Location:". $this->url->UrlBase('app/admin'));
					exit;
					break;
				case 1:
					header("Location:". $this->url->UrlBase('app/gerente'));
					exit;
					break;
				case 2:
					header("Location:". $this->url->UrlBase('app/cocinero'));
					exit;
					break;
				case 3:
					header("Location:". $this->url->UrlBase('app/salonero'));
					exit;
					break;
				case 4:
					header("Location:". $this->url->UrlBase('app/cliente'));
					exit;
					break;
				
				default:
					header("Location: https://wwww.google.com" );
					exit;
					break;
			}
		}else{
			echo '<div class="alert alert-danger" role="alert">
            <strong>&iexcl;Hay un problema!</strong> El usuario o la contrase&ntilde;a son incorrectas o su cuenta de usuario no ha sido activada.
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
		$sql 			= "CALL `sp_buscar_usuario`('{$_SESSION['usuario']}')";
		$datos 			= $this->con->ConsultaRetorno($sql);
		$usuario		= $datos->fetch_assoc();
		return $usuario;
	}

    public function SesionExiste()
    {
        
        // La sesion no puede estar vacia
        if (empty($_SESSION['usuario'])) {
            header("Location: " . URL . "usuario/ingresar/");
            exit();
        }
        
        // Regenerar los identificadores de sesión para sesiones nuevas
        if (isset($_SESSION['mark']) === false) {
            session_regenerate_id(true);
            $_SESSION['mark'] = true;
        }
    }

	public function isLoginSesionUsuario(){
        if (isset($_SESSION['usuario'])) {
            header("Location: ". URL.'usuario/ingresar/');
        }
	}

    public function ComprobarSesion()
    {
        // La sesion no puede estar vacia
        if (empty($_SESSION['usuario'])) {
            return true;
        }
    }

    public function isLogin()
    {
        $this->SesionExiste();
        $datos = $this->LoginDatos();
        return $datos;
    }
}
