<?php

class Experiencia extends Controllers
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        // //isset : verifica que la varible de sesion si exista
        if (!isset($_SESSION['login'])) {
            header('Location: ' . URL . 'Login');
        }
        if (isset($_SESSION['login']) && $_SESSION['user-data']['nombreRol'] === 'Contratante') {
            header('Location:' . URL . 'Menu/Menu_Contratante');
        }
    }

    //======================== EVIAR Y RECIBIR INFORMACIÓN DEL MODELO =======================

    public function Experiencia()
    {
        $data['titulo_pagina'] = 'Experiencia | PonsLabor.';
        $data['list_sectores'] = $this->model->getAllSectores();
        $data['list_tipoExperiencia'] = $this->model->getAllListExperiencia();
        $this->views->getView($this, 'Experiencia', $data);
    }

    //Mètodo para insertar las experiencias
    public function insertExperiencia()
    {
        if ($_POST) {
            if (empty($_POST['txtEmpresa']) || empty($_POST['txtPuesto'])) {
                $arrResponse = ['status' => false, 'msg' => 'Todos los campos son obligatorios.'];
            } else {
                $empresa = ucfirst(strtolower(limpiarCadena($_POST['txtEmpresa'])));
                $sectorLaboro = intval(limpiarCadena($_POST['txtSectorExp']));
                $ciudad = intval(limpiarCadena($_POST['txtCiudadLab']));
                $tipoExperiencia = intval(limpiarCadena($_POST['txtTipoExp']));
                $puestoDesempeño = ucfirst(strtolower(limpiarCadena($_POST['txtPuesto'])));
                $anioInicio = limpiarCadena($_POST['txtAnioIniExp']);
                $mesInicio = limpiarCadena($_POST['txtMesIniExp']);
                $anioFin = limpiarCadena($_POST['txtAnioFinExp']);
                $mesFin = limpiarCadena($_POST['txtMesFinExp']);
                $funcion = $_POST['textFunciones'];
                $idAspirante = 2;

                $request = $this->model->insertExperienciaLaboral(
                    $empresa,
                    $sectorLaboro,
                    $ciudad,
                    $tipoExperiencia,
                    $puestoDesempeño,
                    $anioInicio,
                    $mesInicio,
                    $anioFin,
                    $mesFin,
                    $funcion,
                    $idAspirante
                );

                if ($request > 0 && is_numeric($request)) {
                    $arrResponse = ['status' => true, 'msg' => 'Experiencia laboral registrada correctamente :)'];
                } elseif ($request === 'exists') {
                    $arrResponse = ['status' => false, 'msg' => 'El usuario ya tiene esa experiencia laboral asocidada. Registra otros...'];
                } else {
                    $arrResponse = ['status' => false, 'msg' => 'Ha ocurrido un error en el servidor. Por favor intenta más tarde.'];
                }
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
}
