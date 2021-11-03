<?php

class Index extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    //======================== EVIAR Y RECIBIR INFORMACIÓN DEL MODELO =======================

    public function index()
    {
        $data['titulo_pagina'] = 'Página Inicio | ' . NOMBRE_EMPRESA . '.';
        $this->views->getView($this, 'index', $data);
    }

    public function Categorias()
    {
        $data['titulo_pagina'] = 'Categorías | ' . NOMBRE_EMPRESA . '.';
        $this->views->getView($this, 'Categorias', $data);
    }
}