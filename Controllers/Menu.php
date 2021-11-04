<?php

class Menu extends Controllers
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        // //isset : verifica que la varible de sesion si exista
        if (!isset($_SESSION['login'])) {
            header('Location:' . URL . 'Login');
        }
    }
    //======================== EVIAR Y RECIBIR INFORMACIÓN DEL MODELO =======================

    public function Menu()
    {
        if (isset($_SESSION['login']) && $_SESSION['user-data']['nombreRol'] === 'Aspirante') {
            $data['titulo_pagina'] = 'Menú Principal | ' . NOMBRE_EMPRESA . '.';
            $this->views->getView($this, 'Menu', $data);
        } elseif (isset($_SESSION['login']) && $_SESSION['user-data']['nombreRol'] === 'Contratante') {
            header('Location:' . URL . 'Menu/Menu_Contratante');
        } else {
            header('Location:' . URL . 'Login');
        }
    }

    public function inhabilitarA()
    {
        $idUsuario = intval($_SESSION['user-data']['idUsuario']);
        $estadoUsuario = intval($_POST['estado']);
        $request = $this->model->updateState(
            $idUsuario,
            $estadoUsuario
        );
    }

    public function Menu_Contratante()
    {
        if (isset($_SESSION['login']) && $_SESSION['user-data']['nombreRol'] === 'Contratante') {
            $data['titulo_pagina'] = 'Menu Contratante | ' . NOMBRE_EMPRESA . '.';
            $this->views->getView($this, 'Menu_Contratante', $data);
        } elseif (isset($_SESSION['login']) && $_SESSION['user-data']['nombreRol'] === 'Aspirante') {
            header('Location:' . URL . 'Menu');
        } else {
            header('Location:' . URL . 'Login');
        }
    }
}
