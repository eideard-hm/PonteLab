<?php

class Recuperar_Password extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    //======================== EVIAR Y RECIBIR INFORMACIÓN DEL MODELO =======================

    public function Recuperar_Password()
    {
        $data['titulo_pagina'] = 'Recuperar Contraseña | PonsLabor.';
        $this->views->getView($this, 'Recuperar_Password', $data);
    }
}
