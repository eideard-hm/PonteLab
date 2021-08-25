<?php

class Vacante extends Controllers
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

    public function Vacante()
    {
        if (isset($_SESSION['login']) && $_SESSION['user-data']['nombreRol'] === 'Contratante') {
            $data['titulo_pagina'] = 'Vacante | PonsLabor.';
            $data['list_vacante'] = $this->model->selectAllVacancy();
            $data['list_requisitos'] = $this->model->selectAllReqs();
            $data['list_sector'] = $this->model->selectAllSector();
            $this->views->getView($this, 'Vacante', $data);
        } elseif (isset($_SESSION['login']) && $_SESSION['user-data']['nombreRol'] === 'Aspirante') {
            header('Location: http://localhost/PonsLabor/Menu');
        } else {
            header('Location: http://localhost/PonsLabor/Login');
        }
    }

    //Método controlador para insertar y/o editar usuarios
    public function setVacante()
    {
        if ($_POST) {
            //verificar que los campos no vengan vacios
            if (
                empty($_POST['idVacanteFK']) || empty($_POST['idRequisitosFK']) || empty($_POST['especficacionRequisitos'])
            ) {
                $arrResponse = ['statusUser' => false, 'msg' => 'Todos los campos son obligatorios, Legamos al controller!!'];
            }
            /*
            1. Se crean variables para almacenar los datos enviados en la petición
            2. Se va hacer el proceso de insertar, y lo comprobamos si el id del usuario viene vacio 
            */
            $intId = intval($_POST['idRequisitosVacante']);
            $idVacanteFK = intval($_POST['idVacanteFK']);
            $idRequisitosFK = intval($_POST['idRequisitosFK']);
            $strEspecificaciones = limpiarCadena($_POST['especficacionRequisitos']);

            /*================== INSERTAR VACANTE =======================*/

            if ($intId === 0 || empty($intId)) {
                $option = 1;
                $request = $this->model->insertRequirement(
                    $idVacanteFK,
                    $idRequisitosFK,
                    $strEspecificaciones
                );
            } else {
                /*================== EDITAR VACANTE =======================*/
                $option = 2;
                $request = $this->model->updateVacancy(
                    $strNombre,
                    $strCantidad,
                    $strEspecificaciones,
                    $intPerfil,
                    $strTipoContrato,
                    $strSueldo,
                    $strFechaPublicacion,
                    $intFechacierre,
                    $intDireccion,
                    $intEstado,
                    $intIdContractFK
                );
            }

            if ($request > 0 && is_numeric($request)) {
                if ($option === 1) {
                    $arrResponse = ['statusUser' => true, 'msg' => 'El registro de la vacante ha sido exitoso :)', 'value' => $request];
                } elseif ($option === 2) {
                    $arrResponse = ['statusUser' => true, 'msg' => 'Los datos del usuario han sido modificado existosamente :)', 'value' => $request];
                }
            } elseif ($request === 'exits') {
                $arrResponse = array('statusUser' => false, 'msg' => '!Atención! el usuario ya se encuentra registrado!!. Intenta con otro', 'value' => $request);
            } else {
                $arrResponse = array('statusUser' => false, 'msg' => 'No es posible almacenar los datos :(', 'value' => $request);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();
    }
    
    // método para traer todas las vacantes
    public function setRequirement()
    {
        if ($_POST) {
            if
            (
                empty($_POST['idVacanteFK']) || empty($_POST['idRequisitosFK'])
                || empty($_POST['especficacionRequisitos'])
            ) 
            {
                $arrResponse = ['statusUser' => false, 'msg' => 'Todos los campos son obligatorios, ctrl!!'];
            }
            //DEFINICION DE VARIABLES DE RECEPCION
            $intidRequisitosVacante = intval($_POST['idRequisitosVacante']);
            $intidVacanteFK = intval($_POST['idVacanteFK']);
            $intidRequisitosFK = intval($_POST['idRequisitosFK']);
            $strEspecificaciones = limpiarCadena($_POST['especficacionRequisitos']);
            /*================== INSERTAR USUARIO =======================*/
            if ($intidRequisitosVacante === 0 || empty($intidRequisitosVacante)) {
                $option = 1;
                $request = $this->model->insertRequirement(
                    $intidVacanteFK,
                    $intidRequisitosFK,
                    $strEspecificaciones                  
                );
            } else {
                /*================== EDITAR USUARIO =======================*/
                $option = 2;
                $request = $this->model->updateRequirement(
                    $intidRequisitosVacante,
                    $intidVacanteFK,
                    $intidRequisitosFK,
                    $strEspecificaciones
                );
            }

            if ($request > 0 && is_numeric($request)) {
                if ($option === 1) {
                    $_SESSION['idContractorFK'] = intval($request);

                    $arrResponse = ['statusUser' => true, 'msg' => 'El registro ha sido exitoso :)', 'value' => $request];
                } elseif ($option === 2) {
                    $arrResponse = ['statusUser' => true, 'msg' => 'Los datos del contratante han sido modificado existosamente :)', 'value' => $request];
                }
            } elseif ($request === 'exits') {
                $arrResponse = array('statusUser' => false, 'msg' => '!Atención! el contratante ya se encuentra registrado!!. Intenta con otro', 'value' => $request);
            } else {
                $arrResponse = array('statusUser' => false, 'msg' => 'No es posible almacenar los datos :(', 'value' => $request);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }
        die();        
    }

    //Método para mostrar las vacantes relacionadas con los sectores que el
    //usuario registro
    public function getVacantesSector()
    {
        $sectorUsuario = explode(',', $_SESSION['data-sector-user']);
        $request =  $this->model->getVacantesSector(
            $sectorUsuario,
        );

        if ($request > 0) {
            $arrResponse = ['status' => true, 'data' => $request];
        } else {
            $arrResponse = ['status' => false, 'data' => 'No hemos encontrado ninguna sugerencia para tí. Por favor intente más tarde :('];
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        die();
    }

    // método para traer todas las vacantes
    public function getAllVacantes()
    {
        $request = $this->model->selectAllVacantes();
        if (!empty($request)) {
            $arrResponse = ['status' => true, 'data' => $request];
        } else {
            $arrResponse = ['status' => false, 'data' => 'Ha ocurrido un error interno. Por favor intenta más tarde !!'];
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }

    //método que retorna el arreglo con las vacantes
    public function getArregloVacantes()
    {
        $arrUrl = explode('/', implode($_GET));
        $busqueda = limpiarCadena(strtolower($arrUrl[2]));

        $request = $this->model->getFiltroVacantes($busqueda);
        $arrResponse = ['status' => true, 'data' => $request];
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }
}
