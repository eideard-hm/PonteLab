<?php

class Controllers
{
    public function __construct()
    {
        $this->views = new Views();
        $this->loadModel();
    }

    /*
    loadModel(): la función de este método  es capturar el nombre del controlador que
    tenemos en uso.
    */

    public function loadModel()
    {
        /*
        get_class(): Returns the name of the class of an object, es decir devuleve el nombre
        de la clase de un objeto
        */
        $model = get_class($this) . "Model";

        $routClass = "Models/" . $model . ".php";
        if (file_exists($routClass)) {
            require_once($routClass);
            $model = new $model();
        }
    }
}
