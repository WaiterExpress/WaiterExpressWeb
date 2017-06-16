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
 * @package	DevfyFramework
 * @author	Luis Cortes | DevFy
 * @copyright	Copyright (c) 2017, DevFy. (http://www.devfy.net/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://www.devfy.net
 * @since	Version 1.0.0
 * @filesource
 */
namespace Ayudante;

class Filtro{

    private $tipo;
    private $input;
    private $texto;
    private $numeros;
    private $correo;
    private $error;
	
    public static function Filtrar($input, $tipo = 'string')
	{
        switch ($tipo) {
            case 'string':
                return filter_var($input, FILTER_SANITIZE_STRING);
                break;
            case 'int':
                return filter_var($input, FILTER_VALIDATE_INT);
                break;
            case 'correo':
                return filter_var($input, FILTER_VALIDATE_EMAIL);
                break;
            default:
                return filter_var($input, FILTER_SANITIZE_STRING);
                break;
        }
    }

    public static function ValidarTexto ($texto, $error='')
    {
        if (trim($texto)=='' || !preg_match("/^[a-zA-Z\ ]+$/", $texto)) {
            echo "<script type='text/javascript'> alert('$error'); history.back(); </script>";
                return false;
        }else{
            return true;
        }
    }

    public static function ValidarNumeros ($numeros, $error='')
    {
        if (trim($numeros)=='' || !preg_match("/^[0-9]+$/", $numeros)) {
            echo "<script type='text/javascript'> alert('$error'); history.back(); </script>";
                return false;
        }else{
            return true;
        }
    }

    public static function ValidarCorreo ($correo, $error='')
    {
        if (trim($correo)=='' || !preg_match("/^[a-zA-Z0-9\._-]+@[a-zA-Z0-9]+\.[a-zA-Z]+$/", trim($correo))) {
            echo "<script type='text/javascript'> alert('$error'); history.back(); </script>";
                return false;
        }else{
            return true;
        }
    }
}
