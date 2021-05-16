<?php

class Views
{
    /*
    * getView(), este método se va encargar de cargar las vistas de acuerdo al controlador
    * que estemos cargando
    */
    public function getView($controller, $view, $data = '')
    {
        $controller = get_class($controller);

        if ($controller === 'Index') {
            $view = 'Views/' . $view . '.php';
        } else {
            /*
            Tener en cuenta
            * Para cargar correctamente las vistas se debe tener en cuenta, el directorio
            * a crear, es decir dentro de la carpeta Views, debe haber un subcarpeta con el nombre
            * mismo nombre del controlador para vista, y dentro de esa subcarpeta si debe estar
            * el fichero, que vamos a enviar en la variable $view 
            */
            $view = 'Views/' . $controller . '/' . $view . '.php';
        }

        require_once($view);
    }
}
