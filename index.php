<?php

require_once("Config/Config.php");
require_once("Helpers/Helpers.php");
/*
obtenemos lo parametros que se pasen por la url del navegador en la variable $url, 
donde se valida si trae algun valor, si no que le asigne como controlador Index y como
método index.
*/
$url = $_GET['url'] ?? "Index/index";
$arrUrl = explode('/', $url);

//definir los controladores,métodos y parametros.
$controller = $arrUrl[0];
$method = $arrUrl[0];
$param = "";

/*
Validar si el método viene definido y los parametros también
*/
if (isset($arrUrl[1]) && !empty($arrUrl)) {
    $method = $arrUrl[1];
}

if (isset($arrUrl[2]) && !empty($arrurl[2])) {
    for ($i = 2; $i < count($arrurl); $i++) {
        $param .= $arrurl[$i] . ',';
    }
    $param = trim($param, ',');
}

//requerir el archivo que carga automaticamente las clases de la carpeta Libs

require_once('Libs/Autoload.php');

/*
Función para que se comuniquen los controladores con los modelos
*/

require_once('Libs/Load.php');
