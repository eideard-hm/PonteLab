<?php

class Contratante extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    //======================== EVIAR Y RECIBIR INFORMACIÓN DEL MODELO =======================

    public function Contratante()
    {
        $data['titulo_pagina'] = 'Contratante | PonsLabor.';
        $this->views->getView($this, 'Contratante', $data);
    }
}
