<?php

class Politicas_de_Datos extends Controllers
{
    public function __construct()
    {
        parent::__construct();
    }

    //======================== EVIAR Y RECIBIR INFORMACIÓN DEL MODELO =======================

    public function Politicas_de_Datos()
    {
        $data['titulo_pagina'] = 'Políticas de Datos | PonsLabor.';
        $this->views->getView($this, 'Politicas_de_Datos', $data);
    }

    public function Politicas_de_Cookies()
    {
        $data['titulo_pagina'] = 'Políticas de Cookies | PonsLabor.';
        $this->views->getView($this, 'Politicas_de_Cookies', $data);
    }
}
