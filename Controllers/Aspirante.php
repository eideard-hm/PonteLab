<?php

class Aspirante extends Controllers
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        // //isset : verifica que la varible de sesion si exista
        if (!isset($_SESSION['login'])) {
            header('Location: http://localhost/PonsLabor/Login');
        }
    }

    //======================== EVIAR Y RECIBIR INFORMACIÓN DEL MODELO =======================

    public function Aspirante()
    {
        $data['titulo_pagina'] = 'Aspirante | PonsLabor.';
        $data['list_workStatus'] = $this->model->getAllWorkStatus();
        $data['list_puestoInteres'] = $this->model->getAllPuestoInteres();
        $this->views->getView($this, 'Aspirante', $data);
    }

    public function setAspirante()
    {
        if ($_POST) {
            if (empty($_POST['textPerfilLab']) || empty($_POST['idUsuario']) || empty($_POST['txtEstado'])) {
                $arrResponse = ['status' => false, 'msg' => 'Todos lo campos son obligatorios!!'];
            }

            $strDescription = $_POST['textPerfilLab'];
            $idUsuario = intval($_POST['idUsuario']);
            $idEstadoLab = intval($_POST['txtEstado']);

            $request = $this->model->insertAspirante(
                $strDescription,
                $idUsuario,
                $idEstadoLab
            );

            if ($request > 0 && is_numeric($request)) {
                //creamos unas variables con los datos del nuevo aspirante
                $ultimoAspiranteInsertado = $this->model->selectOneAspirante(intval($request));
                $_SESSION['data-aspirante'] = $ultimoAspiranteInsertado;
                $arrResponse = ['status' => true, 'msg' => 'Aspirante registrado correctamente :)', 'value' => $_SESSION['data-aspirante']];
            } else {
                $arrResponse = ['status' => false, 'msg' => 'No es posible almacenar los datos :('];
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    //Método para insertar un puesto de interés
    public function savePuestoInteres()
    {
        if ($_POST) {
            if (empty($_POST['txtOtroPuesto'])) {
                $arrResponse = ['status' => false, 'msg' => 'Todos los campos son obligatorios!!'];
            } else {
                $strPuestoInteres = limpiarCadena(strtolower($_POST['txtOtroPuesto']));
                $strPuestoInteres = limpiarCadena(ucfirst($strPuestoInteres));

                $request = $this->model->insertOtroPuestoInteres($strPuestoInteres);

                if ($request > 0 && is_numeric($request)) {
                    $puestoInteresAspirante = $this->model->puestoInteresAspirante(
                        intval($_SESSION['data-aspirante']['idAspirante']),
                        intval($request)
                    );

                    if (!empty($puestoInteresAspirante)) {
                        $sesionPuestoInteres = $this->model->getOnePuestoInteres(intval($puestoInteresAspirante));
                        $_SESSION['puestoInteres-aspirante'] = $sesionPuestoInteres;
                    } else {
                        $arrResponse = ['status' => false, 'msg' => 'Ha ocurrido un error en el servidor. Intente más tarde !!'];
                    }
                    $arrResponse = ['status' => true, 'msg' => 'Puesto insertado correctamente!!', 'sesiones' => $_SESSION['puestoInteres-aspirante']];
                } elseif ($request === 'exists') {
                    $arrResponse = ['status' => false, 'msg' => 'El puesto ya se encuentra registrado. Lo puedes seleccionar la lista.'];
                } else {
                    $arrResponse = ['status' => false, 'msg' => 'Ha ocurrido un error en el servidor. Intenta más tarde :('];
                }
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }

    public function insertPuestoInteresAspirante()
    {
        if ($_POST) {
            if (empty($_POST['txtPuesto'])) {
                $arrResponse = ['status' => false, 'msg' => 'Todos los campos son obligatorios !!'];
            } else {
                $intPuestoInteres = limpiarCadena(intval($_POST['txtPuesto']));

                $request = $this->model->puestoInteresAspirante(
                    intval($_SESSION['data-aspirante']['idAspirante']),
                    $intPuestoInteres
                );

                if ($request > 0 && is_numeric($request)) {
                    $sesionPuestoInteres = $this->model->getOnePuestoInteres(intval($request));
                    $_SESSION['puestoInteres-aspirante'] = $sesionPuestoInteres;

                    $arrResponse = ['status' => true, 'msg' => 'Puesto de interés almacenado exitosamente :)', 'sesiones' => $_SESSION['puestoInteres-aspirante']];
                } elseif ($request === 'exists') {
                    $arrResponse = ['status' => false, 'msg' => 'El puesto ya se encuentra registrado. Lo puedes seleccionar la lista.'];
                } else {
                    $arrResponse = ['status' => false, 'msg' => 'Ha ocurrido un error en el servidor. Intenta más tarde :('];
                }
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
