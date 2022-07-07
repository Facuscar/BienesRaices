<?php

function conectarDB() : mysqli{
    $db = new mysqli('localhost','root','','bienes_raices');

    if(!$db) {
        echo "Error. No se pudo establecer la conexión con el servidor";
        exit;
    }

    return $db;
}
