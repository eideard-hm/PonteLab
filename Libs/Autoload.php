<?php

/*
requerir el archivo de autoload, que sirve para cargar de forma automatica las clases
que estemos pasando por la url
*/

function autoload($class)
{
    $rutaAutoload = 'Libs/' . $class . '.php';
    if (file_exists($rutaAutoload)) {
        require_once($rutaAutoload);
    }
}

spl_autoload_register('autoload');
