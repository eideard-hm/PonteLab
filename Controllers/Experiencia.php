<?php

class Experiencia extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    //======================== EVIAR Y RECIBIR INFORMACIÓN DEL MODELO =======================

    public function Experiencia()
    {
        $data['titulo_pagina'] = 'Experiencia | PonsLabor.';
        $this->views->getView($this, 'Experiencia', $data);
    }
}
