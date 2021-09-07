<?php

class Vacante extends Controllers
{
    public function __construct()
    {
        parent::__construct();
        session_start();
        // //isset : verifica que la varible de sesion si exista
        if (!isset($_SESSION['login'])) {
            header('Location: ' . URL . 'Login');
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
            header('Location:' . URL . 'Menu');
        } else {
            header('Location: ' . URL . 'Login');
        }
    }

    //Método controlador para insertar y/o editar vacantes
    public function setVacante()
    {
        if ($_POST) {
            //verificar que los campos no vengan vacios
            if (
                empty($_POST['idVacancy']) || empty($_POST['nombre']) || empty($_POST['cantidad']) ||
                empty($_POST['especificaciones']) || empty($_POST['perfil']) ||
                empty($_POST['tipoContrato']) || empty($_POST['sueldo']) || empty($_POST['fechapublicacion']) ||
                empty($_POST['fechacierre']) || empty($_POST['direccion']) || empty($_POST['estado']) ||
                empty($_POST['idSectorFK'])
            )
            {
                $arrResponse = ['statusUser' => false, 'msg' => 'Todos los campos son obligatorios, Legamos al controller!!'];
            }
            /*Se realiza la consulta del idContratante por medio del id del usuario en
            las cariables de session*/
            $intIdUsuarioFK = intval($_SESSION['id']);
            $arrData = $this->model->selectOneContractor($intIdUsuarioFK);
            if (!empty($arrData)) {
                $_SESSION['contractor-data'] = $arrData;
            }            
            /*
            1. Se crean variables para almacenar los datos enviados en la petición
            2. Se va hacer el proceso de insertar, y lo comprobamos si el id del usuario viene vacio 
            */
            

            $intidVacancy = intval($_POST['idVacancy']);
            $strNombre =limpiarCadena($_POST['nombre']);
            $intCantidad =intval($_POST['cantidad']);
            $strEspecificaciones =limpiarCadena($_POST['especificaciones']);
            $strPerfil = limpiarCadena($_POST['perfil']);
            $strTipoContrato =limpiarCadena($_POST['tipoContrato']);
            $floSueldo = floatval($_POST['sueldo']);
            $strFechaPublicacion =limpiarCadena($_POST['fechapublicacion']);
            $strFechacierre =limpiarCadena($_POST['fechacierre']);
            $strDireccion =limpiarCadena($_POST['direccion']);
            $intEstado =boolval($_POST['estado']);
            $intIdContratanteFK =intval($_SESSION['contractor-data']['idContratante']);
            $intIdsectorFK =intval($_POST['idSectorFK']);
            /*================== INSERTAR VACANTE =======================*/
            if ($intidVacancy === 0 || empty($intidVacancy)) {
                $option = 1;
                $request = $this->model->insertVacancy(
                        $strNombre,
                        $intCantidad,
                        $strEspecificaciones,
                        $strPerfil,
                        $strTipoContrato,
                        $floSueldo,
                        $strFechaPublicacion,
                        $strFechacierre,
                        $strDireccion,
                        $intEstado,
                        $intIdContratanteFK,
                        $intIdsectorFK
                );
            }
            // else {
            //     /*================== EDITAR VACANTE =======================*/
            //     $option = 2;
            //     $request = $this->model->updateVacancy(
            //         $strNombre,
            //         $strCantidad,
            //         $strEspecificaciones,
            //         $intPerfil,
            //         $strTipoContrato,
            //         $strSueldo,
            //         $strFechaPublicacion,
            //         $intFechacierre,
            //         $intDireccion,
            //         $intEstado,
            //         $intIdContractFK
            //     );
            // }

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

    // método para registrar los requerimientos de las vacantes
    public function setRequirement()
    {
        if ($_POST) {
            if (
                empty($_POST['idVacanteFK']) || empty($_POST['idRequisitosFK'])
                || empty($_POST['especficacionRequisitos'])
            ) {
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
                    $arrResponse = ['statusUser' => true, 'msg' => 'El registro ha sido exitoso :)', 'value' => $request];
                } elseif ($option === 2) {
                    $arrResponse = ['statusUser' => true, 'msg' => 'Los datos de los requisitos han sido modificado existosamente :)', 'value' => $request];
                }
            } elseif ($request === 'exits') {
                $arrResponse = array('statusUser' => false, 'msg' => '!Atención! los requisitos ya se encuentra registrado!!. Intenta con otro', 'value' => $request);
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
        if (isset($_SESSION['data-sector-user'])) {
            $sectorUsuario = explode(',', $_SESSION['data-sector-user']);
            $request =  $this->model->getVacantesSector(
                $sectorUsuario,
            );
            $arrResponse = ['status' => true, 'data' => $request];
        } else {
            $arrResponse = ['status' => false, 'data' => 'no'];
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

    //Método para cargar el sector o los sectores que el usuario tiene asociado
    public function getUserVacanteSector()
    {
        $idUsuario = intval($_SESSION['id']);
        $request = $this->model->loadSectorUser($idUsuario);

        if (!empty($request)) {
            $sectores = '';
            foreach ($request as $sector) {
                if (!empty($sector['idSectorFK'])) {
                    $sectores .= $sector['idSectorFK'] . ',';
                }
            }
            $_SESSION['data-sector-user'] = $sectores;
            $arrResponse = ['status' => true, 'msg' => 'ok'];
        } else {
            $arrResponse = ['status' => false, 'msg' => 'no'];
        }

        echo  json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
    }
}
