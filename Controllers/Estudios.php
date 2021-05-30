<?php

class Estudios extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    //======================== EVIAR Y RECIBIR INFORMACIÓN DEL MODELO =======================

    public function Estudios()
    {
        $data['titulo_pagina'] = 'Estudios | PonsLabor.';
        $this->views->getView($this, 'Estudios', $data);
    }
}
