<?php

class Menu extends Controllers
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        // //isset : verifica que la varible de sesion si exista
        if (!isset($_SESSION['login'])) {
            header('Location: http://localhost/PonsLabor/Login');
        }
    }
    //======================== EVIAR Y RECIBIR INFORMACIÓN DEL MODELO =======================

    public function Menu()
    {
        if (isset($_SESSION['login']) && $_SESSION['user-data']['nombreRol'] === 'Aspirante') {
            $data['titulo_pagina'] = 'Menú Principal | PonsLabor.';
            $this->views->getView($this, 'Menu', $data);
        } elseif (isset($_SESSION['login']) && $_SESSION['user-data']['nombreRol'] === 'Contratante') {
            header('Location: http://localhost/PonsLabor/Menu/Menu_Contratante');
        } else {
            header('Location: http://localhost/PonsLabor/Login');
        }
    }

    public function Menu_Contratante()
    {
        if (isset($_SESSION['login']) && $_SESSION['user-data']['nombreRol'] === 'Contratante') {
            $data['titulo_pagina'] = 'Menu Contratante | PonsLabor.';
            $this->views->getView($this, 'Menu_Contratante', $data);
        } elseif (isset($_SESSION['login']) && $_SESSION['user-data']['nombreRol'] === 'Aspirante') {
            header('Location: http://localhost/PonsLabor/Menu');
        } else {
            header('Location: http://localhost/PonsLabor/Login');
        }
    }
}
