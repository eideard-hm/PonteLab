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
            $data['list_vacante'] = $this->model->selectVacancy();
            $data['list_requisitos'] = $this->model->selectRequirement();
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
                empty($_POST['nombre']) || empty($_POST['cantidad']) || empty($_POST['especificaciones'])
                || empty($_POST['perfil']) || empty($_POST['tipoContrato']) || empty($_POST['sueldo'])
                || empty($_POST['fechapublicacion']) || empty($_POST['fechacierre']) || empty($_POST['direccion'])
                || empty($_POST['estado'])
            ) {
                $arrResponse = ['statusUser' => false, 'msg' => 'Todos los campos son obligatorios, Legamos al controller!!'];
            }
            /*
            1. Se crean variables para almacenar los datos enviados en la petición
            2. Se va hacer el proceso de insertar, y lo comprobamos si el id del usuario viene vacio 
            */
            $intId = intval($_POST['idVacancy']);
            $strNombre = limpiarCadena(strtolower(ucfirst($_POST['nombre']))); //strtolower(convertir todos las letras en minusculas) 
            $strCantidad = intval($_POST['cantidad']);
            $strEspecificaciones = limpiarCadena($_POST['especificaciones']);
            $intPerfil = limpiarCadena($_POST['perfil']);
            $strTipoContrato = limpiarCadena($_POST['tipoContrato']);
            $strSueldo = doubleval($_POST['sueldo']);
            $strFechaPublicacion = limpiarCadena($_POST['fechapublicacion']);
            $intFechacierre = limpiarCadena($_POST['fechacierre']);
            $intDireccion = limpiarCadena($_POST['direccion']);
            $intEstado = intval($_POST['estado']);
            $intIdContractFK = $_SESSION['idContractorFK'];

            /*================== INSERTAR VACANTE =======================*/

            if ($intId === 0 || empty($intId)) {
                $option = 1;
                $request = $this->model->insertVacancy(
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
            } else {
                /*================== EDITAR VACANTE =======================*/
                $option = 2;
                $request = $this->model->updateUser(
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
                empty($_POST['especificaciones'])
            ) 
            {
                $arrResponse = ['statusUser' => false, 'msg' => 'Todos los campos son obligatorios, ctrl!!'];
            }
            //DEFINICION DE VARIABLES DE RECEPCION
            $intidRequisitosVacante = intval($_POST['idRequisitosVacante']);
            $intidVacanteFK = intval($_POST['']);
            $intidRequisitosFK = intval($_POST['']);
            $strEspecificaciones = limpiarCadena($_POST['especificaciones']);
            /*================== INSERTAR USUARIO =======================*/
            if ($intId === 0 || empty($intId)) {
                $option = 1;
                $request = $this->model->insertRequirement(
                    $strDescripcion,
                    $intidRequisitosVacante,
                    $intidRequisitosFK                  
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

                    $arrResponse = ['statusUser' => true, 'msg' => 'El registro del contrante ha sido exitoso :)', 'value' => $request];
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
