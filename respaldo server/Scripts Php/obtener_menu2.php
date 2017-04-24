<?php
/**
 * Obtiene todas las metas de la base de datos
 */

require 'Meta.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {


	$restaurante = $_GET['restaurante'];

    // Manejar petición GET
    $menu = Meta::getAllmenu2($restaurante);

    if ($menu) {

        $datos["estado"] = 1;
        $datos["menu"] = $menu;

        print json_encode($datos);
    } else {
        print json_encode(array(
            "estado" => 2,
            "mensaje" => "Ha ocurrido un error"
        ));
    }
}