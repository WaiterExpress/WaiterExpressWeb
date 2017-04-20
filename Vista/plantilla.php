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

namespace Vista;

class Plantilla
{
    private $vars = array();

    /**
     * @const Carpeta Vista
     */
    const VISTA_PATH = "Vista/";

    /**
     * @const extension
     */
    const EXTENSION_PLANTILLA = ".php";

    public function __get($nombre)
    {
        return $this->vars[$nombre];
    }

    public function __set($nombre, $valor)
    {
        if ($nombre == 'view_template_file') {
            throw new Exception("No se puede enlazar la variable llamada 'view_template_file'");
        }
        $this->vars[$nombre] = $valor;
    }

    public function render($plantilla)
    {
        if (array_key_exists('view_template_file', $this->vars)) {
            throw new Exception("No se puede enlazar la variable llamada 'view_template_file'");
        }
        extract($this->vars, EXTR_OVERWRITE);
        ob_start();
        include(self::VISTA_PATH . $plantilla . self::EXTENSION_PLANTILLA);
        $str = ob_get_contents();
        ob_end_clean();
        echo $str;
    }
}
?>
