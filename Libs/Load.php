<?php

$controllerFile = "Controllers/" . $controller . ".php";

if (file_exists($controllerFile)) {
    require_once($controllerFile);
    //creamos el método. Par de aclaraciones
    /*
    1. $controller es un objeto, porque a partir de este se esta instanciando una clase.
    2. Es importante que el nombre del fichero del controlador sea igual que el de la clase.
    3. Dado lo anterior, la variable $controller trae el valor de una clase que estamos instanciando.
    */
    $controller = new $controller();
    /*
    * Cuando creamos un objeto a partir de la instacia de una clase, a través de dicho objeto
    * acceder a todos los métodos publicos. 
    * En nuestro caso el método que se va a ejecutar, es el segundo parametro que estamos
    * pasando por la URL del navegador.

    method_exists(),comprueba si un método existe dentro de una clase, para ello le debemos
    de pasar dos parametros, el primero es la clase o el objeto de esa clase y el segundo es
    el método que queremos verificar si existe.
    */

    if (method_exists($controller, $method)) {
        /*
        Con el siguiente código vamos a poder acceder a los métodos que contiene el objeto
        $controller, dichos métodos son los que especifiquemos en la variable $method y si 
        lo requiere le pasamos los parametros.
        */
        $controller->{$method}($param);
    } else {
        echo "No existe el método";
    }
} else {
    echo "No existe el controlador";
}
