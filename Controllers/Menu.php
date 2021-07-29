<?php

class Menu extends Controllers
{
    public function __construct()
    {
        session_start();
        parent::__construct();
    }

    //======================== EVIAR Y RECIBIR INFORMACIÓN DEL MODELO =======================

    public function Menu()
    {
        $data['titulo_pagina'] = 'Menú Principal | PonsLabor.';
        $this->views->getView($this, 'Menu', $data);
    }

    public function getImgProfile(int $id)
    {
        $idUser = intval(limpiarCadena($id));

        if ($idUser > 0 || !empty($idUser)) {
            $arrData = $this->model->selectImgProfile($idUser);
            if (!empty($arrData)) {
                $img = base64_encode($arrData['imagenUsuario']);
                echo '<img src="data:image/png;base64,"' . $img . "" . '>';
            }
        }
        die();
    }
}
