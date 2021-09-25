<?php

class Categorias extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    //======================== EVIAR Y RECIBIR INFORMACIÓN DEL MODELO =======================

    public function Categorias()
    {
        $data['titulo_pagina'] = 'Categorías  | PonsLabor.';
        $this->views->getView($this, 'Categorias', $data);
    }
}