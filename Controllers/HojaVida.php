<?php

class HojaVida extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    //======================== EVIAR Y RECIBIR INFORMACIÓN DEL MODELO =======================

    public function HojaVida()
    {
        $data['titulo_pagina'] = 'Hoja de Vida | PonsLabor.';
        $this->views->getView($this, 'HojaVida', $data);
    }
}
