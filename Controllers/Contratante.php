<?php

class Contratante extends Controllers
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

    /**
     * Método que sirve para cargar la vista del perfil del aspirante
     */
    public function Perfil_Contratante()
    {
        if (isset($_SESSION['login']) && $_SESSION['user-data']['nombreRol'] === 'Contratante') {
            $data['titulo_pagina'] = 'Perfil Contratante | ' . NOMBRE_EMPRESA . '.';
            $this->views->getView($this, 'Perfil_Contratante', $data);
        } elseif (isset($_SESSION['login']) && $_SESSION['user-data']['nombreRol'] === 'Aspirante') {
            header('Location:' . URL . 'Menu/Menu_Contratante');
        } else {
            header('Location: ' . URL . 'Login');
        }
    }

    /**
     * Método para cargar la vista  de editar perfil del aspirante
     */
    public function Edit_Perfil_Contratante()
    {
        $data['titulo_pagina'] = 'Editar Perfil Contratante | ' . NOMBRE_EMPRESA . '.';
        $data['list_tipodoc'] = $this->model->selectTipoDoc();
        $data['list_barrio'] = $this->model->selectBarrio();
        $this->views->getView($this, 'Edit_Perfil_Contratante', $data);
    }

    public function Contratante()
    {
        $data['titulo_pagina'] = 'Contratante | ' . NOMBRE_EMPRESA . '.';
        $this->views->getView($this, 'Contratante', $data);
    }

    //Método controlador para insertar y/o editar usuarios
    public function setContractor()
    {
        if ($_POST) {
            //verificar que los campos no vengan vacios
            if (empty($_POST['especificaciones'])) {
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
                $request = $this->model->updateContractor(
                    $intId,
                    $strDescripcion
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

    //editar perfil
    public function updatePerfilContratante()
    {
        if ($_POST) {
            if (
                empty($_POST['txtNombre']) || empty($_POST['tipoDoc']) || empty($_POST['numDoc'])
                || empty($_POST['mobile']) || empty($_POST['phone']) || empty($_POST['Barrio'])
                || empty($_POST['Dirección'])
            ) {
                $arrResponse = ['statusUser' => false, 'msg' => 'Atención, Todos los campos son obligatorios.'];
            } else {
                $idUsuario = intval($_POST['idUsuario']);
                $nombreUsuario = limpiarCadena($_POST['txtNombre']);
                $TipoDoc = intval($_POST['tipoDoc']);
                $numDoc = limpiarCadena($_POST['numDoc']);
                $numMobil = limpiarCadena($_POST['mobile']);
                $numPhone = limpiarCadena($_POST['phone']);
                $Barrio = intval($_POST['Barrio']);
                $direccion = limpiarCadena($_POST['Dirección']);

                $request = $this->model->updateUser(
                    $idUsuario,
                    $nombreUsuario,
                    $TipoDoc,
                    $numDoc,
                    $numMobil,
                    $numPhone,
                    $Barrio,
                    $direccion
                );
                var_dump($request);
                exit();
                if ($request > 0) {
                    $arrResponse = ['statusUser' => true, 'msg' => 'Los datos se actualizarón correctamente !!', 'value' => $request];
                    $arrData = $this->model->selectOneUser($idUsuario);
                    if (!empty($arrData)) {
                        $_SESSION['user-data'] = $arrData;
                    }
                } elseif ($request === 'exists') {
                    $arrResponse = ['statusUser' => false, 'msg' => 'Atención, los datos ya existen', 'value' => $request];
                } else {
                    $arrResponse = ['statusUser' => false, 'msg' => 'Atención, los datos no se actualizaron correctamente', 'value' => $request];
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
        }
        die();
    }
}
