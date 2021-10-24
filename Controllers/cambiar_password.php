<?php

class cambiar_password extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    //======================== EVIAR Y RECIBIR INFORMACIÓN DEL MODELO =======================

    public function cambiar_password()
    {
        $data['titulo_pagina'] = 'cambiar_password | PonteLab.';
        $this->views->getView($this, 'cambiar_password', $data);
    }
}