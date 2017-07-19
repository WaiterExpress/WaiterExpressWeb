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
 
namespace Controlador;

use \Vista\Plantilla as Plantilla;
use \Ayudante\Url as Url;
use \Modelo\Usuario as Usuario;

class usuarioControlador
{
    private $vista;
    private $url;
	private $usuario;
    
    public function __construct()
    {
        $this->usuario      = new Usuario();
        $this->vista        = new Plantilla();
        $this->url          = new Url();
        $this->vista->url   = $this->url;
    }
    
    public function __destruct()
    {
    }

    public function Ingresar()
    {
    	$this->vista->titulo = "Iniciar Sesión | " . APPNAME;
    	$this->vista->render('modulos/head.login');
        if ($_POST) {
            $this->usuario->set("email", filter_var($_POST['email']));
            $this->usuario->set("clave", filter_var($_POST['clave']));
            $this->usuario->ComprobarUsuario();
        }
        $this->vista->render('usuario/ingresar');
    	$this->vista->render('modulos/footer.login');
    }

    public function Crear()
    {
        $this->vista->datos =  $this->usuario->isLogin();
    	$this->vista->titulo = "Crear Usuarios | " . APPNAME;
    	$this->vista->render('modulos/head.admin');
        if ($_POST) {
            $this->usuario->set("email", filter_var($_POST['email']));
            $this->usuario->set("clave", filter_var($_POST['clave']));
            $this->usuario->ComprobarUsuario();
        }
        $this->vista->render('usuario/crear');
    	$this->vista->render('modulos/footer');
    }
    
    public function Cerrar(){
        $this->usuario->CierreSesion();
    }
}
?>
