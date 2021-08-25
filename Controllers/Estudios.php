<?php

class Estudios extends Controllers
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        // //isset : verifica que la varible de sesion si exista
        if (!isset($_SESSION['login'])) {
            header('Location:' . URL . 'Login');
        }
        if (isset($_SESSION['login']) && $_SESSION['user-data']['nombreRol'] === 'Contratante') {
            header('Location:' . URL . 'Menu_Contratante');
        }
    }

    //======================== EVIAR Y RECIBIR INFORMACIÓN DEL MODELO =======================

    public function Estudios()
    {
        $data['titulo_pagina'] = 'Estudios | PonteLab.';
        $data['list_sectores'] = $this->model->getAllSectores();
        $data['list_gradoEstudio'] = $this->model->getAllGradoEstudio();
        $this->views->getView($this, 'Estudios', $data);
    }

    public function insertEstudios()
    {
        if ($_POST) {
            if (
                empty($_POST['txtInstitucion']) || empty($_POST['txtTitulo'])
            ) {
                $arrResponse = ['status' => false, 'msg' => 'Todos los campos son obligatorios.'];
            } else {
                $nombreInstitucion = limpiarCadena($_POST['txtInstitucion']);
                $tituloObtenido = ucfirst(limpiarCadena($_POST['txtTitulo']));
                $ciudad = intval(limpiarCadena($_POST['txtCiudad']));
                $sector = intval(limpiarCadena($_POST['txtSector']));
                $anioInicio = limpiarCadena($_POST['txtAnioIni']);
                $mesInicio = limpiarCadena($_POST['txtMesIni']);
                $anioFin = limpiarCadena($_POST['txtAnioFin']);
                $mesFin = limpiarCadena($_POST['txtMesFin']);
                $idAspirante = 2;
                $gradoEstudio = intval(limpiarCadena($_POST['txtGradoEst']));

                $request = $this->model->insertEstudio(
                    $nombreInstitucion,
                    $tituloObtenido,
                    $ciudad,
                    $sector,
                    $anioInicio,
                    $mesInicio,
                    $anioFin,
                    $mesFin,
                    $idAspirante,
                    $gradoEstudio,
                );

                if ($request > 0 && is_numeric($request)) {
                    $arrResponse = ['status' => true, 'msg' => 'Estudios registrados correctamente :)'];
                } elseif ($request === 'exists') {
                    $arrResponse = ['status' => false, 'msg' => 'El usuario ya tiene esos estudios asocidados. Registra otros...'];
                } else {
                    $arrResponse = ['status' => false, 'msg' => 'Ha ocurrido un error en el servidor. Por favor intenta más tarde.'];
                }
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
