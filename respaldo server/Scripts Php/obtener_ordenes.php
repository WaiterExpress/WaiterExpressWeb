<?php
/**
 * Obtiene todas las metas de la base de datos
 */
 header('Access-Control-Allow-Origin: *');
require 'Meta.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // Manejar petición GET
    $metas = Meta::getAll3();

    if ($metas) {

        //$datos["estado"] = 1;
        $datos["ordenes"] = $metas;

        print json_encode($datos);
    } else {
        print json_encode(array(
            "estado" => 2,
            "mensaje" => "Ha ocurrido un error"
        ));
    }
}