<?php

class Experiencia extends Controllers
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        // //isset : verifica que la varible de sesion si exista
        if (!isset($_SESSION['login'])) {
            header('Location: http://localhost/PonsLabor/Login');
        }
        if (isset($_SESSION['login']) && $_SESSION['user-data']['nombreRol'] === 'Contratante') {
            header('Location: http://localhost/PonsLabor/Menu/Menu_Contratante');
        }
    }

    //======================== EVIAR Y RECIBIR INFORMACIÓN DEL MODELO =======================

    public function Experiencia()
    {
        $data['titulo_pagina'] = 'Experiencia | PonsLabor.';
        $this->views->getView($this, 'Experiencia', $data);
    }
}
