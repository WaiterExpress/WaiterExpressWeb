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

class MultiLanguage
{
	private $file = 'language.txt';
	private $idioma = 'es';

	public function __construct()
	{
		/**
		 * Configura idioma por defecto
		 */
		if(!isset($_SESSION['language']) || $_SESSION['language']=="")
		{
			$_SESSION['language']= $this->idioma;
		}
		
		$language_array = array("en","es");

		if(isset($_GET['language']) && $_GET['language']!="" && in_array($_GET['language'], $language_array))
		{
			$_SESSION['language']=$_GET['language'];	
		}

		/**
		 * Agregar nuevas palabras al archivo
		 */
		if(isset($_POST['update_language']))
		{
			$this->WriteLanguageFile();			
		}
		$this->ReadLanguageFile();
		
	}

	private function WriteLanguageFile()
	{
		$current = "";
		for ($i=0; $i <count($_POST['en']) ; $i++) { 
			if($_POST['en'][$i] != "" && $_POST['es'][$i] != "") {
				$current.=$_POST['en'][$i]."#@#".$_POST['es'][$i]."\n";
			}
		}
		file_put_contents($this->file, $current);
	}

	private function ReadLanguageFile()
	{
		$this->language_array = array();
		$filecontent = file_get_contents($this->file);

		$array = explode("\n",$filecontent);

		foreach($array as $key => $value)
		{
			$string_array = explode("#@#",$value);
			$this->language_array[$string_array[0]] = $string_array;
		}
	}

	public function Lang($string, $valor="", $language="")
	{
		if($language == "") {
			$language = $_SESSION['language'];
		}

		if($language == "en") {
			echo sprintf(_($this->language_array[$string][0]), $valor);
		}else if($language == "es") {
			echo sprintf(_($this->language_array[$string][1]), $valor);
		}else {
			echo sprintf(_($this->language_array[$string][0]), $valor);
		}
	}

	public function CambiarIdioma($idioma){
		$url = URL.'?language='.$idioma;
		return $url;
	}
}
?>
