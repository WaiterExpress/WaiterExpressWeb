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

class Core
{
	private $con;

	public function __construct(){
		$this->con = new Conexion();
	}

	public function set($atributo, $contenido){
		$this->$atributo = $contenido;
	}

	public function get($atributo){
		return $this->$atributo;
	}

	public function ReportarError(){
		
		if (ENTORNO_DESARROLLO == true){
			error_reporting(E_ALL);
			ini_set('display_errors','On');
		}else{
			error_reporting(E_ALL);
			ini_set('display_errors','Off');
			ini_set('log_errors', 'On');
			ini_set('error_log', LOGERROR.'error.log');
		}
	}

    public function EnlaceActual()
    {
        $url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
        return $url;
    }

	public function TiempoPublicacion($fecha)
	{

		if(empty($fecha)){
			return "No hay fecha prevista";
		}

		$periodos	= array("segundo", "minuto", "hora", "d&iacute;a", "semana", "mes", "a&ntilde;o", "d&eacute;cada");
		$longitudes	= array("60","60","24","7","4.35","12","10");
		$ahora		= time();
		$unix_fecha = strtotime( $fecha );

		/**
		 *  Comprobar la validez de la fecha
		 */
		if( empty( $unix_fecha ) ){
			return "Fecha Desconocida";
		}

		/**
		 *  Fecha futura o fecha pasada
		 */
		if( $ahora > $unix_fecha ){
			$diferencia = $ahora - $unix_fecha;
			$tiempo = "hace";
		}else{
			$diferencia = $unix_fecha - $ahora;
			$tiempo = "desde ahora, hace";
		}

		for( $j = 0; $diferencia >= $longitudes[$j] && $j < count($longitudes)-1; $j++ ){
			$diferencia /= $longitudes[$j];
		}
		
		$diferencia = round($diferencia);

		if( $diferencia != 1 ){
			$periodos[$j].= "s";
		}
		return " {$tiempo} $diferencia $periodos[$j]";
	}

	public function MenuActivado($pagina){
		if($this->pagina == $pagina) echo "class='active'";
	}
}
?>