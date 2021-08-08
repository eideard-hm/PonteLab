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
        $data['titulo_pagina'] = 'Menú Principal | PonsLabor.';
        $this->views->getView($this, 'Menu', $data);
    }

    public function Menu_Contratante()
    {
        $data['titulo_pagina'] = 'Menu Contratante | PonsLabor.';
        $this->views->getView($this, 'Menu_Contratante', $data);
    }
}
