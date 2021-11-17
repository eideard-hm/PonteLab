<?php

/** 
 * Clase que contiene los métodos para el controlador de la aplicación.
 * Aqui se cargan los controladores y los métodos que se ejecutarán. De igual
 * manera es el que carga los modelos.
 */
class Controllers
{
    /** 
     * Método constructor de la clase. Este ejecuta y carga el modelo y las vistas cuando
     * se invoca la clase.
     */
    public function __construct()
    {
        $this->views = new Views();
        $this->loadModel();
    }

    /**
     * loadModel(): la función de este método  es capturar el nombre del controlador que
     * tenemos en uso.
     */
    public function loadModel()
    {
        /*
        get_class(): Returns the name of the class of an object, es decir devuleve el nombre
        de la clase de un objeto
        */
        $model = ucwords(get_class($this)) . "Model";
        $model = ucwords($model);
        $routClass = "Models/" . $model . ".php";
        if (file_exists($routClass)) {
            require_once($routClass);
            $this->model = new $model;
        }
    }
}
