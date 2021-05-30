<?php

class Aspirante extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    //======================== EVIAR Y RECIBIR INFORMACIÓN DEL MODELO =======================

    public function Aspirante()
    {
        $data['titulo_pagina'] = 'Aspirante | PonsLabor.';
        $this->views->getView($this, 'Aspirante', $data);
    }
}
