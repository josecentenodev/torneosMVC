<?php

function conectarDB() : mysqli {
    $db = new mysqli('localhost', 'root', 'root', 'bienes_raices');
    if (!$db) {
        echo "Error de conexion";
        exit;
    }

    return $db;
}