<?php
/**
 * Obtiene todas las metas de la base de datos
 */

require 'Meta.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    // Manejar petición GET
    $platosfuertes = Meta::getAllPlatosFuertes();

    if ($platosfuertes) {

        $datos["estado"] = 1;
        $datos["menu"] = $platosfuertes;

        print json_encode($datos);
    } else {
        print json_encode(array(
            "estado" => 2,
            "mensaje" => "Ha ocurrido un error"
        ));
    }
}