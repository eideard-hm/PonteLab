<?php

class Perfil_Contratante extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    //======================== EVIAR Y RECIBIR INFORMACIÓN DEL MODELO =======================

    public function Perfil_Contratante()
    {
        $data['titulo_pagina'] = 'Perfil Contratante | PonsLabor.';
        $this->views->getView($this, 'Perfil_Contratante', $data);
    }
}
