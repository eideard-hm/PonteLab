<?php

class Correo_Recuperar_Password extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    //======================== EVIAR Y RECIBIR INFORMACIÓN DEL MODELO =======================

    public function Correo_Recuperar_Password()
    {
        $data['titulo_pagina'] = 'Recuperar Contraseña | PonsLabor.';
        $this->views->getView($this, 'Correo_Recuperar_Password', $data);
    }
}
