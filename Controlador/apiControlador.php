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
use \Modelo\Api as Api;
use \Ayudante\Filtro as Filtro;

class apiControlador
{
    private $vista;
    private $api;
    private $filtro;
    
    public function __construct()
    {
        $this->vista    = new Plantilla();
        $this->api      = new Api();
        $this->filtro   = new Filtro();
    }
    
    public function __destruct(){}
    
    public function index(){
        echo 'Api PHP JSON v1.0 | &copy; WaiterExpress '.date('Y');
    }

    /**
     * Formato de envio
     * @url: midominio.com/api/login?correo=luis@midomicio.com&clave=miclave
     */
    public function Login(){
        $this->vista->titulo = "Inicio | Comprobar Usuario";
        if ($_GET) {
            $this->api->set("correo", $this->filtro->Filtrar($_GET['correo'], 'string'));
            $this->api->set("clave", $this->filtro->Filtrar($_GET['clave'], 'string'));
            $this->api->ComprobarLogin();
        }
    }

    public function Usuarios(){
        if($_GET){
            $this->api->set("correo", filter_var($_GET['correo']));
            $this->api->Usuarios();
        }
    }
}
?>
