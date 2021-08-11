<?php

class Contratante extends Controllers
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

    public function Contratante()
    {
        $data['titulo_pagina'] = 'Contratante | PonsLabor.';
        $this->views->getView($this, 'Contratante', $data);
    }

    //Método controlador para insertar y/o editar usuarios
    public function setContractor()
    {
        if ($_POST) {
            //verificar que los campos no vengan vacios
            if (empty($_POST['especificaciones']))
            {
                $arrResponse = ['statusUser' => false, 'msg' => 'Todos los campos son obligatorios, completelos correctamente e intente nuevamente!!'];
            }
            /*
            1. Se crean variables para almacenar los datos enviados en la petición
            2. Se va hacer el proceso de insertar, y lo comprobamos si el id del usuario viene vacio 
            */
            $intId = intval($_POST['idContractor']);
            $strDescripcion = limpiarCadena($_POST['especificaciones']);
            $intIdUserFk = intval($_SESSION['id']);

            /*================== INSERTAR USUARIO =======================*/
            if ($intId === 0 || empty($intId)) {
                $option = 1;
                $request = $this->model->insertContractor(
                    $strDescripcion,
                    $intIdUserFk
                );
            } else {
                /*================== EDITAR USUARIO =======================*/
                $option = 2;
                $request = $this->model->updateUser(
                    $intId,
                    $strDescripcion
                );
            }

            if ($request > 0 && is_numeric($request)) {
                if ($option === 1) {
                    $_SESSION['idContractorFK'] = intval($request);
                    
                    $arrResponse = ['statusUser' => true, 'msg' => 'El registro de la vacante ha sido exitoso :)', 'value' => $request];
                }
                elseif ($option === 2) {
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
}
