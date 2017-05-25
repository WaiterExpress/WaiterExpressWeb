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
 *
 *----------------------------------------------------------------------
 *  Como usar esta Libreria
 *----------------------------------------------------------------------
 *	$plain_txt = "1Q2w3e4r5t6y$";
 *	echo "Plain Text =" .$plain_txt. "<br/>";
 *
 *	$encrypted_txt = encrypt_decrypt('encrypt', $plain_txt);
 *	echo "Encrypted Text = " .$encrypted_txt. "<br/>";
 *	$decrypted_txt = encrypt_decrypt('decrypt', $encrypted_txt);
 *
 *	echo "Decrypted Text =" .$decrypted_txt. "<br/>";
 *	if ( $plain_txt === $decrypted_txt )
 *	echo "SUCCESS";
 *	else
 *	echo "FAILED";
 *	echo "<br/>";
 *
 */
namespace Ayudante;

class Encriptacion
{
	public static function encrypt_decrypt($accion, $string)
	{

	    $output = false;
	    $encrypt_method = "AES-256-CBC";
	    $secret_key = '$&(!=w2i1!6v(q(48+*z06qr(3bx2_n9%*n0qji=^lo172!@1@cw%e)#%/';
	    $secret_iv = '9)W2:`XUyY1qMa`+/!7NB8/1<]@h4NFfxV6X9626oc3G7!.Y]&ct.RyeId7HFDq';

	    /**
	     *  Hash
	     */
	    $key = hash('sha256', $secret_key);
	    
	    /**
	     * iv
         * Método de cifrado AES-256-CBC espera 16 bytes,
         * de lo contrario obtendrá una advertencia.
	     */
	    $iv = substr(hash('sha256', $secret_iv), 0, 16);
	    if ( $accion == 'encrypt' ) {
	        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
	        $output = base64_encode($output);
	    } else if( $accion == 'decrypt' ) {
	        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0, $iv);
	    }
	    return $output;
	}
}
?>
