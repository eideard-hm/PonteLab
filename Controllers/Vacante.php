<?php

class Vacante extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    //======================== EVIAR Y RECIBIR INFORMACIÓN DEL MODELO =======================

    public function Vacante()
    {
        $data['titulo_pagina'] = 'Vacante | PonsLabor.';
        $this->views->getView($this, 'Vacante', $data);
    }
}
