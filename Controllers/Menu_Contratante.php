<?php

class Menu_Contratante extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    //======================== EVIAR Y RECIBIR INFORMACIÓN DEL MODELO =======================

    public function Menu_Contratante()
    {
        $data['titulo_pagina'] = 'Menu_Contratante | PonsLabor.';
        $this->views->getView($this, 'Menu_Contratante', $data);
    }
}