<?php

class Vacantes extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    //======================== EVIAR Y RECIBIR INFORMACIÓN DEL MODELO =======================

    public function Vacantes()
    {
        $data['titulo_pagina'] = 'Vacantes | PonsLabor.';
        $this->views->getView($this, 'Vacantes', $data);
    }
}